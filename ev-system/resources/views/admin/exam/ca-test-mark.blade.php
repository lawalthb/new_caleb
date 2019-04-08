@extends('layouts.app')

@section('title')
Continuous Assessment Tests
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Continuous Assessment Tests</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Continuous Assessment Tests
                          </header>
                          {!! Form::open(array('url'=>'ca-tests/store','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                          <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>{{ trans('mark_lang.mark_name') }}</th>
                                        <th>First C.A Test (out of 20)</th>
                                        <th>Second C.A Test (out of 20)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach( $students as $student )
                                            <tr>
                                                <td data-title="{{ trans('mark_lang.mark_name') }}">{{ $student->name }}
                                                </td>
                                                <td data-title="{First C.A Test (out of 20)">
                                                    <input type="text" class="form-control" value="{{$student->ca_test ? $student->ca_test->first : ''}}" name="first[]">
                                                </td>
                                                <td data-title="Second C.A Test (out of 20)">
                                                    <input type="text" class="form-control" value="{{$student->ca_test ? $student->ca_test->second : ''}}" name="second[]">
                                                </td>
                                                <input type="hidden" class="form-control" value="{{ $student->id }}" name="student_id[]">
                                                <input type="hidden" class="form-control" value="{{ $class_id }}" name="class_id">
                                                <input type="hidden" class="form-control" value="{{ $subject_id }}" name="subject_id">
                                                <input type="hidden" class="form-control" value="{{ $term_id }}" name="term_id">
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-2" style="padding: 60px 0px">
                                    <button class="btn btn-danger btn-block" type="submit">Save Test</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
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