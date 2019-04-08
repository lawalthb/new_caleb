@extends('layouts.app')

@section('title')
Test Starts
@endsection
@section('content')
<style type="text/css">
.timer{float: right;}
.istime{color: red;font-size: 25px}
.jst-hours {
  float: left;
}
.jst-minutes {
  float: left;
}
.jst-seconds {
  float: left;
}
.jst-clearDiv {
  clear: both;
}
.jst-timeout {
  color: red;
}
.more .radio-inline {display: block;margin: 10px}
</style>
<body onload="lll()">

            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Test Starts</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Test Start
                          </header>
                          <header class="panel-heading">
                          <div style="float:left;">
                          <div class="timer" id="tim"></div>
                        </div>
                        </header>
                          <div class="well">
                            <form method="POST" action="{{ url('student/test/store') }}" id="form_id">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="test_id" value="{{ $id }}">
                            <div class="tab-content">
                              <?php foreach ($questions as $key => $value) { ?>
                             
                              <div id="menu{{ $value->id }}" class="tab-pane fade in @if(($key+1) == '1') active @endif">
                                <h3>Question {{ $key+1 }}</h3>
                                <p>{{ $value->question }}</p>
                                <div class="radio-list more">
                                <label class="radio-inline">
                                  <input type="radio" name="{{ $key+1 }}" value="{{ $value->option_a }}">a. {{ $value->option_a }}
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="{{ $key+1 }}" value="{{ $value->option_b }}">b. {{ $value->option_b }}
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="{{ $key+1 }}" value="{{ $value->option_c }}">c. {{ $value->option_c }}
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="{{ $key+1 }}" value="{{ $value->option_d }}">d. {{ $value->option_d }}
                                </label>
                                </div>
                              </div>
                             <?php  }?> 
                            </div>
                            <ul class="pagination">
                              <?php foreach ($questions as $key => $value) { ?>
                              <li class="@if(($key+1) == '1') active @endif"><a data-toggle="pill" href="#menu{{ $value->id }}">{{ $key+1 }}</a></li>
                              <?php  }?> 
                            </ul>
                            <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Submit Test</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure you want to submit?</p>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                      <input type="submit" class="btn btn-primary" value="Yes" style="float:right;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Modal -->
                              
                              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"style="">Submit Exam</button>
                            </form>
                            <p style="font-size:9px;color:red"><i>Note: Submit test before the time is up!!!</i></p>

                          </div>
                      </section>
                  </div>
              </div>
               
<script type="text/javascript" src="https://cdn.rawgit.com/sygmaa/CircularCountDownJs/master/circular-countdown.min.js"></script>
<script>
function lll (argument) {
  $('.timer').circularCountDown({
          duration: {
              seconds: {{ $test->duration}}
          
          },
      end: function(){
        alert('time up!!!!!!!!!!!!!!!');
        $('#form_id').submit();
      }
        });

/**/  
}    
</script>
@endsection
