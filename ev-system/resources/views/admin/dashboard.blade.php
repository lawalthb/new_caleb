@extends('layouts.app')
@section('title')
<?php 
  $students = App\Student::orderBy('created_at','desc')->paginate(8);
      // site config using database
      $settings = App\Settings::find(1);
      $authed = Auth::user();
      if (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
       $count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count();

?>
{{ $settings->system_title }} | {{ trans('dashboard_lang.panel_title') }}
@endsection
@section('content')
<style type="text/css">.white-box .m-b-20{font-family: roboto, corbel, trebuchet ms}</style>
    <!-- .row -->
      <div class="row">

        <div class="col-lg-6">
          <h4></h4>
          <div class="white-box cst-white-box">
            <h3 class="box-title">Attendance Stats (<?php echo date('d').'-'.date('M').'-'.date('Y');?>)</h3>
            <ul class="basic-list">
              <?php 
              $date = (int)date('Y').'-'.(int)date('m').'-'.(int)date('d');
              $stud = App\Student::all();?>
              @foreach($classes as $class)
              <?php 
              $sum = 0;
              $diff = 0;?>
              @foreach($stud->where('class_id',$class->id) as $stt)
                <?php 
                $getattc = App\Attendance::where('date',$date)->where('student_id',$stt->id)->where('status',1)->count();
                $getattb = App\Attendance::where('date',$date)->where('student_id',$stt->id)->where('status',0)->count();
                if ($getattc) {
                  $sum = $sum + $getattc;
                }
                elseif ($getattb) {
                  $diff = $diff + $getattb;
                }
                ?>
              @endforeach
              <li>{{ $class->title }}<span class="pull-right label-danger label">{{ $diff }} Absent</span> <span class="pull-right label-success label">{{ $sum }} Present</span></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 teller">
          <h4></h4>
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box1">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_student') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="icon-graduation text-info"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Student::where('active', 1)->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box2">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_teacher') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-megna"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Teacher::where('active', 1)->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box3">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_parent') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-danger"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Parents::where('active', 1)->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box4">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_attendance') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-calendar text-success"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Attendance::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      

          <!-- .row -->
    <div class="row">
      <div class="col-sm-8">
          <div class="white-box cst-white-box2">
            <h3 class="box-title">Class Stats</h3>
            <ul class="basic-list">
              <?php 
              $stud = App\Student::all();?>
              @foreach($classes as $class)
              <li>{{ $class->title }}<span class="pull-right label-success label">{{ $stud->where('class_id',$class->id)->count() }}  @if($stud->where('class_id',$class->id)->count() >0)Students  @else  Student @endif</span></li>
              @endforeach
            </ul>
          </div>
        </div>
      <div class="col-md-4 col-lg-4 col-xs-12">
          <div class="white-box">
            <div class="user-bg"> <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="user" style="100%">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}"></a>
                  <h4 class="text-white">{{ Auth::user()->name }}</h4>
                  <h5 class="text-white">{{ Auth::user()->email }}</h5>
                </div>
              </div>
            </div>
            <div class="user-btm-box">
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-purple"><i class="fa fa-envelope-o"></i></p>
                <h1>{{ $count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count() }}</h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-blue"><i class="fa  fa-bullhorn"></i></p>
                <h1>{{ $notices->count() }}</h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-danger"><i class="fa fa-pencil-square"></i></p>
                <h1>{{ $posts->count() }}</h1>
              </div>
              <div class="stats-row col-md-12 m-t-20 m-b-0 text-center">
                <div class="stat-item">
                  <h6>Contact info</h6>
                  <b><i class="ti-mobile"></i>{{ Auth::user()->email }}</b></div>
                
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="{{ asset('ev-assets/uploads/post-images/'.$post->image) }}">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10"><i class="fa  fa-calendar-o"></i> {{ $post->created_at->format('d, M Y \a\t h:i a') }}</span><a href="{{  url('posts/edit/'.$post->slug.'?_token='.csrf_token()) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="active"  data-toggle="modal" href="#myModaldel{{ $post->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>

                                    <!-- Delete Modal -->
                        <div class="modal fade" id="myModaldel{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        
                                    </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                        <a href="{{ url('posts/delete/'.$post->id) }}">
                                        <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
            <h3 class="m-t-20 m-b-20"><a href="{{ url('posts/'.$post->slug) }}">{{ $post->title }}</a></h3>
            <p>{!! str_limit($post->body, $limit = 300, $end = '.......') !!}</p>
            <a href="{{ url('posts/'.$post->slug) }}"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button></a>
          </div>
        </div>
        @endforeach
      </div>
@endsection