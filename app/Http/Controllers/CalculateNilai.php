<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CalculateNilai extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request)
    {
        $scoreQuiz = $request->input("scQuiz");
        $scoreTugas = $request->input("scTugas");
        $scoreAbsensi = $request->input("scAbsensi");
        $scorePraktek = $request->input("scPraktek");
        $scoreUAS = $request->input("scUAS");

//        Backup limiter if input more than 100 in html bypassed
        if ($scoreQuiz >100){$scoreQuiz = 100;}
        if ($scoreTugas >100){$scoreQuiz = 100;}
        if ($scoreAbsensi >100){$scoreQuiz = 100;}
        if ($scorePraktek >100){$scoreQuiz = 100;}
        if ($scoreUAS >100){$scoreQuiz = 100;}

//        Calculate final score
        $finalScore = ($scoreQuiz + $scoreTugas + $scoreAbsensi + $scorePraktek + $scoreUAS) / 5;
        return redirect('/inputnilai')->with('CalSuccess', $finalScore);
    }
}
