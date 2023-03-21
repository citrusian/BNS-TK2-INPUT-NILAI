<?php

namespace App\Http\Controllers;

use App\Models\saved_score;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class CalculateNilaiAPI extends BaseController
{
    public function scoreInput(Request $request)
    {
        $scoreName = $request->input("scName");
        $scoreQuiz = (double)$request->input("scQuiz");
        $scoreTugas = (double)$request->input("scTugas");
        $scoreAbsensi = (double)$request->input("scAbsensi");
        $scorePraktek = (double)$request->input("scPraktek");
        $scoreUAS = (double)$request->input("scUAS");
        $finalScore = ($scoreQuiz + $scoreTugas + $scoreAbsensi + $scorePraktek + $scoreUAS) / 5;

        if ($finalScore <= 65){$grade = 'D';}
        elseif ($finalScore <= 75){$grade = 'C';}
        elseif ($finalScore <= 85){$grade = 'B';}
        elseif ($finalScore <= 100){$grade = 'A';}
        else {$grade = 'ERROR, Score more than 100';}

        if($scoreQuiz > 100|| $scoreTugas > 100|| $scoreAbsensi > 100|| $scorePraktek > 100|| $scoreUAS > 100){
            return response()
                ->json(array(
                    'ERROR' => 'Input nilai Lebih dari 100'
                ))->setStatusCode(400);
        }
        elseif ($scoreName === null){
            return response()
                ->json(array(
                    'ERROR' => 'Nama belum dimasukan'
                ))->setStatusCode(400);
        }
        else{
//          if input valid
//            $scoreArray= saved_score::create([
//                'Name' => $scoreName ,
//                'data' => [
//                    'Quiz' => $scoreQuiz ,
//                    'Tugas' => $scoreTugas ,
//                    'Absensi' => $scoreAbsensi ,
//                    'Praktek' => $scorePraktek ,
//                    'UAS' => $scoreUAS ,
//                    'Final_Score' => $finalScore ,
//                    'Grade' => $grade,
//                ] ,
//            ]);

//            - Another Type -
//            - can be called using $scoreArray or individual variable
            saved_score::create($scoreArray= [
                'Name' => $scoreName ,
                'Quiz' => $scoreQuiz ,
                'Tugas' => $scoreTugas ,
                'Absensi' => $scoreAbsensi ,
                'Praktek' => $scorePraktek ,
                'UAS' => $scoreUAS ,
                'Final_Score' => $finalScore ,
                'Grade' => $grade,
            ]);

        }

        return response()->json(array(
            $scoreArray,
        ));
    }

    public function scoreUpdate(Request $request, string $id)
    {
        $scoreArray = DB::table('saved_scores')->where('id', $id)->first();
        if ($scoreArray === null){
            return response()
                ->json(array(
                    'message' => 'Data not found'
                ));
        }
        else{
            $scoreName = $request->input("scName");
            $scoreQuiz = (double)$request->input("scQuiz");
            $scoreTugas = (double)$request->input("scTugas");
            $scoreAbsensi = (double)$request->input("scAbsensi");
            $scorePraktek = (double)$request->input("scPraktek");
            $scoreUAS = (double)$request->input("scUAS");
            $finalScore = ($scoreQuiz + $scoreTugas + $scoreAbsensi + $scorePraktek + $scoreUAS) / 5;

            if ($finalScore <= 65){$grade = 'D';}
            elseif ($finalScore <= 75){$grade = 'C';}
            elseif ($finalScore <= 85){$grade = 'B';}
            elseif ($finalScore <= 100){$grade = 'A';}
            else {$grade = 'ERROR, Score more than 100';}

            if($scoreQuiz > 100|| $scoreTugas > 100|| $scoreAbsensi > 100|| $scorePraktek > 100|| $scoreUAS > 100){
                return response()
                    ->json(array(
                        'ERROR' => 'Input nilai Lebih dari 100'
                    ))->setStatusCode(400);
            }
            elseif ($scoreName === null){
                return response()
                    ->json(array(
                        'ERROR' => 'Nama belum dimasukan'
                    ))->setStatusCode(400);
            }
            else {
                DB::table('saved_scores')->where('id', $id)->update($scoreArray = [
                    'Name' => $scoreName,
                    'Quiz' => $scoreQuiz,
                    'Tugas' => $scoreTugas,
                    'Absensi' => $scoreAbsensi,
                    'Praktek' => $scorePraktek,
                    'UAS' => $scoreUAS,
                    'Final_Score' => $finalScore,
                    'Grade' => $grade,
                ]);
            }
            return response()->json(array(
                $scoreArray,
            ));
        }
    }

    public function scoreGet(Request $request, string $id)
    {
        $scoreArray = DB::table('saved_scores')->where('id', $id)->first();
        if ($scoreArray === null){
            return response()
                ->json(array(
                    'message' => 'Data not found'
                ));
        }
        else{
            return response()->json(array(
                $scoreArray,
            ));
        }
    }

    public function scoreDelete(Request $request, string $id)
    {
        $scoreArray = DB::table('saved_scores')->where('id', $id)->first();
        if ($scoreArray === null){
            return response()
                ->json(array(
                    'message' => 'Data not found'
                ));
        }
        else{
            DB::table('saved_scores')->where('id', $id)->delete();

            return response()
                ->json(array(
                    'message' => 'Data Deleted'
                ));
        }

    }

    public function scoreGetall(Request $request)
    {
        $scoreArray = DB::select("SELECT * FROM saved_scores");

        if (count($scoreArray) === 0){
            return response()
                ->json(array(
                    'message' => 'DB Empty'
                ));
        }
        else{
            return $scoreArray;
        }
    }
}
