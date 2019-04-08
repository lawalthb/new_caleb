@extends('layouts.app')

@section('title')
{{ trans('mark_lang.panel_title') }}
@endsection
@section('content')
 
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">{{ trans('mark_lang.panel_title') }}</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ trans('mark_lang.panel_title') }}
                </header>
                <a class="btn btn-primary" href="{{url('exam/upload-bulk-exam')}}" style="margin:5px">
                Upload Bulk Exam Results
                </a>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
            <tr>
                <th>{{ trans('mark_lang.mark_select_exam') }}</th>
                <th>{{ trans('mark_lang.mark_select_classes') }}</th>
                <th>{{ trans('mark_lang.mark_select_subject') }}</th>
           </tr>
       </thead>
        <tbody>
            <form method="post" action="{{ url('select_mark') }}" class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr class="gradeA">
                    <td data-title="">
                        <select name="exam" class="form-control">
                            <option value="">{{ trans('mark_lang.mark_select_exam') }}</option>
                            @foreach( $exams as $exam)
                            <option value="{{ $exam->id }}"> {{ $exam->name }} - ({{ $exam->term ? $exam->term->name : '-' }} - {{ $exam->term && $exam->term->academic_session ? $exam->term->academic_session->name : '-'}})  </option>
                            @endforeach
                        </select>
                    </td>
                    <td data-title="">
                        <select name="class" class="form-control" data-validate="required" id="class_id" 
                                              data-message-required="this is required"
                                                onchange="return get_class_subjects(this.value)" required>
                            <option value="">{{ trans('mark_lang.mark_select_classes') }}</option>
                             @foreach( $classes as $clas)
                            <option value="{{ $clas->id }}"> {{ $clas->title }} </option>
                            @endforeach
                        </select>
                    </td>
                    <td data-title="">
                        <select name="subject" class="form-control" id="section_selector_holder" required>
                            <option value="">{{ trans('mark_lang.mark_select_subject') }}</option>
                        </select>
                    </td>
                    <td align="center"><input type="submit" value="{{ trans('mark_lang.add_mark') }}" class="btn btn-info"/></td>
                </tr>
            </form>
        </tbody>
    </table>
<hr />

@if($examm!='' && $class_id!='') 
    {!! Form::open(array('url'=>'manage_mark','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
    <div id="hide-table">
      <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>{{ trans('mark_lang.mark_name') }}</th>
                      <th>{{ trans('mark_lang.mark_mark') }} (out of 100)</th>
                      <th>{{ trans('grade_lang.grade_note') }}</th>
                  </tr>
                </thead>
                <tbody>
                 
                    @foreach( $students as $student )
                        <tr>
                            <td data-title="#"><a href="#">{{ $student->id }}</a></td>
                            <td data-title="{{ trans('mark_lang.mark_name') }}">{{ $student->name }}
                            <input type="hidden" class="form-control" value="{{ $student->id }}" name="student_id[]">
                            <input type="hidden" class="form-control" value="{{ $class_id }}" name="class_id">
                            <input type="hidden" class="form-control" value="{{ $subject }}" name="subject_id">
                            <input type="hidden" class="form-control" value="{{ $examm }}" name="exam_id">
                            </td>
                            <td data-title="{{ trans('mark_lang.mark_mark') }} (out of 100)">
                                <input type="text" class="form-control" value="<?php echo $getmark->where('student_id', $student->id)->first() ? $getmark->where('student_id', $student->id)->first()->mark_obtained : null?>" name="mark_obtained[]">
                            </td>
                            <td data-title="{{ trans('grade_lang.grade_note') }}">
                                <input type="text" class="form-control" value="<?php echo $getmark->where('student_id', $student->id)->first() ? $getmark->where('student_id', $student->id)->first()->comment : null?>" name="comment[]">
                            </td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
            <div class="form-group" style="padding: 60px 30px">
                <button class="btn btn-primary" type="submit">Mark Exam</button>
            </div>
          </form>
            @endif
        </section>
    </div>
</div>
               

<script type="text/javascript">

  function get_class_subjects(class_id) {

      $.ajax({
            url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });
   
    } 
</script>

@endsection










