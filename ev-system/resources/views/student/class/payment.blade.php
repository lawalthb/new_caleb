@extends('layouts.app')

@section('title')
{{ trans('invoice_lang.panel_title') }}
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
            <li class="active">{{ trans('invoice_lang.panel_title') }}</li>
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
                <h3>{{ trans('invoice_lang.panel_title') }}</h3>
            </header>
            <div id="sinfo">
        <?php
        $info = App\User::find($teacher_auth);

        ?>
        <header class="panel-heading">
                <u>Name:   {{ $info->name }}</u>
                <br>
               <u> Email:  {{ $info->email }}</u>
              </header>
              </div>
            <header class="panel-heading">
                <button class="btn btn-primary" type="button" onclick="printview()" id="evmarkp" target="_blank"><i class="fa fa-print"></i> {{ trans('mark_lang.print') }}</button>
            </header>
            <div id="hide-table">
                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('message_lang.message_title') }}</th>
                    <th>{{ trans('exam_lang.exam_note') }}</th>
                    <th>{{ trans('invoice_lang.invoice_total') }}</th>
                    <th>{{ trans('invoice_lang.invoice_amount') }}</th>
                    <th>{{ trans('invoice_lang.invoice_status') }}</th>
                    <th>{{ trans('invoice_lang.invoice_date') }}</th>
                </tr>
                </thead>
                <tbody>
                  

                  @foreach( $payment as $key => $mat )
                <tr>
                    <td data-title="#">{{ $key+1 }}</td>
                    <td data-title="{{ trans('message_lang.message_title') }}">{{ $mat->title }}</td>
                    <td data-title="{{ trans('exam_lang.exam_note') }}">{{ $mat->description }}</td>
                    @foreach($invoices->where('id',$mat->invoice_id) as $s)
                    <td data-title="{{ trans('invoice_lang.invoice_total') }}">{{ $s->amount }}</td>
                    @endforeach
                    @foreach($invoices->where('id',$mat->invoice_id) as $k)
                    <td data-title="{{ trans('invoice_lang.invoice_amount') }}">{{ $k->amount_paid }}</td>
                    @endforeach
                    @foreach($invoices->where('id',$mat->invoice_id) as $ks)
                    <td data-title="{{ trans('invoice_lang.invoice_status') }}">
                      @if( $ks->status == 'unpaid')<button class="btn btn-danger btn-xs"></i>{{ $ks->status }}</button>
                      @elseif( $ks->status == 'paid')
                    <button class="btn btn-success btn-xs"></i>{{ $ks->status }}</button>
                    @endif
                    </td>
                    @endforeach
                     @foreach($invoices->where('id',$mat->invoice_id) as $key)
                    <td data-title="{{ trans('invoice_lang.invoice_date') }}">{{ $key->date }}</td>
                    @endforeach
                </tr>
                 @endforeach
               
                </tbody>
            </table> 
          </div>
        </section>
    </div>
</div>
 
<script type="text/javascript">

function printview () {
document.getElementById("evmark").style.display = "none";
document.getElementById("evmarkp").style.display = "none";
document.getElementById("ev-header").style.display = "none";
document.getElementById("ev-side").style.display = "none";
document.getElementById("ev-footer").style.display = "none";
document.getElementById("sinfo").style.display = "block";
document.getElementById("sinfo1").style.display = "block";
document.getElementById("sinfo2").style.display = "block";
window.print();
}

      </script>
@endsection