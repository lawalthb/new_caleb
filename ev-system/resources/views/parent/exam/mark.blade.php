@extends('layouts.app')

@section('title')
{{ trans('report_lang.report_mark') }}
@endsection
@section('content')
<?php 
$settings = App\Settings::find(1);
?>
<style type="text/css">
    #sinfo{display: none}
    #sinfo1{display: none}
    #sinfo2{display: none}
    #sinfo3{display: none}
</style>
 
            <div class="row">
                  <div class="col-lg-12" id="evmark">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('report_lang.report_mark') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                        <h1 align="center" id="sinfo1">{{ $settings->system_name }}</h1>
                        <h5 align="center" id="sinfo2"><i>{{ $settings->address }}</i></h5>
                          <header class="panel-heading">
                              {{ trans('report_lang.report_mark') }}
                          </header>
                          <button class="btn btn-primary" type="button" onclick="printview()" id="evmarkp"><i class="fa fa-print"></i> {{ trans('mark_lang.print') }}</button>
                          <div class="mail-box">
                  <aside class="sm-side" id="evmarkit">
                      
                      <ul class="inbox-nav inbox-divider">
                          @foreach( $exams as $exam )
                          <li>
                              <a href="{{ url('parent/marks/'.$id.'/'.$exam->id) }}" class="active"><i class="fa fa-signal"></i> {{ $exam->name}} ({{ $exam->date}}) </a>
                          </li>
                          @endforeach
                      </ul>
                  </aside>
                  <aside class="lg-side">
                    <div id="sinfo">
                      <?php
                      $info = App\User::find($id);

                      ?>
                      <header class="panel-heading">
                              <u>Name:   {{ $info->name }}</u>
                              <br>
                             <u> Email:  {{ $info->email }}</u>
                            </header>
                            </div>
                          <table class="table table-striped table-advance table-hover" id="1">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('subject_lang.subject_class_name') }}</th>
                                 <th>{{ trans('report_lang.mark_subject') }}</th>
                                  <th>{{ trans('report_lang.mark_mark') }}</th>
                                  <th>{{ trans('report_lang.mark_point') }}</th>
                                 <th> {{ trans('report_lang.mark_grade') }}</th>
                                 <th>{{ trans('exam_lang.exam_note') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                                 <?php
                                $duo = 0;?>
                              @foreach( $marker as $key => $mark )
                              <?php $duo = $duo + $mark->mark_obtained; ?>
                              <tr>
                                  <td data-title="">{{ $key+1 }}</td>
                                  <td data-title="">@if($mark->classname($mark->class_id)){{ $mark->classname($mark->class_id)->title }}@endif</td>
                                  <td data-title="">@if($mark->subject($mark->subject_id)){{ $mark->subject($mark->subject_id)->title }}@endif</td>
                                  <td data-title="">{{ $mark->mark_obtained }}</td>
                                  <td data-title="">{{ $mark->checkgrade($mark->mark_obtained) }}</td>
                                  <td data-title="">{{ $mark->check($mark->mark_obtained) }}</td>
                                  <td data-title="">{{ $mark->comment }}</td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                          <div>

                            <div align="center"><u><b>Percentage:</b></u> <h1><b>@if($duo != 0){{ ($duo/($marker->count() * 100))*100 }}@else 0 @endif % </b></h1></div><br>
                            <p id="sinfo3">Headmaster's/HOD's Signature: _________________________________</p>
                          </div>
                        </aside>
                      </div>
                      </section>
                  </div>
              </div>
               
<script type="text/javascript">

function printview () {
document.getElementById("evmark").style.display = "none";
document.getElementById("evmarkit").style.display = "none";
document.getElementById("evmarkp").style.display = "none";
document.getElementById("ev-header").style.display = "none";
document.getElementById("ev-side").style.display = "none";
document.getElementById("ev-footer").style.display = "none";
document.getElementById("sinfo").style.display = "block";
document.getElementById("sinfo1").style.display = "block";
document.getElementById("sinfo2").style.display = "block";
document.getElementById("sinfo3").style.display = "block";
window.print();
}

      </script>
@endsection