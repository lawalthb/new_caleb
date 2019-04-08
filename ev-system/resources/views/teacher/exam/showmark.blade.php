@extends('layouts.app')

@section('title')
{{ trans('routine_lang.add_routine') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Students Mark Sheet</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Students Mark Sheet
                          </header>

                                @if ( !$students->count() )
                                <div style="padding: 10px">There is no marksheet available in this class...</div>
                                @else 
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Picture</th>
                                  <th>Student's Name</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach($students as $post)
                              <tr>
                                  <td data-title=""><a href="#">{{ $post->id }}</a></td>
                                  <td data-title=""> <img src="{{ asset('ev-assets/uploads/avatars/'.$post->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title=""><a href="#">{{ $post->name }}</a></td>
                                  <td data-title="">
                                      <a class="active" href="#myModal{{ $post->id }}" data-toggle="modal">
                                        <button class="btn btn-primary btn-xs" style="padding:8px"><i class="fa fa-signal "></i> View Mark Sheet</button>
                                      </a>
                                      <!-- Modal -->
                              <div class="modal fade" id="myModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">View Mark Sheet</h4>
                                          </div>
                                          <div class="modal-body">
                                              <header class="panel-heading">
                                                  Name: {{ $post->name }}
                                              </header>
                                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                  @foreach( $exams as $class )
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
                                                        <table class="table table-bordered">
                                                          <thead>
                                                            <tr>
                                                              <th>Subject</th>
                                                              <th>Mark Obtained</th>
                                                              <th>Highest Mark</th>
                                                              <th>Grade</th>
                                                              <th>Comment</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            @foreach( $subjects as $sub )
                                                            <tr>
                                                              <th scope="row">{{ $sub->title}}</th>
                                                              <td data-title="">
                                                              @foreach( $marks->where('class_id',$post->class_id)->where('exam_id', $class->id)->where('student_id', $post->id)->where('subject_id', $sub->id) as $mark) 
                                                                {{ $mark->mark_obtained }}
                                                              @endforeach
                                                              </td>
                                                              <td data-title="">   

                                                              </td>
                                                              <td data-title=""> 
                                                                @foreach( $marks->where('class_id',$post->class_id)->where('exam_id', $class->id)->where('student_id', $post->id)->where('subject_id', $sub->id) as $mark) 
                                                                {{ $mark->check($mark->mark_obtained) }}
                                                              @endforeach
                                                              </td>
                                                              <td data-title=""> 
                                                                @foreach( $marks->where('class_id',$post->class_id)->where('exam_id', $class->id)->where('student_id', $post->id)->where('subject_id', $sub->id) as $mark) 
                                                                {{ $mark->comment }}
                                                              @endforeach
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                        <div style="width:30%;margin:auto">Total Score: 
                                                              <?php $sum = 0;?>
                                                              @foreach( $marks->where('class_id',$post->class_id)->where('exam_id', $class->id)->where('student_id', $post->id) as $mark) 
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
                              </tr>
                               @endforeach
                              
                              </tbody>
                          </table>
                          @endif
                      </section>
                  </div>
              </div>
              <!-- page end-->

      

@endsection

