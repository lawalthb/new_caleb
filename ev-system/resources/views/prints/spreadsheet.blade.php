<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Spread Sheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            margin:0
        }
        .heading{
            text-align:center
        }
        p, h4, h5{
            margin:0;
            margin-bottom:10px
        }
        .entry-sheet{
            background: #dcdcdc;
            width: 50%;
            padding:15px;
            margin-bottom:20px
        }
        table{
            width: 100%;
            border: 1px solid #dcdcdc;
            border-collapse: collapse;
            font-size:12px
        }
        th, td {
            padding: 5px;
            border: 1px solid #dcdcdc;
        }
        .subtitle td{
            font-weight: bold
        }
        .brown{
            color: #804000
        }
        .light-blue{
            color: #0066ff
        }
        .blue{
            color: #003380
        }
        .gray{
            color: #262626
        }
        .purple{
            color: #4d004d
        }
        .light-green{
            color: #008060
        }
        .green{
            color: #003326
        }
        th{
            text-align: center
        }
        .img-holder{
            background: #dcdcdc;
            padding: 10px
        }
        .borderRight{
            border-right:3px solid #dcdcdc
        }
    </style>
</head>
<body>
    <?php 
        function postionLetter($value){
            if($value == 1 || substr($value, 0, 1).substr($value,-1) == 1){
                echo 'st';
            }
            elseif($value == 2 || substr($value, 0, 1).substr($value,-1) == 2){
                echo 'nd';
            }
            elseif($value == 3 || substr($value, 0, 1).substr($value,-1) == 3){
                echo 'rd';
            }
            else{
                echo 'th';
            }
        }
    ?>
    <div>
        <div class="heading">
            <div class="img-holder">
                <img src="{{ asset('ev-assets/uploads/school-images/'.$get_school_admin->photo) }}" alt="home" style="max-width: 180px;margin: 8px; max-height:45px">
            </div>
            <h1>{{$get_school_admin->name}}</h1>
            <p>{{$get_school_admin->address}}</p>
        </div>

        <h4>Teacher: {{$teacher ? $teacher->name : "-"}}</h4>
        <p>Current Term: {{$term ? $term->name : "-"}} </p> 
        <p>Current Session: 2018/2019 </p> 
        <div class="entry-sheet">
            <h5>RESULT ENTRY SHEET</h5>
            <p>Class: <strong>{{$class ? $class->title : "-"}}</strong></p>
            <p>Subject: <strong>{{$subject ? $subject->title : "-"}}</strong></p>
            <p>Term: <strong>{{$term ? $term->name : "-"}}</strong></p>
            <p>Session: <strong>{{$term && $term->academic_session ? $term->academic_session->name : '-' }}</strong></p>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th colspan="4"></th>
                        <th class="borderRight">CAT 1</th>
                        <th colspan="3" class="borderRight">SUM 1</th>
                        <th>CAT 2</th>
                        <th>SUM 2</th>
                        <th class="borderRight">EXAM</th>
                        <th colspan="3">TTL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="subtitle">
                        <td>S/N </td>
                        <td>ADM</td>
                        <td>SEX</td>
                        <td>NAME</td>
                        <td class="brown borderRight">20</td>
                        <td class="brown">20</td>
                        <td class="brown">Pos</td>
                        <td class="brown borderRight">Grd</td>
                        <td class="brown">20</td>
                        <td class="brown">20</td>
                        <td class="brown borderRight">(60)</td>
                        <td class="brown">100</td>
                        <td class="brown">Pos</td>
                        <td class="brown">Grd</td>
                    </tr>
                    <?php
                    $positionExam = array();
                    foreach ($students as $key => $student) {
                        $first = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: 0;
                        $second = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: 0;
                        $exam = $student->mark ? $student->mark->mark_obtained : 0;
                        $allSum = $first+$second+$exam;
                        $positionExam[] = $allSum . '+'. $student->id;
                    }
                    rsort($positionExam);
                    $positionExam2 = array();
                    foreach ($positionExam as $key => $value) {
                        $newExp = explode('+', $value);
                        $positionExam2[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                    }

                    $firstTest = array();
                    foreach ($students as $key => $value) {
                        $first1 = $ca_test->where('student_id',$value->id)->first() && $ca_test->where('student_id',$value->id)->first()->first ? $ca_test->where('student_id',$value->id)->first()->first: 0;
                        $firstTest[] = $first1 . '+'. $value->id;
                    }
                    rsort($firstTest);
                    $firstTest2 = array();
                    foreach ($firstTest as $key => $value) {
                        $newExp = explode('+', $value);
                        $firstTest2[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                    }
                    //print_r($firstTest);
                    ?>
                    @foreach($students as $key => $student)
                        <?php
                            $first = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: 0;
                            $second = $ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: 0;
                            $exam = $student->mark ? $student->mark->mark_obtained : 0;
                            $allSum = $first+$second+$exam;
                            $testPos = 0;
                            $examPos = 0;
                            foreach ($firstTest2 as $value) {
                               $exp = explode('+',$value);
                               if($exp[0] == $first && $exp[2] == $student->id){
                                    $testPos = $exp[1]+1;
                               }
                            }
                            foreach ($positionExam2 as $value) {
                               $exp = explode('+',$value);
                               if($exp[0] == $allSum && $exp[2] == $student->id){
                                    $examPos = $exp[1]+1;
                               }
                            }
                            //echo $firstTest[$key];
                        ?>
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$student->reg_no}}</td>
                        <td>{{$student->gender ? $student->gender : '-'}}</td>
                        <td>{{$student->name}}</td>
                        <td class="light-blue borderRight">{{$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: '-'}}</td>
                        <td class="blue">{{$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ? $ca_test->where('student_id',$student->id)->first()->first: '-'}}</td>
                        <td class="gray">{{$testPos}} <sup>{{postionLetter($testPos)}}</sup></td>
                        <td class="brown borderRight">{{$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->first ?App\Mark::checkgradeSpreadsheetTest($ca_test->where('student_id',$student->id)->first()->first): '-'}}</td>
                        <td class="purple">{{$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: '-'}}</td>
                        <td class="blue">{{$ca_test->where('student_id',$student->id)->first() && $ca_test->where('student_id',$student->id)->first()->second ? $ca_test->where('student_id',$student->id)->first()->second: '-'}}</td>
                        <td class="light-blue borderRight">{{$student->mark ? $student->mark->mark_obtained : '-'}}</td>
                        <td>{{$allSum}}</td>
                        <td class="light-green">{{$examPos}} <sup>{{postionLetter($examPos)}}</sup></td>
                        <td class="green">{{App\Mark::checkgradeSpreadsheet($allSum)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: right;margin-top:30px">
                <img src="{{ asset('ev-assets/uploads/school-images/'.$get_school_admin->stamp) }}" alt="home" style="margin: 8px; max-height:145px">
            </div>
        </div>
    </div>
</body>
</html>