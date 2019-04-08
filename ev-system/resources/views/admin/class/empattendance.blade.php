@extends('layouts.app')

@section('title')
Employee Attendance
@endsection
@section('content')
<!--main content start-->
<body onload="lll()">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Employee Attendance</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Employee Attendance
                          </header>
                          <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
            <tr>
                <th>{{ trans('issue_lang.issue_select_day') }}</th>
                <th>{{ trans('issue_lang.issue_select_month') }}</th>
                <th>{{ trans('issue_lang.issue_select_year') }}</th>
                <th>{{ trans('sattendance_lang.action') }}</th>
           </tr>
       </thead>
        <tbody>
            <form method="post" action="{{ url('select_employee_atendance') }}" class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr class="gradeA">
                    <td data-title="">
                        <select name="date" class="form-control">
                            <?php for($i=1;$i<=31;$i++):?>
                                <option value="<?php echo $i;?>" 
                                    <?php 
                                    $getday = date('d');
                                    if(isset($getday) && $getday==$i)echo 'selected="selected"';?>>
                                        <?php echo trans('sattendance_lang.attendance_'.$i);?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td data-title="">
                        <select name="month" class="form-control">
                            <?php 
                            $getmonth = date('m');
                            for($i=1;$i<=12;$i++):
                                if($i==1)$m='jan';
                                else if($i==2)$m='feb';
                                else if($i==3)$m='mar';
                                else if($i==4)$m='apr';
                                else if($i==5)$m='may';
                                else if($i==6)$m='june';
                                else if($i==7)$m='jul';
                                else if($i==8)$m='aug';
                                else if($i==9)$m='sep';
                                else if($i==10)$m='oct';
                                else if($i==11)$m='nov';
                                else if($i==12)$m='dec';
                            ?>
                                <option value="<?php echo $i;?>"
                                    <?php if($getmonth==$i)echo 'selected="selected"';?>>
                                        <?php echo trans('sattendance_lang.attendance_'.$m);?>
                                            </option>
                            <?php 
                            endfor;
                            ?>
                        </select>
                    </td>
                    <td data-title="">
                        <select name="year" class="form-control">
                            <?php 
                            $getyear = date('Y');
                            for($i=2030;$i>=2010;$i--):?>
                                <option value="<?php echo $i;?>"
                                    <?php if($getyear==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td data-title=""><input type="submit" value="Manage" class="btn btn-info"></td>
                </tr>
            </form>
        </tbody>
    </table>
<hr />


@if($date!='' && $month!='' && $year!='') 
@if ( !$employee->count() )
                                <div style="padding:20px">There are no employee available...</div>
                            @else 
<center>
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        
            <div class="tile-stats tile-white-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <?php
                    $full_date  =   $year.'-'.$month.'-'.$date;
                    $timestamp  = strtotime($full_date);
                    $day        = strtolower(date('l', $timestamp));
                 ?>
                <h2><?php echo ucwords($day);?></h2>
                
                <p><?php echo $date.'-'.$month.'-'.$year;?></p>
            </div>
            <button id="update_attendance_button" onclick="return update_attendance()" 
                class="btn btn-primary">
                    Update Attendance
            </button>
        </div>

    </div>
</center>
<hr />

<div class="row" id="attendance_list">
    <div class="col-sm-offset-3 col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td data-title=""><?php echo 'roll';?></td>
                    <td data-title=""><?php echo 'name';?></td>
                    <td data-title=""><?php echo 'status';?></td>
                </tr>
            </thead>
            <tbody>

                        @foreach ($employee as $employ)
                        <tr class="gradeA">
                            <td data-title="">{{ $employ->name }}</td>
                            
                            <td data-title="">{{ $employ->email }}</td>
                            <td data-title="">
                            <?php 
                                //$at = App\Attendance::where('employee_id',$employ->id)->where('date',$full_date)->find($employ->id);
                            $at = App\EmployeeAttendance::orderBy('created_at','desc')->paginate()->where('employee_id',$employ->id)->where('date',$full_date);
                             foreach ($at as $key => $value) { ?>
                                <?php 
                                if ($value['status'] == 0) { ?>
                                  <span class="badge badge-sm label-warning">Absent</span>
                               
                               <?php }
                                elseif ($value['status'] == 1) { ?>
                                    <span class="badge badge-sm label-primary">Present</span>
                                <?php }
                                ?>
                            <?php  }
                            ?>
                            </td>
                        </tr>  
                        @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="row" id="update_attendance">

<!-- STUDENT's attendance submission form here -->
<?php
 $get = App\EmployeeAttendance::orderBy('created_at','desc')->paginate(5)->where('employee_id',$employ->id)->where('date',$full_date);
 if($get->count() > 0){ ?>
 <form method="post" 
    action="{{ url('employee_attendance/update') }}/<?php echo $date.'/'.$month.'/'.$year;?>">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-offset-3 col-md-6">
            <table  class="table table-bordered">
                <thead>
                    <tr class="gradeA">
                        <th><?php echo 'roll';?></th>
                        <th><?php echo 'name';?></th>
                        <th><?php echo 'status';?></th>
                    </tr>
                </thead>
                <tbody>
                        
                    @foreach ($employee as $employ)
                        <tr class="gradeA">
                            <td data-title="">{{ $employ->name }}</td>
                            <td data-title="">{{ $employ->email }}</td>
                            <td align="center">
                                <?php 
                                $at = App\EmployeeAttendance::where('employee_id', $employ->id)->where('date', $full_date)->find($employ->id);
                                if($at){
                                    $status = $at->status; 
                                }
                                    ?>
                               
                                    <select name="status[]" class="form-control" style="width:100px; float:left;">
                                        <option value="0"></option>
                                        <option value="1">Present</option>
                                        <option value="0">Absent</option>
                                    </select>
                                
                            </td>
                        </tr>
                        <input type="hidden" name="employee_id" value="<?php echo $employ->id;?>" />

                    @endforeach
                     
                </tbody>
            </table>
            <input type="hidden" name="date" value="<?php echo $full_date;?>" />
            <input type="hidden" name="month" value="<?php echo $month;?>" />
            <input type="hidden" name="year" value="<?php echo $year;?>" />
            <input type="hidden" name="day" value="<?php echo $date;?>" />
            
            <center>
                <input type="submit" class="btn btn-info" value="Update">
            </center>
        </div>
    
    
</form>
<?php }
 else{ ?>

<form method="post" 
    action="{{ url('employee_attendance') }}/<?php echo $date.'/'.$month.'/'.$year;?>">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-offset-3 col-md-6">
            <table  class="table table-bordered">
                <thead>
                    <tr class="gradeA">
                        <th><?php echo 'roll';?></th>
                        <th><?php echo 'name';?></th>
                        <th><?php echo 'status';?></th>
                    </tr>
                </thead>
                <tbody>
                        
                    @foreach ($employee as $employ)
                        <tr class="gradeA">
                            <td data-title="">{{ $employ->name }}</td>
                            <td data-title="">{{ $employ->email }}</td>
                            <td align="center">
                                <?php 
                                $at = App\EmployeeAttendance::where('employee_id', $employ->id)->where('date', $full_date)->find($employ->id);
                                if($at){
                                    $status = $at->status; 
                                }
                                    ?>
                                <input type="hidden" name="stu[]" value="{{ $employ->id }}">
                                    <select name="status[]" class="form-control" style="width:100px; float:left;">
                                        <option value="0"></option>
                                        <option value="1">Present</option>
                                        <option value="0">Absent</option>
                                    </select>
                                
                            </td>
                        </tr>
                        <input type="hidden" name="employee_id" value="<?php echo $employ->id;?>" />

                    @endforeach
                     
                </tbody>
            </table>
            <input type="hidden" name="date" value="<?php echo $full_date;?>" />
            <input type="hidden" name="month" value="<?php echo $month;?>" />
            <input type="hidden" name="year" value="<?php echo $year;?>" />
            <input type="hidden" name="day" value="<?php echo $date;?>" />
            
            
            <center>
                <input type="submit" class="btn btn-info" value="save changes">
            </center>
        </div>
    
    
</form>
<?php  }
?>
</div>

@endif
@endif
                      </section>
                  </div>
              </div>
              <!-- page end-->
               

<script type="text/javascript">
    /*document.getElementById("update_attendance").innerHTML = '';*/
    

    function update() {

        $("#update_attendance").hide();
    }
    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
    function lll (argument) {
       $("#update_attendance").hide();
    }
</script>
</body>
@endsection










