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
                        <div><img style="max-width:150px" src="<?php echo e(asset('ev-assets/uploads/school-images/'.$get_school_admin->photo)); ?>" alt=""> </div>
                    </td>
                    <td colspan="5" style="width:100%" class="no-border" valign="top">
                        <div class="header-right">
                            <h1 style="margin-bottom:15px"><?php echo e($get_school_admin->name); ?></h1>
                            <p style="color:#777"><?php echo e($get_school_admin->address); ?></p>
                            <p><span>Tel: <?php echo e($get_school_admin->phone); ?> </span>   <span>Email: <?php echo e($get_school_admin->email); ?></span> </p>
                            <!-- <p><strong> MOTTO: LEADERSHIP WITH DISTINCTION</strong></p> -->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="header-title">REPORT SHEET FOR <?php echo e($term ? $term->name : "-"); ?>, <?php echo e($term && $term->academic_session ? $term->academic_session->name : '-'); ?> ACADEMIC SESSION</div>
        <div class="sub-header">
            <table>
                <tr>
                    <td class="subhead-left no-border">
                        <p><span> NAME OF PUPIL: <strong><?php echo e(strtoupper($student->name)); ?></strong> </span></p>
                        <p><span>CLASS</span>:<strong> <?php echo e($class ? $class->title : "-"); ?></strong> </p>
                        <p><span>ADMISSION NUMBER: <strong><?php echo e($student->reg_no); ?></strong> </span></p>
                        <p><span>SESSION</span>:<strong> <?php echo e($term && $term->academic_session ? $term->academic_session->name : '-'); ?></strong></p>
                    </td>
                    <td class="subhead-right no-border">
                        <p>SEX : <?php echo e($student->gender); ?></p>
                        <p>AGE : <?php echo e($student->birthday); ?></p>
                        <!-- <p>ATTENDANCE: </p> -->
                        <p>CLASS POPULATION : <?php echo e($classmates ? $classmates->count() : ''); ?></p>
                    </td>
                    <td class="subhead-last no-border">
                        <p>Position: <?php echo e($exam_position+1); ?> <sup style="text-transform:uppercase"><?php echo e(App\Mark::positionLetter($exam_position+1)); ?></sup></p> 
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
                                        <td colspan="7" class="bg-gray" style="text-align:center">TERMINAL SUMMARY</td>
                                    </tr>
                                    <tr>
                                        <td class="height-100"> <div class="rota8">CAT 1</div></td>	
                                        <td class="height-100"> <div class="rota8">CAT 2</div></td>	
                                        <td class="height-100"> <div class="rota8">EXAM SCORE</div></td>	
                                        <td class="height-100"> <div class="rota8">TOTAL SCORE</div></td>	
                                        <td rowspan="2"><div class="rota8">LETTER GRADE</div></td>	
                                        <td rowspan="2"><div class="rota8">REMARKS</div>	</td>
                                        <td rowspan="2"><div class="rota8">SUBJECT POSITION</div></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-gray">20</td>	
                                        <td class="bg-gray">20</td>	
                                        <td class="bg-gray">60</td>	
                                        <td class="bg-gray">100</td>	
                                    </tr>
                                    <?php
                                        $cummulative = 0;
                                        $mark = $student->mark->first();
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
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php

                                            $the_first_test = $ca_test->where('subject_id', $subject->id)->first();

                                            $first_test = $the_first_test ? $the_first_test->first_a+$the_first_test->first_b+$the_first_test->first_c: 0;
                                            $second_test = $the_first_test ? $the_first_test->second: 0;
                                            $exam = $student->mark->where('subject_id', $subject->id)->first() ? $student->mark->where('subject_id', $subject->id)->first()->mark_obtained : 0;
                                            $total = $first_test + $second_test + $exam;
                                            $cummulative+=$total;
                                            $obedience+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->obedience ? $student->mark->where('subject_id', $subject->id)->first()->obedience : 0;
                                            $honesty+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->honesty ? $student->mark->where('subject_id', $subject->id)->first()->honesty : 0;
                                            $self_reliance+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->self_reliance ? $student->mark->where('subject_id', $subject->id)->first()->self_reliance : 0;
                                            $self_control+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->self_control ? $student->mark->where('subject_id', $subject->id)->first()->self_control : 0;
                                            $use_of_initiative+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->use_of_initiative ? $student->mark->where('subject_id', $subject->id)->first()->use_of_initiative : 0;
                                            $punctuality+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->punctuality ? $student->mark->where('subject_id', $subject->id)->first()->punctuality : 0;
                                            $general_neatness+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->general_neatness ? $student->mark->where('subject_id', $subject->id)->first()->general_neatness : 0;
                                            $industry_or_perserverance+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->industry_or_perserverance ? $student->mark->where('subject_id', $subject->id)->first()->industry_or_perserverance : 0;
                                            $attendance_in_class+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->attendance_in_class ? $student->mark->where('subject_id', $subject->id)->first()->attendance_in_class : 0;
                                            $attentiveness+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->attentiveness ? $student->mark->where('subject_id', $subject->id)->first()->attentiveness : 0;
                                            $handwriting+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->handwriting ? $student->mark->where('subject_id', $subject->id)->first()->handwriting : 0;
                                            $sports_and_games+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->sports_and_games ? $student->mark->where('subject_id', $subject->id)->first()->sports_and_games : 0;
                                            $verbal_communication+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->verbal_communication ? $student->mark->where('subject_id', $subject->id)->first()->verbal_communication : 0;
                                            $manual_skills+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->manual_skills ? $student->mark->where('subject_id', $subject->id)->first()->manual_skills : 0;
                                            $handling_musical_instruments+=$student->mark->where('subject_id', $subject->id)->first() && $student->mark->where('subject_id', $subject->id)->first()->handling_musical_instruments ? $student->mark->where('subject_id', $subject->id)->first()->handling_musical_instruments : 0;

                                            foreach ($classmates as $c => $classmate) {
                                                $t_holder = App\CATest::where('term_id', $term->id)->where('student_id', $classmate->id)->where('subject_id', $subject->id)->first();
                                                $classmate->exam = App\Mark::where('student_id', $classmate->id)->where('term_id', $term->id)->where('subject_id', $subject->id)->first() ? App\Mark::where('student_id', $classmate->id)->where('term_id', $term->id)->where('subject_id', $subject->id)->first()->mark_obtained : 0;
                                                $classmate->test_1 = $t_holder ? ($t_holder->first_a+$t_holder->first_b+$t_holder->first_c) : 0;
                                                $classmate->test_2 = $t_holder ? $t_holder->second : 0;
                                                $classmate->mark = $classmate->exam+$classmate->test_1+$classmate->test_2;
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
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($subject->title); ?></td>
                                            <td><?php echo e($the_first_test ? $the_first_test->first_a+$the_first_test->first_b+$the_first_test->first_c: '-'); ?></td>
                                            <td><?php echo e($the_first_test ? $the_first_test->second: '-'); ?></td>
                                            <td><?php echo e($student->mark->where('subject_id', $subject->id)->first() ? $student->mark->where('subject_id', $subject->id)->first()->mark_obtained : '-'); ?></td>
                                            <td><?php echo e($total); ?>%</td>
                                            <td><?php echo e(App\Mark::checkgradeSpreadsheet($total)); ?></td>
                                            <td><?php echo e(App\Mark::checkgradeSpreadsheetName($total)); ?></td>
                                            <td><?php echo e($my_position+1); ?><sup> <?php echo e(App\Mark::positionLetter($my_position+1)); ?></sup></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <td>CUMMULATIVE: <?php echo e($cummulative); ?>  </td>
                                        <td>MAXIMUM OBTAINABLE:<?php echo e($subjects ? $subjects->count()*100 : ''); ?></td>
                                        <td>AVERAGE SCORE: <?php echo e($subjects ? ($cummulative/($subjects->count()*100))*100 : ''); ?>%</td>
                                        
                                        <td>(<?php echo e(App\Mark::checkgradeSpreadsheet(($cummulative/($subjects->count()*100))*100)); ?>) <?php echo e(App\Mark::checkgradeSpreadsheetName(($cummulative/($subjects->count()*100))*100)); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding:10px">
                               <strong>VACATION DATE: <?php echo e($student->mark->first() ? $student->mark->first()->vacation_date : '-'); ?>

                                <span style="margin-left:40px">  NEXT RESUMPTION DATE: <?php echo e($student->mark->first() ? $student->mark->first()->resumption : '-'); ?></span></strong> 
                            </div>

                            <table style="margin-top:10px;">
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="bg-gray">CLASS TEACHER'S COMMENTS:</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h3><?php echo e($student->mark->first() ? strtoupper($student->mark->first()->teacher_comment) : '-'); ?></h3> 
                                            <p>By <?php echo e($student->mark->first() ? App\User::find($student->mark->first()->teacher_id) ? App\User::find($student->mark->first()->teacher_id)->name : App\User::find($class->teacher_id) ? App\User::find($class->teacher_id)->name: '-' : '-'); ?> on <?php echo e($student->mark->first() ? $student->mark->first()->created_at->format('F d, Y') : '-'); ?></p>
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
                                            <h3><?php echo e($student->mark->first() ? strtoupper($student->mark->first()->principal_comment) : '-'); ?></h3> 
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
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($obedience / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($obedience / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Honesty</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($honesty / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($honesty / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Self-Reliance</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($self_reliance / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($self_reliance / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Self-Control</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($self_control / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($self_control / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Use of Initiative</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($use_of_initiative / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($use_of_initiative / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <?php
                                            $first_ave = (round($obedience / $subjects->count())+round($honesty / $subjects->count())+round($self_reliance / $subjects->count())+round($self_control / $subjects->count())+round($use_of_initiative / $subjects->count()))/5;
                                        ?>
                                        <td colspan="2">Total Average</td>
                                        <td><?php echo e(App\Mark::checkgradeSpreadsheet(($first_ave/5)*100)); ?></td>
                                        <td><?php echo e($first_ave); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2" class="bg-gray">SENSE OF RESPONSIBILITY</td>
                                        <td colspan="2" class="bg-gray">Ratings</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Punctuality</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($punctuality / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($punctuality / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>General Neatness</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($general_neatness / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($general_neatness / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Industry/Perserverance</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($industry_or_perserverance / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($industry_or_perserverance / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Attendance in Class</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($attendance_in_class / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($attendance_in_class / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Attentiveness</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($attentiveness / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($attentiveness / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <?php
                                        $second_ave = (round($punctuality / $subjects->count())+round($general_neatness / $subjects->count())+round($industry_or_perserverance / $subjects->count())+round($attendance_in_class / $subjects->count())+round($attentiveness / $subjects->count()))/5;
                                    ?>
                                    <tr>
                                        <td colspan="2">Total Average</td>
                                        <td><?php echo e(App\Mark::checkgradeSpreadsheet(($second_ave/5)*100)); ?></td>
                                        <td><?php echo e($second_ave); ?></td>
                                    </tr>

                                  
                                    <tr>
                                        <td colspan="2" class="bg-gray">PSYCHOMOTOR DEVELOPMENT</td>
                                        <td colspan="2" class="bg-gray">Ratings</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Handwriting</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($handwriting / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($handwriting / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sports and Games</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($sports_and_games / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($sports_and_games / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Verbal Communication</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($verbal_communication / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($verbal_communication / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Manual Skills (in handling Tools and Equipment)</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($manual_skills / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($manual_skills / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Dexterity in Handling Musical Instruments And Arts Materials</td>
                                        <td><?php echo e($marks ? App\Mark::checkgradeSpreadsheet(((round($handling_musical_instruments / $subjects->count()))/5)*100) : 0); ?></td>
                                        <td><?php echo e($marks ? round($handling_musical_instruments / $subjects->count()) : 0); ?></td>
                                    </tr>
                                    <?php
                                        $third_ave = (round($handwriting / $subjects->count())+round($sports_and_games / $subjects->count())+round($verbal_communication / $subjects->count())+round($manual_skills / $subjects->count())+round($handling_musical_instruments / $subjects->count()))/5;
                                    ?>
                                    <tr>
                                        <td colspan="2">Total Average</td>
                                        <td><?php echo e(App\Mark::checkgradeSpreadsheet(($third_ave/5)*100)); ?></td>
                                        <td><?php echo e($third_ave); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="bg-gray">BEHAVIOURAL SUMMARY</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">SCORE</td>
                                        <td><?php echo e(round($bs_score / $subjects->count())); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">RATING</td>
                                        <td><?php echo e(App\Mark::checkgradeSpreadsheet(((round($bs_score / $subjects->count()))/5)*100)); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">PERCENTAGE</td>
                                        <td><?php echo e(((round($bs_score / $subjects->count()))/5)*100); ?>%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <div style="margin-left:20px"><img style="max-height:70px; margin-top:5px; margin-bottom:-15px" src="<?php echo e(asset('ev-assets/uploads/school-images/33761.jpg')); ?>" alt=""> </div>
                                <p>______________________________</p>
                                <h3>PRINCIPAL'S SIGNATURE</h3>
                                <p><?php echo e($student->mark->first() ? $student->mark->first()->created_at->format('F d, Y') : '-'); ?></p>
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