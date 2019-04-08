@extends('layouts.app')

@section('title')
{{ trans('invoice_lang.payment') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('invoice_lang.payment') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('invoice_lang.payment') }}
                          </header>
                          
                          <header class="panel-heading">
                            <a class="btn btn-success" data-toggle="modal" href="#myModal" style="margin:5px">
                                 {{ trans('invoice_lang.add_payment') }}
                          </a>
                          </header>

                          <!-- Modal -->
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('invoice_lang.add_payment') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'payment/create_payment','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_studentID') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select id="heard" name="student_id" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    @foreach( $student as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->classes->title }} - {{ $cat->name }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('message_lang.message_title') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="title"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('exam_lang.exam_note') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="description"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_date') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="date" class="form-control" value="" name="date"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_total') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="total_amount"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_amount') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="amount"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_status') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select id="heard" name="status" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <option value="paid">{{ trans('invoice_lang.invoice_fully_paid') }}</option>
                                                    <option value="unpaid">{{ trans('invoice_lang.invoice_partially_paid') }}</option>
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
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('invoice_lang.add_payment') }}</button>
                                          
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
                        <th>{{ trans('invoice_lang.invoice_total') }}</th>
                        <th>{{ trans('invoice_lang.invoice_amount') }}</th>
                        <th>{{ trans('invoice_lang.invoice_status') }}</th>
                        <th>{{ trans('invoice_lang.invoice_date') }}</th>
                        <th>{{ trans('student_lang.action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    @foreach( $payments as $key => $post )
                  <tr>
                      <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                      <td data-title="{{ trans('message_lang.message_title') }}">{{ $post->title }}</td>
                      @foreach($invoices->where('id',$post->invoice_id) as $s)
                      <td data-title="{{ trans('invoice_lang.invoice_total') }}">{{ $s->amount }}</td>
                      @endforeach
                      @foreach($invoices->where('id',$post->invoice_id) as $k)
                      <td data-title="{{ trans('invoice_lang.invoice_amount') }}">{{ $k->amount_paid }}</td>
                      @endforeach
                      @foreach($invoices->where('id',$post->invoice_id) as $ks)
                      <td data-title="{{ trans('invoice_lang.invoice_status') }}">@if( $ks->status == 'unpaid')<button class="btn btn-danger btn-xs"></i>{{ $ks->status }}</button>
                        @elseif( $ks->status == 'paid')
                      <button class="btn btn-success btn-xs"></i>{{ $ks->status }}</button>
                      @endif
                    </td>
                      @endforeach
                       @foreach($invoices->where('id',$post->invoice_id) as $key)
                      <td data-title="{{ trans('invoice_lang.invoice_date') }}">{{ $key->date }}</td>
                      @endforeach
                      <td data-title="{{ trans('student_lang.action') }}">
                          <a class="active" data-toggle="modal" href="#myModal{{ $post->id }}">
                           <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                           </a>
                            <!-- Edit Modal -->
                  <div class="modal fade" id="myModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">{{ trans('invoice_lang.add_payment') }}</h4>
                              </div>
                              {!! Form::open(array('url'=>'payment/update_payment','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_studentID') }}
                                    </label>
                                    <div class="col-lg-9">
                                      <select id="heard" name="student_id" class="form-control" required>
                                        <option value="">Choose..</option>
                                        @foreach( $student as $cat)
                                        <option value="{{ $cat->id }}" <?php if($cat->id == $post->student_id){echo 'selected';}?>>{{ $cat->classes->title }} - {{ $cat->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('message_lang.message_title') }}</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $post->title }}" name="title"required>
                                          <input type="hidden" class="form-control" value="{{ $post->invoice_id }}" name="invoice_id"required>
                                          <input type="hidden" class="form-control" value="{{ $post->id }}" name="payment_id"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('exam_lang.exam_note') }}</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $post->description }}" name="description"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_date') }}</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $invoices->where('id',$post->invoice_id)->first()->date }}" name="date"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_total') }}</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $invoices->where('id',$post->invoice_id)->first()->amount }}" name="total_amount"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_amount') }}</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" value="{{ $invoices->where('id',$post->invoice_id)->first()->amount_paid }}" name="amount"required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_status') }}
                                    </label>
                                    <div class="col-lg-9">
                                      <select id="heard" name="status" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="paid">{{ trans('invoice_lang.invoice_fully_paid') }}</option>
                                        <option value="unpaid">{{ trans('invoice_lang.invoice_partially_paid') }}</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label">{{ trans('invoice_lang.invoice_paymentmethod') }}<span class="required">*</span>
                                    </label>
                                    <div class="col-lg-9">
                                      <select id="heard" name="method" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="Cash">{{ trans('invoice_lang.invoice_cash') }}</option>
                                        <option value="paypal">{{ trans('invoice_lang.invoice_paypal') }}</option>
                                        <option value="Cheque">{{ trans('invoice_lang.invoice_cheque') }}</option>
                                        <option value="stripe">{{ trans('invoice_lang.invoice_stripe') }}</option>
                                      </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                  <button class="btn btn-warning" type="submit" name='submit'>{{ trans('invoice_lang.add_payment') }}</button>
                              
                              </div>
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
                  <!-- modal -->
                          <a class="active" data-toggle="modal" href="#myModaldel{{ $post->id }}">
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
                                  <a href="{{ url('payment/delete/'.$post->id) }}">
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