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
        }

        table{
            border-collapse: collapse;
            font-size:11px;
            width:100%
        }
        th, td {
            padding: 5px;
            border: 1px solid #dcdcdc;
            overflow:hidden
        }
        .header-right{text-align:center;  }
        .header-right p{ margin-bottom:5px}
        .header-title{background:#f2f2f2; text-align:center;padding:5px}
        .container{ margin: 0 auto; border:1px solid #777}
        .no-padding{padding:0}
        .width-smallest{width:40px;border-bottom:0}
        .width-small{width:60px;border-bottom:0}
        .border-left{border-left:0;}
        .no-border{border:0;}
        .sub-header p {margin-bottom:5px}
        .bg-gray{background:#f2f2f2; }
        .rota8{
            width:40px;
            -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */

        }
        .height-100{
            height:60px;
        }
        .page-break {
            page-break-after: always;
        }
        p, h1, h3{padding:0;margin:0}
        h3{font-size:14px}
    </style>
</head>
<body onload="javascript:window.print();">
    <div class="container">
        <div class="header">
            <table>
                <tr>
                    <td class="no-border">
                        <div><img style="max-width:150px" src="{{ asset('ev-assets/uploads/school-images/'.$get_school_admin->photo) }}" alt=""> </div>
                    </td>
                    <td colspan="5" style="width:100%" class="no-border" valign="top">
                        <div class="header-right">
                            <h1 style="margin-bottom:15px">{{$get_school_admin->name}}</h1>
                            <p style="color:#777">{{$get_school_admin->address}}</p>
                            <p><span>Tel: {{$get_school_admin->phone}} </span>   <span>Email: {{$get_school_admin->email}}</span> </p>
                            <!-- <p><strong> MOTTO: LEADERSHIP WITH DISTINCTION</strong></p> -->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="header-title">REPORT SHEET FOR {{$term ? $term->name : "-"}}, {{$term && $term->academic_session ? $term->academic_session->name : '-' }} ACADEMIC SESSION</div>
        <div class="sub-header">
            <table>
                <tr>
                    <td class="subhead-left no-border">
                        <p><span> NAME OF PUPIL: <strong>{{strtoupper($student->name)}}</strong> </span></p>
                        <p><span>CLASS</span>:<strong> {{$class ? $class->title : "-"}}</strong> </p>
                        <p><span>ADMISSION NUMBER: <strong>{{$student->reg_no}}</strong> </span></p>
                        <p><span>SESSION</span>:<strong> {{$term && $term->academic_session ? $term->academic_session->name : '-' }}</strong></p>
                    </td>
                    <td class="subhead-right no-border">
                        <p>SEX : {{$student->gender}}</p>
                        <p>AGE : {{$student->birthday}}</p>
                        <!-- <p>ATTENDANCE: </p> -->
                        <p>CLASS POPULATION : {{$classmates ? $classmates->count() : ''}}</p>
                    </td>
                    <td class="subhead-last no-border">
                        <p>Position: {{$exam_position+1}} <sup style="text-transform:uppercase">{{App\Mark::positionLetter($exam_position+1)}}</sup></p> 
                    </td>
                </tr>
            </table>
        </div>
        <div class="middle-container">
            <table class="table-100">
                <tbody>
                    <tr>
                        <td valign="top" class="md-left no-padding no-border" style="padding-right:10px">
                            <table border="1">
                                <tbody>
                                    <tr>
                                        <td rowspan="3" colspan="2">Subjects</td>
                                        <td colspan="7" class="bg-gray" style="text-align:center">MIDTERM SUMMARY</td>
                                    </tr>
                                    <tr>
                                        <td class="height-100"> <div class="rota8">NOTE</div></td>	
                                        <td class="height-100"> <div class="rota8">PROJECT</div></td>	
                                        <td class="height-100"> <div class="rota8">TEST</div></td>	
                                        <td class="height-100"> <div class="rota8">TOTAL SCORE</div></td>	
                                        <td rowspan="2"><div class="rota8">LETTER GRADE</div></td>	
                                        <td rowspan="2"><div class="rota8">REMARKS</div>	</td>
                                        <td rowspan="2"><div class="rota8">SUBJECT POSITION</div></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray">5</td>	
                                        <td class="bg-gray">5</td>	
                                        <td class="bg-gray">10</td>	
                                        <td class="bg-gray">20</td>	
                                    </tr>
                                    <?php
                                        $cummulative = 0;
                                        $mark = $ca_test->first();
                                        $obedience = 0;
                                        $honesty = 0;
                                        $self_reliance = 0;
                                        $self_control = 0;
                                        $use_of_initiative = 0;
                                        $punctuality = 0;
                                        $general_neatness = 0;
                                        $industry_or_perserverance = 0;
                                        $attendance_in_class = 0;
                                        $attentiveness = 0;
                                        $handwriting = 0;
                                        $sports_and_games = 0;
                                        $verbal_communication = 0;
                                        $manual_skills = 0;
                                        $handling_musical_instruments = 0;
                                        $bs_score=0;
                                    ?>
                                    @foreach($subjects as $key => $subject)
                                        <?php
                                            $the_first_test = $ca_test->where('subject_id', $subject->id)->first();
                                            $first_test = $the_first_test ? $the_first_test->first_a+$the_first_test->first_b+$the_first_test->first_c: 0;
                                            $total = $first_test;

                                            $cummulative+=$total;

                                            $options_holder = $the_first_test;
                                            $obedience+=$options_holder && $options_holder->obedience ? $options_holder->obedience : 0;
                                            $honesty+=$options_holder && $options_holder->honesty ? $options_holder->honesty : 0;
                                            $self_reliance+=$options_holder && $options_holder->self_reliance ? $options_holder->self_reliance : 0;
                                            $self_control+=$options_holder && $options_holder->self_control ? $options_holder->self_control : 0;
                                            $use_of_initiative+=$options_holder && $options_holder->use_of_initiative ? $options_holder->use_of_initiative : 0;
                                            $punctuality+=$options_holder && $options_holder->punctuality ? $options_holder->punctuality : 0;
                                            $general_neatness+=$options_holder && $options_holder->general_neatness ? $options_holder->general_neatness : 0;
                                            $industry_or_perserverance+=$options_holder && $options_holder->industry_or_perserverance ? $options_holder->industry_or_perserverance : 0;
                                            $attendance_in_class+=$options_holder && $options_holder->attendance_in_class ? $options_holder->attendance_in_class : 0;
                                            $attentiveness+=$options_holder && $options_holder->attentiveness ? $options_holder->attentiveness : 0;
                                            $handwriting+=$options_holder && $options_holder->handwriting ? $options_holder->handwriting : 0;
                                            $sports_and_games+=$options_holder && $options_holder->sports_and_games ? $options_holder->sports_and_games : 0;
                                            $verbal_communication+=$options_holder && $options_holder->verbal_communication ? $options_holder->verbal_communication : 0;
                                            $manual_skills+=$options_holder && $options_holder->manual_skills ? $options_holder->manual_skills : 0;
                                            $handling_musical_instruments+=$options_holder && $options_holder->handling_musical_instruments ? $options_holder->handling_musical_instruments : 0;

                                            foreach ($classmates as $c => $classmate) {
                                                $t_holder = App\CATest::where('term_id', $term->id)->where('student_id', $classmate->id)->where('subject_id', $subject->id)->first();
                                                $classmate->test_1 = $t_holder ? ($t_holder->first_a+$t_holder->first_b+$t_holder->first_c) : 0;
                                                $classmate->test_2 = $t_holder ? $t_holder->second : 0;
                                                $classmate->mark = $classmate->test_1+$classmate->test_2;
                                            }
                                            $classmates = collect($classmates)->sortByDesc('mark');
                                            $positionExam = array();
                                            foreach ($classmates as $cl => $classmat) {
                                                $positionExam[] = $classmat->mark . '+'. $classmat->id ;
                                            }
                                            $positionExam2 = array();
                                            foreach ($positionExam as $key => $value) {
                                                $newExp = explode('+', $value);
                                                $positionExam2[] = $newExp[0] . '+' . $key . '+' . $newExp[1];
                                            }
                                            $subject_position = "";
                                            foreach ($positionExam2 as $kk => $vv) {
                                                $subject_position .= $vv."*";
                                            }
                                          // echo $subject_position;
                                            $my_position = "";
                                            $newValue2 = explode('*', $subject_position);
                                            foreach ($newValue2 as $kkk => $val) {
                                                $newExps2 = explode('+', $val);
                                                if(isset($newExps2[2]) && Auth::id() == $newExps2[2]){
                                                    $my_position = $newExps2[1];
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="2">{{$subject->title}}</td>
                                            <td>{{$the_first_test ? $the_first_test->first_a: '-'}}</td>
                                            <td>{{$the_first_test ? $the_first_test->first_b: '-'}}</td>
                                            <td>{{$the_first_test ? $the_first_test->first_c: '-'}}</td>
                                            <td>{{$total}}</td>
                                            <td>{{App\Mark::checkgradeSpreadsheetTest($total)}}</td>
                                            <td>{{App\Mark::checkgradeSpreadsheetMidTermTestName($total)}}</td>
                                            <td>{{$my_position+1}}<sup> {{App\Mark::positionLetter($my_position+1)}}</sup></td>
                                        </tr>
                                    @endforeach
                                    <?php
                                        $bs_score = ($obedience+$honesty+$self_reliance+$self_control+$use_of_initiative+$punctuality+$general_neatness+$industry_or_perserverance+$attendance_in_class+$attentiveness+$handwriting+$sports_and_games+$verbal_communication+$manual_skills+$handling_musical_instruments)/15;
                                    ?>
                                </tbody>
                            </table>
                            <table style="margin-top:10px">
                                <tbody>
                                    <tr>
                                        <td colspan="4">TERM AVERAGE</td>
                                    </tr>
                                    <tr>
                                        <td>CUMMULATIVE: {{$cummulative}}  </td>
                                        <td>MAXIMUM OBTAINABLE:{{$subjects ? $subjects->count()*20 : ''}}</td>
                                        <td>AVERAGE SCORE: {{$subjects ? ($cummulative/($subjects->count()*20))*100 : ''}}%</td>
                                        <td>({{App\Mark::checkgradeSpreadsheet(($cummulative/($subjects->count()*20))*100)}}) {{App\Mark::checkgradeSpreadsheetName(($cummulative/($subjects->count()*20))*100)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding:10px">
                               <strong>VACATION DATE: {{$ca_test->first() ? $ca_test->first()->vacation_date : '-'}}
                                <span style="margin-left:40px">  NEXT RESUMPTION DATE: {{$ca_test->first() ? $ca_test->first()->resumption : '-'}}</span></strong> 
                            </div>

                            <table style="margin-top:10px;">
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="bg-gray">CLASS TEACHER'S COMMENTS:</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h3>{{$ca_test->first() ? strtoupper($ca_test->first()->teacher_comment) : '-'}}</h3> 
                                            <p>By {{$ca_test->first() ? App\User::find($ca_test->first()->teacher_id) ? App\User::find($ca_test->first()->teacher_id)->name : App\User::find($class->teacher_id) ? App\User::find($class->teacher_id)->name: '-' : '-'}} on {{$ca_test->first() ? $ca_test->first()->created_at->format('F d, Y') : '-'}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table style="margin-top:10px;">
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="bg-gray">PRINCIPAL'S COMMENT</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h3>{{$ca_test->first() ? strtoupper($ca_test->first()->principal_comment) : '-'}}</h3> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td valign="top" class="md-right no-padding no-border">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="bg-gray">PERSONAL DEVELOPMENT</td>
                                        <td colspan="2" class="bg-gray">Ratings</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Obedience</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($obedience / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($obedience / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Honesty</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($honesty / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($honesty / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Self-Reliance</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($self_reliance / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($self_reliance / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Self-Control</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($self_control / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($self_control / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Use of Initiative</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($use_of_initiative / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($use_of_initiative / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <?php
                                            $first_ave = (round($obedience / $subjects->count())+round($honesty / $subjects->count())+round($self_reliance / $subjects->count())+round($self_control / $subjects->count())+round($use_of_initiative / $subjects->count()))/5;
                                        ?>
                                        <td colspan="2">Total Average</td>
                                        <td>{{App\Mark::checkgradeSpreadsheet(($first_ave/5)*100)}}</td>
                                        <td>{{$first_ave}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2" class="bg-gray">SENSE OF RESPONSIBILITY</td>
                                        <td colspan="2" class="bg-gray">Ratings</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Punctuality</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($punctuality / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($punctuality / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>General Neatness</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($general_neatness / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($general_neatness / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Industry/Perserverance</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($industry_or_perserverance / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($industry_or_perserverance / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Attendance in Class</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($attendance_in_class / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($attendance_in_class / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Attentiveness</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($attentiveness / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($attentiveness / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <?php
                                        $second_ave = (round($punctuality / $subjects->count())+round($general_neatness / $subjects->count())+round($industry_or_perserverance / $subjects->count())+round($attendance_in_class / $subjects->count())+round($attentiveness / $subjects->count()))/5;
                                    ?>
                                    <tr>
                                        <td colspan="2">Total Average</td>
                                        <td>{{App\Mark::checkgradeSpreadsheet(($second_ave/5)*100)}}</td>
                                        <td>{{$second_ave}}</td>
                                    </tr>

                                  
                                    <tr>
                                        <td colspan="2" class="bg-gray">PSYCHOMOTOR DEVELOPMENT</td>
                                        <td colspan="2" class="bg-gray">Ratings</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Handwriting</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($handwriting / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($handwriting / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sports and Games</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($sports_and_games / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($sports_and_games / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Verbal Communication</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($verbal_communication / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($verbal_communication / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Manual Skills (in handling Tools and Equipment)</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($manual_skills / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($manual_skills / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Dexterity in Handling Musical Instruments And Arts Materials</td>
                                        <td>{{$marks ? App\Mark::checkgradeSpreadsheet(((round($handling_musical_instruments / $subjects->count()))/5)*100) : 0}}</td>
                                        <td>{{$marks ? round($handling_musical_instruments / $subjects->count()) : 0}}</td>
                                    </tr>
                                    <?php
                                        $third_ave = (round($handwriting / $subjects->count())+round($sports_and_games / $subjects->count())+round($verbal_communication / $subjects->count())+round($manual_skills / $subjects->count())+round($handling_musical_instruments / $subjects->count()))/5;
                                    ?>
                                    <tr>
                                        <td colspan="2">Total Average</td>
                                        <td>{{App\Mark::checkgradeSpreadsheet(($third_ave/5)*100)}}</td>
                                        <td>{{$third_ave}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-gray">BEHAVIOURAL SUMMARY</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">SCORE</td>
                                        <td>{{round($bs_score / $subjects->count())}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">RATING</td>
                                        <td>{{App\Mark::checkgradeSpreadsheet(((round($bs_score / $subjects->count()))/5)*100)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">PERCENTAGE</td>
                                        <td>{{((round($bs_score / $subjects->count()))/5)*100}}%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <div style="margin-left:20px"><img style="max-height:70px; margin-top:5px; margin-bottom:-15px" src="{{ asset('ev-assets/uploads/school-images/33761.jpg') }}" alt=""> </div>
                                <p>______________________________</p>
                                <h3>PRINCIPAL'S SIGNATURE</h3>
                                <p>{{$ca_test->first() ? $ca_test->first()->created_at->format('F d, Y') : '-'}}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <button onClick="print()">print</button>
    <script>
       print(){
        window.print();
       }
    </script>
</body>
</html>