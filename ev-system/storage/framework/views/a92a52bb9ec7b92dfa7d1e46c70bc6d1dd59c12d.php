<?php
$settings = App\Settings::find(1);
?>

  <div id="ev-side">
    <!-- Left navbar-header -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="nav" id="side-menu">
        <li>
             <p class="hide-menu menu-top-title">Academic Session: (<?php echo e(App\AcademicSession::where('current', 1)->first()->name); ?>)</p>
        </li>
        <li>
          <a href="<?php echo e(url('dashboard')); ?>" class="waves-effect" id="dashActive">
            <i class="fa fa-dashboard"></i> <span class="hide-menu"><?php echo e(trans('dashboard_lang.panel_title')); ?></span>
          </a>
        </li>
        <?php if(Auth::user()->permission('is_admin')): ?>
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-link"></i> <span class="hide-menu">Api<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo e(url('apps')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Apps </a></li>
                    </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin')): ?>
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-lock"></i> <span class="hide-menu">Permissions<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo e(url('roles')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Roles </a></li>
                        <li><a href="<?php echo e(url('permission')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Permissions</a></li>
                    </ul>
            </li>
        <?php endif; ?>
        
        <?php if(Auth::user()->permission('is_admin') || Auth::user()->permission('is_teacher')): ?>
            <li class="waves-effect">
                    <a href="#">
                        <i class="fa fa-suitcase"></i> <span class="hide-menu">Academics<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php if(Auth::user()->permission('is_admin')): ?>
                            <li><a href="<?php echo e(url('terms')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Terms</a></li>
                            <li><a href="<?php echo e(url('sessions')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Academic Sessions</a></li>
                            <li><a href="<?php echo e(url('student-promotion')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Student Promotion</a></li>
                        <?php endif; ?>
                    </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_students')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="zmdi zmdi-male-female"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_student')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('students/create_student')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.add_title')); ?></a></li>
                    <li><a href="<?php echo e(url('students/create_bulk_student')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.add_student')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)</a></li>
                    <li>
                    <a href="#"><i class="fa fa-caret-right"></i>  <?php echo e(trans('student_lang.student_all_students')); ?> <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <?php $__currentLoopData = App\Classes::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('classes/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i>  <?php echo e($classl->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('admission_enquiry')): ?>
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-female"></i> <span class="hide-menu">Receptionist<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo e(url('visitors-log')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Visitor's Log </a></li>
                        <li><a href="<?php echo e(url('admission-enquiries')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Admission Enquiries</a></li>
                    </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_parents')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="zmdi zmdi-accounts"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_parent')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('parent_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('topbar_menu_lang.menu_parent')); ?> </a></li>
                    <li><a href="<?php echo e(url('parents/create_parent')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('parentes_lang.add_parentes')); ?></a></li>
                    <li><a href="<?php echo e(url('parents/create_bulk_parent')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('parentes_lang.add_parentes')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_schools')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span class="hide-menu"> <?php echo e(trans('others.schools')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('schools')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('others.all_schools')); ?> </a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_classes')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_classes')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('class/class_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('topbar_menu_lang.menu_classes')); ?></a></li>
                    <li><a href="<?php echo e(url('class/spread-sheets')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->role == 'quality_assurance'): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_classes')); ?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(url('class/spread-sheets')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_sections')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('class/section_list')); ?>" class="waves-effect">
                    <i class="fa fa-sort-amount-asc"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_section')); ?> </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_tests')): ?>
            <li class="waves-effect">
            <a href="#">
                <i class="fa fa-edit"></i>
                <span class="hide-menu"><?php echo e(trans('other.online_test')); ?> <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo e(url('online_test')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('other.test')); ?></a></li>
                <li><a href="<?php echo e(url('add_test_question')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i>  <?php echo e(trans('other.add_test')); ?></a></li>
                <li><a href="<?php echo e(url('add_bulk_test_question')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.add_bulk_test')); ?></a></li>
            </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_subjects')): ?>
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_subject')); ?><span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = App\Classes::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('subject/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i>  <?php echo e($classl->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_student')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('student/subject/'.$authe->class_id)); ?>">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_subject')); ?> </span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-edit"></i>
                    <span class="hide-menu">Online Test <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('student/online_test')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Start Test</a></li>
                    <li><a  href="<?php echo e(url('student/test_result/'.$authe->id)); ?>"><i class="fa fa-caret-right"></i> Test Result</a></li>
                </ul>
            </li>
            
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu"><?php echo e(trans('report_lang.report_mark')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('student/ca-test-result/'.$authe->id)); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Mid-Term Results</a></li>
                    <li><a  href="<?php echo e(url('student/exam-result/'.$authe->id)); ?>"><i class="fa fa-caret-right"></i> Exam Results</a></li>
                </ul>
            </li>

            <li class="waves-effect">
                <a href="<?php echo e(url('student/routine/routine_list/'.$authe->class_id)); ?>" >
                    <i class="fa fa-calendar"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_routine')); ?> </span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="<?php echo e(url('student/class/study_material')); ?>" class="waves-effect">
                    <i class="fa fa-tablet"></i>
                    <span class="hide-menu">Study Material</span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="<?php echo e(url('student/payment_invoice')); ?>" class="waves-effect">
                    <i class="fa fa-money"></i>
                    <span class="hide-menu"><?php echo e(trans('invoice_lang.panel_title')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_teacher')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('teacher/class/study_material')); ?>" class="waves-effect">
                    <i class="fa fa-suitcase"></i>
                    <span class="hide-menu">Study Material</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_parent')): ?>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-money"></i>
                    <span class="hide-menu"><?php echo e(trans('invoice_lang.panel_title')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/invoice/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu"><?php echo e(trans('report_lang.report_mark')); ?> <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/marks/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-calendar"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_routine')); ?> <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = $studentli->where('parent_id',$authe->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('parent/routine/'.$classl->id)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin')): ?>
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class="fa fa-tasks"></i>
                <span class="hide-menu"><?php echo e(trans('other.posts')); ?><span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo e(url('posts/new-post')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.new_post')); ?></a>
                </li>
                <li><a href="<?php echo e(url('posts/all-post')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.posts')); ?></a>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class="fa fa-film"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_media')); ?>  <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo e(url('gallery/gallery_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('media_lang.panel_title')); ?></a>
                </li>
                <?php if(Auth::user()->permission('add_media')): ?>
                <li><a href="<?php echo e(url('gallery/create_gallery')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('media_lang.add_class')); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php if(Auth::user()->permission('send_sms')): ?>
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-location-arrow"></i>
                <span class="hide-menu"><?php echo e(trans('mailandsms_lang.mailandsms_sms')); ?> <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="<?php echo e(url('send_sms')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Send SMS</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth::user()->role !== 'quality_assurance'): ?>
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-envelope"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_message')); ?> <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="<?php echo e(url('messages')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('message_lang.inbox')); ?> </a></li>
                <?php if(Auth::user()->permission('is_admin')): ?>
                    <li><a  href="<?php echo e(url('messages/bulk')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('topbar_menu_lang.menu_message')); ?> (<?php echo e(trans('mailandsms_lang.mailandsms_bulk')); ?>)</a></li>
                    <li><a  href="<?php echo e(url('messages/send_email')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('mailandsms_lang.mailandsms_email')); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_exams')): ?>
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-puzzle-piece"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_exam')); ?> & CA Tests <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="<?php echo e(url('ca-tests')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> C.A Tests</a></li>
                <li><a  href="<?php echo e(url('exam/exam_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('exam_lang.panel_title')); ?></a></li>
                <li><a  href="<?php echo e(url('grade/grade_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('grade_lang.panel_title')); ?></a></li>
                <li><a  href="<?php echo e(url('exam/manage_mark')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('mark_lang.panel_title')); ?></a></li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_marks')): ?>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-thumb-tack"></i>
                    <span class="hide-menu"><?php echo e(trans('report_lang.report_mark')); ?> <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <?php $__currentLoopData = App\Classes::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="sub_menu"><a href="<?php echo e(url('marksheet/'.$classl->slug)); ?>"><i class="fa fa-caret-right"></i> <?php echo e($classl->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_invoice')): ?>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-suitcase"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_account')); ?> <span class="fa arrow"></span> </span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('income/income_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('invoice_lang.panel_title')); ?></a></li>
                    <li><a  href="<?php echo e(url('expense/expense_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('expense_lang.panel_title')); ?></a></li>
                    <li><a  href="<?php echo e(url('expense/category_list')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('expense_lang.panel_title')); ?> (<?php echo e(trans('category_lang.panel_title')); ?>)</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_payment')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('payment/payment_list')); ?>" class="waves-effect">
                    <i class="fa fa-money"></i>
                    <span class="hide-menu"><?php echo e(trans('invoice_lang.payment')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_teachers')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('teacher_list')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-account"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_teacher')); ?> </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_employee')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('employee_list')); ?>" class="waves-effect">
                    <i class="fa fa-group "></i>
                    <span class="hide-menu">Employees </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('is_admin')): ?>
            <li class="waves-effect">
                <a href="<?php echo e(url('admin_list')); ?>" class="waves-effect">
                    <i class="zmdi zmdi-account-o"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.Admin')); ?></span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="<?php echo e(url('routine/routine_list')); ?>" class="waves-effect">
                    <i class="fa fa-calendar "></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_routine')); ?> </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('take_attendance')): ?>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-suitcase"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_attendance')); ?> <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('attendance/')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('sattendance_lang.panel_title')); ?></a></li>
                    <?php if(Auth::user()->permission('is_admin')): ?>
                        <li><a  href="<?php echo e(url('teacher_attendance')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('tattendance_lang.panel_title')); ?></a></li>
                        <li><a  href="<?php echo e(url('employee_attendance')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> Employee Attendance</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <li class="waves-effect">
            <a href="<?php echo e(url('dormitory/dormitory_list')); ?>" class="waves-effect">
                <i class="fa fa-building-o"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_hostel')); ?> </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="<?php echo e(url('library/library_list')); ?>" class="waves-effect">
                <i class="fa fa-book"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_library')); ?> </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="<?php echo e(url('noticeboard/noticeboard_list')); ?>" class="waves-effect">
                <i class="fa fa-volume-up"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_notice')); ?> </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="<?php echo e(url('transport/transport_list')); ?>" class="waves-effect">
                <i class="fa fa-truck"></i>
                <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_transport')); ?> </span>
            </a>
        </li>
        <?php if(Auth::user()->permission('view_tools')): ?>
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gavel"></i>
                    <span class="hide-menu"><?php echo e(trans('other.tools')); ?> <span class="fa arrow"></span></span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('system_backup')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.system_backup')); ?></a></li>
                    <li><a  href="<?php echo e(url('data_import')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.data_import')); ?></a></li>
                    <li><a  href="<?php echo e(url('task_manager')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.task_manager')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth::user()->permission('view_settings')): ?>
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="hide-menu"><?php echo e(trans('topbar_menu_lang.menu_setting')); ?> <span class="fa arrow"></span> </span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="<?php echo e(url('general_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.general_settings')); ?></a></li>
                    <li><a  href="<?php echo e(url('school_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.school_settings')); ?></a></li>
                    <li><a  href="<?php echo e(url('autobackup_settings')); ?>" class="waves-effect"><i class="fa fa-caret-right"></i> <?php echo e(trans('other.auto_backup_settings')); ?></a></li>
                </ul>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  </div>
  <!-- Left navbar-header end -->


