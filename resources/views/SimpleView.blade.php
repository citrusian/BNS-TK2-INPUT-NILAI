<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input nilai</title>
</head>
<body>
<header>
{{--    <h1>Input Nilai</h1>--}}
    <h2>*hanya untuk kalkulasi, untuk save kedatabe melalui api</h2>
</header>
<form action="{{ route('Grade') }}" method="post">
    @csrf
    <main>
        <div>
            <table>
                <tr>
                    <th>Quiz</th>
                    <th><label>
                            <input type="number" name="scQuiz" placeholder="0" min="0" max="100">
                        </label></th>
                </tr>
                <tr>
                    <th>Tugas</th>
                    <th><label>
                            <input type="number" name="scTugas" placeholder="0" min="0" max="100">
                        </label></th>
                </tr>
                <tr>
                    <th>Absen</th>
                    <th><label>
                            <input type="number" name="scAbsensi" placeholder="0" min="0" max="100">
                        </label></th>
                </tr>
                <tr>
                    <th>Praktek</th>
                    <th><label>
                            <input type="number" name="scPraktek" placeholder="0" min="0" max="100">
                        </label></th>
                </tr>
                <tr>
                    <th>UAS</th>
                    <th><label>
                            <input type="number" name="scUAS" placeholder="0" min="0" max="100">
                        </label></th>
                </tr>
                <tr>
                    <th> </th>
                </tr>
                <tr>
                    <th> </th>
                    <th>
                        <input type="submit" value="Submit">
                        <input type="reset">
                    </th>
                </tr>
            </table>
        </div>
        <div>
        </div>
    </main>
    @if(session('CalSuccess'))
        <div id="Score">
            Final Score: {{ session('CalSuccess') }}
        </div>
        <div id="Grade">
            <?php
                $_SESSION['grade'] = session('CalSuccess');
//                print_r($_SESSION['grade']);
                if ($_SESSION['grade'] <= 65){
                    echo "Grade      : D";
                }
                elseif ($_SESSION['grade'] <= 75){
                    echo "Grade      : C";
                }
                elseif ($_SESSION['grade'] <= 85){
                    echo "Grade      : B";
                }
                elseif ($_SESSION['grade'] <= 100){
                    echo "Grade      : A";
                }
                else{
                    echo "Grade      : ERROR, Value more than 100";
                }
//                - use array not int
            ?>

{{--            - Error! Only works in IE ---}}
{{--            - Use php above--}}
{{--            @if(session($_SESSION['grade']) <= 65)--}}
{{--                Grade      : D--}}
{{--            @elseif(session($_SESSION['grade']) <= 75)--}}
{{--                Grade      : C--}}
{{--            @elseif(session('grade'[0]) <= 85)--}}
{{--                Grade      : B--}}
{{--            @elseif(session('grade'[0]) <= 100)--}}
{{--                Grade      : A--}}
{{--            @else--}}
{{--                Grade      : ERROR, Value more than 100--}}
{{--            @endif--}}
        </div>
    @endif
</form>
</body>
</html>
