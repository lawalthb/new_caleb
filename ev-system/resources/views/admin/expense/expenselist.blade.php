@extends('layouts.app')

@section('title')
{{ trans('expense_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('expense_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('expense_lang.panel_title') }}
                          </header>
                           @if(Session::has('message'))   
                            <div class="white-box">
                              @if(Session::get('message') == trans('topbar_menu_lang.success'))
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @else
                              <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @endif
                            </div>
                            @endif
                            @if(Session::has('data'))   
                            <div class="container">
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('data') }}
                              </div>
                            </div>
                            @endif

                          <header class="panel-heading">
                            <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('expense_lang.add_expense') }}
                          </a>
                          </header>

                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('expense_lang.add_expense') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'expense/create_expense','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('message_lang.message_title') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="title"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">{{ trans('category_lang.panel_title') }}<span class="required">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                  <select id="heard" name="category" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    @foreach( $category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_paymentmethod') }}<span class="required">*</span>
                                                </label>
                                                <div class="col-lg-9">
                                                  <select id="heard" name="method" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <option value="{{ trans('invoice_lang.invoice_cash') }}">{{ trans('invoice_lang.invoice_cash') }}</option>
                                                    <option value="{{ trans('invoice_lang.invoice_paypal') }}">{{ trans('invoice_lang.invoice_paypal') }}</option>
                                                    <option value="{{ trans('invoice_lang.invoice_cheque') }}">{{ trans('invoice_lang.invoice_cheque') }}</option>
                                                    <option value="{{ trans('invoice_lang.invoice_stripe') }}">{{ trans('invoice_lang.invoice_stripe') }}</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_amount') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="amount"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_date') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="date" class="form-control" value="" name="date"required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('expense_lang.add_expense') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
          <div id="hide-table">
            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">  
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>{{ trans('message_lang.message_title') }}</th>
                      <th>{{ trans('category_lang.panel_title') }}</th>
                      <th>{{ trans('invoice_lang.invoice_paymentmethod') }}</th>
                      <th>{{ trans('invoice_lang.invoice_amount') }}</th>
                      <th>{{ trans('invoice_lang.invoice_date') }}</th>
                      <th>{{ trans('student_lang.action') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach( $expenses as $key => $post )
                  <tr>
                      <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                      <td data-title="{{ trans('message_lang.message_title') }}">{{ $post->title }}</td>
                      <td data-title="{{ trans('category_lang.panel_title') }}">{{ $post->categories($post->category)->name }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_paymentmethod') }}">{{ $post->method }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_amount') }}">{{ $post->amount }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_date') }}">{{ $post->date }}</td>
                      <td data-title="{{ trans('student_lang.action') }}">
                          <a class="active" data-toggle="modal" href="#myModal2{{ $post->id }}">
                           <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                           </a>
                           <!-- Modal -->
                  <div class="modal fade" id="myModal2{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Add Expenses</h4>
                              </div>
                              {!! Form::open(array('url'=>'expense/update_expense','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                              <div class="modal-body">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Title</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $post->title }}" name="title"required>
                                          <input type="hidden" class="form-control" value="{{ $post->id }}" name="id"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">Category<span class="required">*</span>
                                    </label>
                                    <div class="col-lg-9">
                                      <select id="heard" name="category" class="form-control" required>
                                        <option value="">Choose..</option>
                                        @foreach( $category as $cat)
                                        <option value="{{ $cat->id }}" <?php if($cat->id == $post->category){echo 'selected';}?>>{{ $cat->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">Method<span class="required">*</span>
                                    </label>
                                    <div class="col-lg-9">
                                      <select id="heard" name="method" class="form-control" required>
                                        <option value="{{ trans('invoice_lang.invoice_cash') }}">{{ trans('invoice_lang.invoice_cash') }}</option>
                                        <option value="{{ trans('invoice_lang.invoice_paypal') }}">{{ trans('invoice_lang.invoice_paypal') }}</option>
                                        <option value="{{ trans('invoice_lang.invoice_cheque') }}">{{ trans('invoice_lang.invoice_cheque') }}</option>
                                        <option value="{{ trans('invoice_lang.invoice_stripe') }}">{{ trans('invoice_lang.invoice_stripe') }}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Amount</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $post->amount }}" name="amount"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Date</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $post->date }}" name="date"required>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                  <button class="btn btn-warning" type="submit" name='submit'> Add Expenses</button>
                              
                              </div>
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
                  <!-- modal -->
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
                                          <a href="{{ url('expense/delete/'.$post->id) }}">
                                          <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                          </a>
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
            </div>
          </section>
      </div>
  </div>
               

@endsection