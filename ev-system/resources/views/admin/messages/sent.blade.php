@extends('layouts.app')

@section('title')
{{ trans('student_lang.panel_title') }}
@endsection
@section('content')

<?php $authe = Auth::user();?>
<!--main content start-->
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
                                          <h4 class="modal-title">{{ trans('message_lang.add_title') }}</h4>
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
                          <li>
                              <a href="{{ url('messages') }}"><i class="fa fa-group"></i> {{ trans('message_lang.inbox') }}  <span class="label label-danger pull-right">{{ $count }}</span></a>
                          </li>
                          <li class="active">
                              <a href="{{ url('messages/sent') }}"><i class=" fa fa-check-square-o"></i>{{ trans('message_lang.sent') }}</a>
                          </li>
                      </ul>

                      

                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>Inbox</h3>
                            
                      </div>
                       
                          <table class="table table-inbox table-hover">
                            <tbody>
                            @foreach( $messages as $message )
                              <tr class="<?php if ($message->active == 0) { echo "unread"; } ?>">
                                  <td class="inbox-small-cells">
                                      <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                  <td class="view-message  dont-show">
                                    <?php
                                      if ('admin'  == $message->from_role) {
                                        $sender = App\User::where('role',$message->from_role);
                                      }
                                      elseif ('student' == $message->from_role) {
                                        $sender = App\User::where('role',$message->from_role);
                                      }
                                      elseif ('parent' == $message->from_role) {
                                        $sender = App\User::where('role',$message->from_role);
                                      }
                                      elseif ('teaching' == $message->from_role) {
                                        $sender = App\User::where('role',$message->from_role);
                                      }
                                      ?>
                                    {{ $sender->where('id',$message->from)->first()->name }}
                                  </td>
                                  <td class="view-message "><a href="{{ asset('messages/'.$message->id) }}">{{ $message->title }}</a></td>
                                  <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message  text-right">{{ $message->created_at->format('d M,Y \a\t h:i a') }}</td>
                              </tr>
                            @endforeach
                            
                              
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
              <!--mail inbox end-->
          </section>
      </div>
      <!--main content end-->
@endsection


