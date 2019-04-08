@extends('layouts.app')

@section('title')
{{ trans('student_lang.panel_title') }}
@endsection
@section('content')
<?php $auth = Auth::user(); ?>

@if($messages->from_role == "parent")
<?php $senderget = App\User::where('role', 'parent')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "student")
<?php $senderget = App\User::where('role', 'student')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "admin")
<?php $senderget = App\User::where('role', 'admin')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "teacher")
<?php $senderget = App\User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();?>
@endif

                            
<?php  
session_start();
      $_SESSION['hasVisited']="yes";
      if ($_SESSION["hasVisited"]) {
        if ($messages->from_role != $auth->role) {
      App\Message::where('id',$messages->id)->update(['active' => '1']);
       }
      }?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
              <!--mail inbox start-->
              <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a href="javascript:;" class="inbox-avatar">
                              <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="" height="60px" width="60px">
                          </a>
                          <div class="user-name">
                              <h5><a href="#">{{ $authe->name }}</a></h5>
                              <span><a href="#">{{ $authe->email }}</a></span>
                          </div>
                          <a href="javascript:;" class="mail-dropdown pull-right">
                              <i class="fa fa-chevron-down"></i>
                          </a>
                      </div>
                      <div class="inbox-body">
                          <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                               {{ trans('message_lang.add_title') }}
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title"> {{ trans('message_lang.add_title') }}</h4>
                                      </div>
                                      <div class="modal-body">
                                          {!! Form::open(array('url'=>'messages/store','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('message_lang.to') }}</label>
                                                  <div class="col-lg-10">
                                                     <select name="recipient" class="form-control" required>
                                                        <option value="">Select a recepient</option>
                                                        @if(Auth::user()->role == 'student')
                                                            @foreach( App\User::where('role', 'student')->where('class_id', Auth::user()->class_id)->get() as $stu)
                                                                <option value="{{ $stu->id }},{{ $stu->role }}">{{ trans('topbar_menu_lang.menu_student') }} - {{ $stu->name }} </option>
                                                            @endforeach
                                                        @endif
                                                        @foreach( $teachers as $tea)
                                                            <option value="{{ $tea->id }},{{ $tea->role }}">{{ trans('topbar_menu_lang.menu_teacher') }} - {{ $tea->name }} </option>
                                                        @endforeach
                                                        @if(Auth::user()->role == 'admin')
                                                            @foreach( App\User::where('role', 'student')->get() as $stu)
                                                                <option value="{{ $stu->id }},{{ $stu->role }}">{{ trans('topbar_menu_lang.menu_student') }} - {{ $stu->name }} </option>
                                                            @endforeach
                                                            @foreach( $teachers as $tea)
                                                                <option value="{{ $tea->id }},{{ $tea->role }}">{{ trans('topbar_menu_lang.menu_teacher') }} - {{ $tea->name }} </option>
                                                            @endforeach
                                                            @foreach( $parents as $par)
                                                            <option value="{{ $par->id }},{{ $par->role }}">{{ trans('topbar_menu_lang.menu_parent') }} - {{ $par->name }} </option>
                                                            @endforeach
                                                            @foreach( $admins as $adm)
                                                                <option value="{{ $adm->id }},{{ $adm->role }}">{{ trans('topbar_menu_lang.Admin') }} - {{ $adm->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">{{ trans('message_lang.message_title') }}</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" name="title" class="form-control" id="inputPassword1" placeholder="" required>
                                                      <input type="hidden" name="from" class="form-control" id="inputPassword1" placeholder="" value="{{ $authe->id }}">
                                                      <input type="hidden" name="from_role" class="form-control" id="inputPassword1" placeholder="" value="{{ $authe->role }}">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">{{ trans('message_lang.message_message') }}</label>
                                                  <div class="col-lg-10">
                                                      <textarea name="body" id="" class="form-control" cols="30" rows="10" required></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <button type="submit" class="btn btn-send">{{ trans('message_lang.send') }}</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="{{ url('messages') }}"><i class="fa fa-group"></i> {{ trans('message_lang.inbox') }}  <span class="label label-danger pull-right">{{ $count }}</span></a>
                          </li>
                          <li>
                              <a href="{{ url('messages/sent') }}"><i class=" fa fa-check-square-o"></i>{{ trans('message_lang.sent') }}</a>
                          </li>
                      </ul>
                      </ul>


                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>{{ trans('message_lang.read_message') }} </h3>
                            
                      </div>
                      <div class="inbox-body">
                              <div class="heading-inbox row">
                                  <div class="col-md-8">
                                      <div class="compose-btn">
                                          <a class="btn btn-sm btn-primary" href="#reply"><i class="fa fa-reply"></i> {{ trans('message_lang.reply') }} </a>
                                          <!-- <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
                                          <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm tooltips"><i class="fa fa-trash-o"></i></button> -->
                                      </div>

                                  </div>
                                  <div class="col-md-4 text-right">
                                      <p class="date">{{ $messages->created_at->format('d M,Y \a\t h:i a') }}</p>
                                  </div>
                                  <div class="col-md-12">
                                      <h4> {{ $messages->title }}</h4>
                                  </div>
                              </div>
                              <div class="sender-info">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <i class=" fa fa-user"></i>
                                          <?php
                                          if ('admin'  == $messages->from_role) {
                                            $sender = App\User::where('role',$messages->from_role);
                                          }
                                          elseif ('student' == $messages->from_role) {
                                            $sender = App\User::where('role',$messages->from_role);
                                          }
                                          elseif ('parent' == $messages->from_role) {
                                            $sender = App\User::where('role',$messages->from_role);
                                          }
                                          elseif ('teaching' == $messages->from_role) {
                                            $sender = App\User::where('role',$messages->from_role);
                                          }
                                          ?>
                                          <strong>{{ $sender->where('id',$messages->from)->first()->name }}</strong>
                                          <span>[ {{ $sender->where('id',$messages->from)->first()->email }} ]</span>
                                          <a class="sender-dropdown " href="javascript:;">
                                              <i class="fa fa-chevron-down"></i>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="view-mail" style="border-bottom:1px solid #88918d;margin-bottom:20px">
                                  <p>{{ $messages->body }}</p>
                              </div>
                              <ul class="fb-comments">
                                  @foreach( $replies->where('message_id',"$messages->id") as $reply )
                                    <?php $author = App\User::find($reply->author_id); ?>
                                      <li>
                                          <a href="#" class="cmt-thumb">
                                              <img src="{{ asset('ev-assets/uploads/avatars/'.$author->image) }}" alt="">
                                          </a>
                                          <div class="cmt-details">
                                              <a href="#">
                                                <?php
                                                if ($reply->author_role == 'student') {
                                                  $author = App\User::find($reply->author_id);
                                                  echo $author->name;
                                                }elseif ($reply->author_role == 'admin') {
                                                 $author = App\User::find($reply->author_id);
                                                  echo $author->name;
                                                }
                                                elseif ($reply->author_role == 'teaching') {
                                                 $author = App\User::find($reply->author_id);
                                                  echo $author->name;
                                                }
                                                elseif ($reply->author_role == 'parent') {
                                                 $author = App\User::find($reply->author_id);
                                                  echo $author->name;
                                                }
                                                ?>

                                              </a>
                                              <span> {{ $reply->body }}</span>
                                              <p>{{ $reply->created_at->format('d M,Y \a\t h:i a') }}
                                                <?php
                                                if ($authe->role == 'admin' || $reply->author_id == $authe->id) { ?>
                                                - <a href="{{ url('messages/reply/delete/'.$reply->id) }}" class="like-link">Delete</a>
                                              <?php  } ?>
                                                </p>
                                          </div>
                                      </li>
                                  @endforeach
                                  </ul>
                              <form action="{{ url('messages/reply') }}" class="form-horizontal tasi-form" method="POST" id="reply">
                                  <input type="hidden" name="message_id" value="{{ $messages->id }}">
                                  <input type="hidden" name="author_id" value="{{ $authe->id }}">
                                  <input type="hidden" name="author_role" value="{{ $authe->role }}">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="form-group col-md-9">
                                          <label class="exampleInputFile">{{ trans('message_lang.reply') }} </label><br>
                                          <textarea name='body' class="form-control" rows="10">{{ old('body') }}</textarea>
                                        
                                  </div>
                                    <div class="form-group col-md-9">
                                      <button type="submit" name='publish' class="btn btn-primary">{{ trans('message_lang.reply') }} </button>
                                    </div>
                              </form>
                          </div>
                  </aside>
              </div>
              <!--mail inbox end-->
          </section>
      </div>
      <!--main content end-->
@endsection


