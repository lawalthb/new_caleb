@extends('layouts.app')

@section('title')
{{ trans('invoice_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('invoice_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('invoice_lang.panel_title') }}
                          </header>
          <div id="hide-table">
            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                
                    <thead>
                  <tr>
                      <th>#</th>
                      <th>{{ trans('message_lang.message_title') }}</th>
                      <th>{{ trans('exam_lang.exam_note') }}</th>
                      <th>{{ trans('invoice_lang.invoice_paymentmethod') }}</th>
                      <th>{{ trans('invoice_lang.invoice_amount') }}</th>
                      <th>{{ trans('invoice_lang.invoice_date') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                    @foreach( $incomes as $key => $post )
                  <tr>
                      <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                      <td data-title="{{ trans('message_lang.message_title') }}">{{ $post->title }}</td>
                      <td data-title="{{ trans('exam_lang.exam_note') }}">{{ $post->description }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_paymentmethod') }}">{{ $post->payment_method }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_amount') }}">{{ $post->amount }}</td>
                      <td data-title="{{ trans('invoice_lang.invoice_date') }}">{{ $post->date }}</td>
                  </tr>
                   @endforeach
                  </tbody>
              </table>
            </div>
          </section>
      </div>
  </div>
   

@endsection