<?php $__env->startSection('title'); ?>
<?php 
    $students = App\User::where('role', 'student')->orderBy('created_at','desc')->paginate(8);
    $settings = App\Settings::find(1);
    $authed = Auth::user();
    $authe = Auth::user();
    $count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count();
?>
<?php echo e($settings->system_title); ?> | <?php echo e(trans('dashboard_lang.panel_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">.white-box .m-b-20{font-family: roboto, corbel, trebuchet ms}</style>
    <?php if(Auth::user()->permission('is_student')): ?>
    <!-- .row -->
      <div class="row">
       
        <div class="col-lg-8 col-sm-12 col-xs-12 teller">
          <h4></h4>
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box1">
                <h3 class="box-title"><?php echo e(trans('book_lang.panel_title')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-book text-info"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Library::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box4">
                <h3 class="box-title">Materials</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-file text-success"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Material::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box2">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_teacher')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-megna"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\User::where('active', 1)->where('role', 'teacher')->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box3">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_parent')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-danger"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\User::where('active', 1)->where('role', 'parent')->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xs-12">
          <h4></h4>
          <div class="white-box">
            <div class="user-bg"> <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>" alt="user" style="100%">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>"></a>
                  <h4 class="text-white"><?php echo e(Auth::user()->name); ?></h4>
                  <h5 class="text-white"><?php echo e(Auth::user()->email); ?></h5>
                </div>
              </div>
            </div>
            <div class="user-btm-box">
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-purple"><i class="fa fa-envelope-o"></i></p>
                <h1><?php echo e($count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count()); ?></h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-blue"><i class="fa  fa-bullhorn"></i></p>
                <h1><?php echo e($notices->count()); ?></h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-danger"><i class="fa fa-pencil-square"></i></p>
                <h1><?php echo e($posts->count()); ?></h1>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- /.row -->


      <?php elseif(Auth::user()->permission('is_parent')): ?>

      <div class="row">
       
      <div class="col-lg-8">
          <h4></h4>
          <div class="white-box" style="padding-bottom:5px">
            <h3 class="box-title">Children Attendance Stats (<?php echo date('d').'-'.date('M').'-'.date('Y');?>)</h3>
            <ul class="basic-list">
              <?php 
              $date = (int)date('Y').'-'.(int)date('m').'-'.(int)date('d');
              $stud = App\User::where('role', 'student');?>
              <?php $__currentLoopData = $stud->where('parent_id',Auth::id())->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                  $getatt = App\Attendance::where('date',$date)->where('student_id',$stt->id)->first();
                
                ?>
                <li><?php echo e($stt->name); ?>

                  <?php if($getatt && $getatt->status == 1): ?>
                    <span class="pull-right label-success label">Present</span>
                  <?php else: ?>
                    <span class="pull-right label-danger label"> Absent</span> 
                  <?php endif; ?>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xs-12">
          <h4></h4>
          <div class="white-box">
            <div class="user-bg"> <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>" alt="user" style="100%">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>"></a>
                  <h4 class="text-white"><?php echo e(Auth::user()->name); ?></h4>
                  <h5 class="text-white"><?php echo e(Auth::user()->email); ?></h5>
                </div>
              </div>
            </div>
            <div class="user-btm-box">
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-purple"><i class="fa fa-envelope-o"></i></p>
                <h1><?php echo e($count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count()); ?></h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-blue"><i class="fa  fa-bullhorn"></i></p>
                <h1><?php echo e($notices->count()); ?></h1>
              </div>
              <div class="col-md-4 col-sm-4 text-center">
                <p class="text-danger"><i class="fa fa-pencil-square"></i></p>
                <h1><?php echo e($posts->count()); ?></h1>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- /.row -->
      <?php else: ?>

      <!-- .row -->
      <div class="row">
        <div class="col-lg-6">
          <h4></h4>
          <div class="white-box cst-white-box">
            <h3 class="box-title">Attendance Stats (<?php echo date('d').'-'.date('M').'-'.date('Y');?>)</h3>
            <ul class="basic-list">
              <?php 
              $date = (int)date('Y').'-'.(int)date('m').'-'.(int)date('d');
              $stud = App\User::where('role', 'student')->get();?>
              <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php 
              $sum = 0;
              $diff = 0;?>
              <?php $__currentLoopData = $stud->where('class_id',$class->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($class->title); ?><span class="pull-right label-danger label"><?php echo e($diff); ?> Absent</span> <span class="pull-right label-success label"><?php echo e($sum); ?> Present</span></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12 teller">
          <h4></h4>
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box1">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_student')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="icon-graduation text-info"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\User::where('active', 1)->where('role', 'student')->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box4">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_attendance')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-calendar text-success"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Attendance::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box2">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_teacher')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-megna"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\User::where('active', 1)->where('role', 'teacher')->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box3">
                <h3 class="box-title"><?php echo e(trans('topbar_menu_lang.menu_parent')); ?></h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-danger"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\User::where('active', 1)->where('role', 'parent')->count(); echo $count;?></span></li>
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
              
            <canvas id="myChart" ></canvas>
              

            </div>
          </div>

          <div class="col-md-4 col-lg-4 col-xs-12">
            <div class="white-box">
              <div class="user-bg"> <img src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>" alt="user" style="100%">
                <div class="overlay-box">
                  <div class="user-content"> <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo e(asset('ev-assets/uploads/avatars/'.$authe->image)); ?>"></a>
                    <h4 class="text-white"><?php echo e(Auth::user()->name); ?></h4>
                    <h5 class="text-white"><?php echo e(Auth::user()->email); ?></h5>
                  </div>
                </div>
              </div>
              <div class="user-btm-box">
                <div class="col-md-4 col-sm-4 text-center">
                  <p class="text-purple"><i class="fa fa-envelope-o"></i></p>
                  <h1><?php echo e($count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count()); ?></h1>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                  <p class="text-blue"><i class="fa  fa-bullhorn"></i></p>
                  <h1><?php echo e($notices->count()); ?></h1>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                  <p class="text-danger"><i class="fa fa-pencil-square"></i></p>
                  <h1><?php echo e($posts->count()); ?></h1>
                </div>
                <div class="stats-row col-md-12 m-t-20 m-b-0 text-center">
                  <div class="stat-item">
                    <h6>Contact info</h6>
                    <b><i class="ti-mobile"></i><?php echo e(Auth::user()->email); ?></b>
                  </div>
                </div>
              </div>
            </div>
          </div>



      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-sm-12">
          <div class="white-box cst-white-box2">
              
            <canvas id="classChart" ></canvas>
              
          </div>
        </div>
      </div>
    <?php endif; ?>
      

    <div class="row">
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="<?php echo e(asset('ev-assets/uploads/post-images/'.$post->image)); ?>">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10"><i class="fa  fa-calendar-o"></i> <?php echo e($post->created_at->format('d, M Y \a\t h:i a')); ?></span>
              <?php if(Auth::user()->permission('is_admin')): ?>
                <a href="<?php echo e(url('posts/edit/'.$post->slug.'?_token='.csrf_token())); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                <a class="active"  data-toggle="modal" href="#myModaldel<?php echo e($post->id); ?>">
                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </a>
              <?php endif; ?>
              <!-- Delete Modal -->
              <div class="modal fade" id="myModaldel<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-body">
                              
                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                              <a href="<?php echo e(url('posts/delete/'.$post->id)); ?>">
                              <button class="btn btn-danger"><?php echo e(trans('student_lang.delete')); ?></button>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <h3 class="m-t-20 m-b-20"><a href="<?php echo e(url('posts/'.$post->slug)); ?>"><?php echo e($post->title); ?></a></h3>
            <p><?php echo str_limit($post->body, $limit = 300, $end = '.......'); ?></p>
            <a href="<?php echo e(url('posts/'.$post->slug)); ?>"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button></a>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script>
  var ctx = document.getElementById("myChart");
  var classContext = document.getElementById("classChart");
  <?php 
    $date = (int)date('Y').'-'.(int)date('m').'-'.(int)date('d');
    $classes = array();
    $absents = array();
    $presents = array();
    $classStat = array();
    $allclasses = App\Classes::take(10)->get();
    foreach($allclasses as $class){ 
      $classes[] = $class->title;
      $sumAbs = 0;
      $sumPress = 0;
      foreach(App\User::where('role', 'student')->where('class_id', $class->id)->get() as $student){
        if(App\Attendance::where('date',$date)->where('student_id',$student->id)->first() && App\Attendance::where('date',$date)->where('student_id',$student->id)->first()->status == 1){
          $sumPress++;
        }
        else{
          $sumAbs++;
        }
      }
      $absents[] = $sumAbs;
      $presents[] = $sumPress;
      $classStat[] = App\User::where('role', 'student')->where('class_id', $class->id)->get() ? App\User::where('role', 'student')->where('class_id', $class->id)->get()->count() : 0;
    } 
    ?>
  var CLASSES = [<?php echo '"'.implode('","', $classes).'"' ?>];
  var ABS = [<?php echo '"'.implode('","', $absents).'"' ?>];
  var PRES = [<?php echo '"'.implode('","', $presents).'"' ?>];
  var CLASS_STAT = [<?php echo '"'.implode('","', $classStat).'"' ?>];
		var color = Chart.helpers.color;
	var barChartData = {
			labels: CLASSES,
			datasets: [{
				label: 'Absent',
				backgroundColor: color("red").alpha(0.5).rgbString(),
				borderColor: "red",
				borderWidth: 1,
				data: ABS
			}, {
				label: 'Present',
				backgroundColor: color('blue').alpha(0.5).rgbString(),
				borderColor: 'blue',
				borderWidth: 1,
				data: PRES
			}]
  };
  var barChartStat = {
			labels: CLASSES,
			datasets: [{
				label: 'Students',
				backgroundColor: color('blue').alpha(0.5).rgbString(),
				borderColor: 'blue',
				borderWidth: 1,
				data: CLASS_STAT
			}]
  };
  window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Student Attendance'
      }
    }
  });
  window.statBar = new Chart(classContext, {
    type: 'bar',
    data: barChartStat,
    options: {
      responsive: true,
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Classes Stat'
      }
    }
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>