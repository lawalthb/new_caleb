@extends('layouts.app')
    @section('title')
        Student Promotion
    @endsection
@section('content')
<!--main content start-->
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">Student Promotion</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Student Promotion
                </header>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Promote from</th>
                            <th>Promote to</th>
                            <th>Current Session</th>
                            <th>Promote to Session</th>
                            <th>{{ trans('sattendance_lang.action') }}</th>
                    </tr>
                </thead>
                    <tbody>
                        <form method="post" action="{{ url('select-student-promotion') }}" class="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <tr class="gradeA">
                                <td data-title="">
                                    <select name="current_class" class="form-control">
                                        @foreach(App\Classes::all() as $class)
                                            <option value="{{$class->id}}" {{ $current_class && $current_class == $class->id ? "selected" : null}} >{{$class->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td data-title="">
                                <select name="next_class" class="form-control">
                                        @foreach(App\Classes::all() as $class)
                                            <option value="{{$class->id}}" {{ $next_class && $next_class == $class->id ? "selected" : null}} >{{$class->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td data-title="">
                                    <select name="promote_from" class="form-control">
                                        @foreach(App\AcademicSession::all() as $sessionEach)
                                            @if($sessionEach->current == 1)
                                                <option value="{{$sessionEach->id}}">{{$sessionEach->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td data-title="">
                                    <select name="promote_to" class="form-control">
                                        <?php 
                                            $currSession = App\AcademicSession::where('current', 1)->first(); 
                                            if($currSession && $currSession->count() > 0){ 
                                                if(App\AcademicSession::findNext($currSession->id)){
                                                    $nextSession = App\AcademicSession::findNext($currSession->id); 
                                                ?>
                                                    <option value="{{$nextSession->id}}">{{$nextSession->name}}</option>
                                            <?php }
                                                else{
                                                    echo "<option>There is no next session</option>";
                                                }
                                            }
                                            else{
                                                echo "<option>There is no next session</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td data-title=""><input type="submit" value="Start Promotion" class="btn btn-info"></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            <hr />




@if($current_class && App\User::where('class_id', $current_class)->get()->count() > 0)
    @if(isset($current_class) && isset($next_class) && isset($promote_from) && isset($promote_to))
    <div class="row" id="update_attendance" style="padding-bottom:50px">
        <form method="post" 
            action="{{ url('student-promotion') }}/<?php echo $current_class.'/'.$next_class.'/'.$promote_from.'/'.$promote_to;?>">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-offset-3 col-md-6">
                    <table  class="table table-bordered">
                        <thead>
                            <tr class="gradeA">
                                <th>Registration No</th>
                                <th>Name</th>
                                <th>Academic Performance</th>
                                <th>Select Class</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                            @foreach (App\User::where('role', 'student')->where('class_id', $current_class)->get() as $student)
                                <tr class="gradeA">
                                    <td data-title="">{{ $student->reg_no }}</td>
                                    <td data-title="">{{ $student->name }}</td>
                                    <td data-title="">
                                    <a class="active" href="#myModal{{ $student->id }}" data-toggle="modal">
                                        <button class="btn btn-primary btn-xs" style="padding:8px"><i class="fa fa-signal "></i> {{ trans('report_lang.mark_information') }}</button>
                                    </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">{{ trans('report_lang.mark_information') }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <header class="panel-heading">
                                                            {{ trans('student_lang.student_name') }}: {{ $student->name }}
                                                        </header>
                                                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                            @foreach(App\Exam::all() as $class )
                                                            <div class="panel">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $class->id }}">
                                                                                <i class="fa fa-rss"></i> {{ $class->name }} #{{ $class->id }}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse{{ $class->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="panel-body">
                                                                <table class="table table-bordered" id="markam">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>{{ trans('report_lang.mark_subject') }}</th>
                                                                        <th>{{ trans('report_lang.mark_mark') }}</th>
                                                                        <th>{{ trans('report_lang.mark_point') }}</th>
                                                                        <th>{{ trans('report_lang.mark_grade') }}</th>
                                                                        <th>{{ trans('exam_lang.exam_note') }}</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach( App\Subject::all() as $sub )
                                                                    <tr>
                                                                        <th scope="row">{{ $sub->title}}</th>
                                                                        <td data-title="">
                                                                        @foreach( App\Mark::all()->where('class_id',$student->class_id)->where('exam_id', $class->id)->where('student_id', $student->id)->where('subject_id', $sub->id) as $mark) 
                                                                        {{ $mark->mark_obtained }}
                                                                        @endforeach
                                                                        </td>
                                                                        <td data-title="">  
                                                                        @foreach( App\Mark::all()->where('class_id',$student->class_id)->where('exam_id', $class->id)->where('student_id', $student->id)->where('subject_id', $sub->id) as $mark) 
                                                                        {{ $mark->checkgrade($mark->mark_obtained) }}
                                                                        @endforeach 
                                                                        </td>
                                                                        <td data-title=""> 
                                                                        @foreach( App\Mark::all()->where('class_id',$student->class_id)->where('exam_id', $class->id)->where('student_id', $student->id)->where('subject_id', $sub->id) as $mark) 
                                                                        {{ $mark->check($mark->mark_obtained) }}
                                                                        @endforeach
                                                                        </td>
                                                                        <td data-title=""> 
                                                                        @foreach( App\Mark::all()->where('class_id',$student->class_id)->where('exam_id', $class->id)->where('student_id', $student->id)->where('subject_id', $sub->id) as $mark) 
                                                                        {{ $mark->comment }}
                                                                        @endforeach
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div style="width:30%;margin:auto">Total Score: 
                                                                        <?php $sum = 0;?>
                                                                        @foreach( App\Mark::all()->where('class_id',$student->class_id)->where('exam_id', $class->id)->where('student_id', $student->id) as $mark) 
                                                                        <?php $sum = $sum + $mark->mark_obtained;?>
                                                                        @endforeach
                                                                        <?php echo $sum; ?></div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- modal -->
                                    </td>
                                    <td>
                                        <select name="newclass[]" class="form-control" style="width:100px; float:left;">
                                            @foreach(App\Classes::all() as $class)
                                            <option value="{{$class->id}}" {{ $class->id == $next_class ? "selected='selected'" : null}} >{{$class->title}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <input type="hidden" name="student_id[]" value="<?php echo $student->id;?>" />

                            @endforeach
                            
                        </tbody>
                    </table>
                    <input type="hidden" name="current_class" value="<?php echo $current_class;?>" />
                    <input type="hidden" name="next_class" value="<?php echo $next_class;?>" />
                    <input type="hidden" name="promote_from" value="<?php echo $promote_from;?>" />
                    <input type="hidden" name="promote_to" value="<?php echo $promote_to;?>" />
                    <input type="submit" class="btn btn-info" value="Promote Student">
                </div>
            
            
        </form>
    </div>  
    @endif    
    
@endif    

@endsection










