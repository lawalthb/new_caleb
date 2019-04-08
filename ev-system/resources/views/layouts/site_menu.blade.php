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
             <p class="hide-menu menu-top-title">Academic Session: ({{ App\AcademicSession::where('current', 1)->first()->name }})</p>
        </li>
        <li>
          <a href="{{ url('dashboard') }}" class="waves-effect" id="dashActive">
            <i class="fa fa-dashboard"></i> <span class="hide-menu">{{ trans('dashboard_lang.panel_title') }}</span>
          </a>
        </li>
        @if(Auth::user()->permission('is_admin'))
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-link"></i> <span class="hide-menu">Api<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('apps') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Apps </a></li>
                    </ul>
            </li>
        @endif
        @if(Auth::user()->permission('is_admin'))
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-lock"></i> <span class="hide-menu">Permissions<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('roles') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Roles </a></li>
                        <li><a href="{{ url('permission') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Permissions</a></li>
                    </ul>
            </li>
        @endif
        
        @if(Auth::user()->permission('is_admin') || Auth::user()->permission('is_teacher'))
            <li class="waves-effect">
                    <a href="#">
                        <i class="fa fa-suitcase"></i> <span class="hide-menu">Academics<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        @if(Auth::user()->permission('is_admin'))
                            <li><a href="{{ url('terms') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Terms</a></li>
                            <li><a href="{{ url('sessions') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Academic Sessions</a></li>
                            <li><a href="{{ url('student-promotion') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Student Promotion</a></li>
                        @endif
                    </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_students'))
            <li class="waves-effect">
                <a href="#">
                    <i class="zmdi zmdi-male-female"></i> <span class="hide-menu">{{ trans('topbar_menu_lang.menu_student') }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('students/create_student') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('student_lang.add_title') }}</a></li>
                    <li><a href="{{ url('students/create_bulk_student') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('student_lang.add_student') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})</a></li>
                    <li>
                    <a href="#"><i class="fa fa-caret-right"></i>  {{ trans('student_lang.student_all_students') }} <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        @foreach( App\Classes::all() as $classl )
                        <li><a href="{{ url('classes/'.$classl->slug) }}"><i class="fa fa-caret-right"></i>  {{ $classl->title }}</a></li>
                        @endforeach
                    </ul>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('admission_enquiry'))
            <li class="waves-effect">
                    <a href="#">
                        <i class="zmdi zmdi-female"></i> <span class="hide-menu">Receptionist<span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('visitors-log') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Visitor's Log </a></li>
                        <li><a href="{{ url('admission-enquiries') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Admission Enquiries</a></li>
                    </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_parents'))
            <li class="waves-effect">
                <a href="#">
                    <i class="zmdi zmdi-accounts"></i> <span class="hide-menu">{{ trans('topbar_menu_lang.menu_parent') }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('parent_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('topbar_menu_lang.menu_parent') }} </a></li>
                    <li><a href="{{ url('parents/create_parent') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('parentes_lang.add_parentes') }}</a></li>
                    <li><a href="{{ url('parents/create_bulk_parent') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('parentes_lang.add_parentes') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_schools'))
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-building-o"></i> <span class="hide-menu"> {{ trans('others.schools') }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('schools') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('others.all_schools') }} </a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_classes'))
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu">{{ trans('topbar_menu_lang.menu_classes') }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('class/class_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('topbar_menu_lang.menu_classes') }}</a></li>
                    <li><a href="{{ url('class/spread-sheets') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->role == 'quality_assurance')
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span class="hide-menu">{{ trans('topbar_menu_lang.menu_classes') }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('class/spread-sheets') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  Spread Sheets</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_sections'))
            <li class="waves-effect">
                <a href="{{ url('class/section_list') }}" class="waves-effect">
                    <i class="fa fa-sort-amount-asc"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_section') }} </span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('view_tests'))
            <li class="waves-effect">
            <a href="#">
                <i class="fa fa-edit"></i>
                <span class="hide-menu">{{ trans('other.online_test') }} <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="{{ url('online_test') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('other.test') }}</a></li>
                <li><a href="{{ url('add_test_question') }}" class="waves-effect"><i class="fa fa-caret-right"></i>  {{ trans('other.add_test') }}</a></li>
                <li><a href="{{ url('add_bulk_test_question') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.add_bulk_test') }}</a></li>
            </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_subjects'))
            <li class="waves-effect">
                <a href="#">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_subject') }}<span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach( App\Classes::all() as $classl )
                    <li><a href="{{ url('subject/'.$classl->slug) }}"><i class="fa fa-caret-right"></i>  {{ $classl->title }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('is_student'))
            <li class="waves-effect">
                <a href="{{ url('student/subject/'.$authe->class_id) }}">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_subject') }} </span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-edit"></i>
                    <span class="hide-menu">Online Test <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('student/online_test') }}" class="waves-effect"><i class="fa fa-caret-right"></i> Start Test</a></li>
                    <li><a  href="{{ url('student/test_result/'.$authe->id) }}"><i class="fa fa-caret-right"></i> Test Result</a></li>
                </ul>
            </li>
            
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu">{{ trans('report_lang.report_mark') }} <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('student/ca-test-result/'.$authe->id) }}" class="waves-effect"><i class="fa fa-caret-right"></i> Mid-Term Results</a></li>
                    <li><a  href="{{ url('student/exam-result/'.$authe->id) }}"><i class="fa fa-caret-right"></i> Exam Results</a></li>
                </ul>
            </li>

            <li class="waves-effect">
                <a href="{{ url('student/routine/routine_list/'.$authe->class_id) }}" >
                    <i class="fa fa-calendar"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_routine') }} </span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="{{ url('student/class/study_material') }}" class="waves-effect">
                    <i class="fa fa-tablet"></i>
                    <span class="hide-menu">Study Material</span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="{{ url('student/payment_invoice') }}" class="waves-effect">
                    <i class="fa fa-money"></i>
                    <span class="hide-menu">{{ trans('invoice_lang.panel_title') }}</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('is_teacher'))
            <li class="waves-effect">
                <a href="{{ url('teacher/class/study_material') }}" class="waves-effect">
                    <i class="fa fa-suitcase"></i>
                    <span class="hide-menu">Study Material</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('is_parent'))
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-money"></i>
                    <span class="hide-menu">{{ trans('invoice_lang.panel_title') }} <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach( $studentli->where('parent_id',$authe->id) as $classl )
                        <li><a href="{{ url('parent/invoice/'.$classl->id) }}"><i class="fa fa-caret-right"></i> {{ $classl->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span class="hide-menu">{{ trans('report_lang.report_mark') }} <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach( $studentli->where('parent_id',$authe->id) as $classl )
                        <li><a href="{{ url('parent/marks/'.$classl->id) }}"><i class="fa fa-caret-right"></i> {{ $classl->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-calendar"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_routine') }} <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach( $studentli->where('parent_id',$authe->id) as $classl )
                        <li><a href="{{ url('parent/routine/'.$classl->id) }}"><i class="fa fa-caret-right"></i> {{ $classl->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('is_admin'))
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class="fa fa-tasks"></i>
                <span class="hide-menu">{{ trans('other.posts') }}<span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="{{ url('posts/new-post') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.new_post') }}</a>
                </li>
                <li><a href="{{ url('posts/all-post') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.posts') }}</a>
                </li>
            </ul>
        </li>
        @endif
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class="fa fa-film"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_media') }}  <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a href="{{ url('gallery/gallery_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('media_lang.panel_title') }}</a>
                </li>
                @if(Auth::user()->permission('add_media'))
                <li><a href="{{ url('gallery/create_gallery') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('media_lang.add_class') }}</a></li>
                @endif
            </ul>
        </li>
        @if(Auth::user()->permission('send_sms'))
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-location-arrow"></i>
                <span class="hide-menu">{{ trans('mailandsms_lang.mailandsms_sms') }} <span class="fa arrow"></span></span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="{{ url('send_sms') }}" class="waves-effect"><i class="fa fa-caret-right"></i> Send SMS</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->role !== 'quality_assurance')
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-envelope"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_message') }} <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="{{ url('messages') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('message_lang.inbox') }} </a></li>
                @if(Auth::user()->permission('is_admin'))
                    <li><a  href="{{ url('messages/bulk') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('topbar_menu_lang.menu_message') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})</a></li>
                    <li><a  href="{{ url('messages/send_email') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('mailandsms_lang.mailandsms_email') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(Auth::user()->permission('view_exams'))
        <li class="waves-effect">
            <a href="javascript:;" >
                <i class=" fa fa-puzzle-piece"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_exam') }} & CA Tests <span class="fa arrow"></span> </span>
            </a>
            <ul class="nav nav-second-level">
                <li><a  href="{{ url('ca-tests') }}" class="waves-effect"><i class="fa fa-caret-right"></i> C.A Tests</a></li>
                <li><a  href="{{ url('exam/exam_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('exam_lang.panel_title') }}</a></li>
                <li><a  href="{{ url('grade/grade_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('grade_lang.panel_title') }}</a></li>
                <li><a  href="{{ url('exam/manage_mark') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('mark_lang.panel_title') }}</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->permission('view_marks'))
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-thumb-tack"></i>
                    <span class="hide-menu">{{ trans('report_lang.report_mark') }} <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    @foreach( App\Classes::all() as $classl )
                        <li class="sub_menu"><a href="{{ url('marksheet/'.$classl->slug) }}"><i class="fa fa-caret-right"></i> {{ $classl->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_invoice'))
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class=" fa fa-suitcase"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_account') }} <span class="fa arrow"></span> </span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('income/income_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('invoice_lang.panel_title') }}</a></li>
                    <li><a  href="{{ url('expense/expense_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('expense_lang.panel_title') }}</a></li>
                    <li><a  href="{{ url('expense/category_list') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('expense_lang.panel_title') }} ({{ trans('category_lang.panel_title') }})</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_payment'))
            <li class="waves-effect">
                <a href="{{ url('payment/payment_list') }}" class="waves-effect">
                    <i class="fa fa-money"></i>
                    <span class="hide-menu">{{ trans('invoice_lang.payment') }}</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('view_teachers'))
            <li class="waves-effect">
                <a href="{{ url('teacher_list') }}" class="waves-effect">
                    <i class="zmdi zmdi-account"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_teacher') }} </span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('view_employee'))
            <li class="waves-effect">
                <a href="{{ url('employee_list') }}" class="waves-effect">
                    <i class="fa fa-group "></i>
                    <span class="hide-menu">Employees </span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('is_admin'))
            <li class="waves-effect">
                <a href="{{ url('admin_list') }}" class="waves-effect">
                    <i class="zmdi zmdi-account-o"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.Admin') }}</span>
                </a>
            </li>
            <li class="waves-effect">
                <a href="{{ url('routine/routine_list') }}" class="waves-effect">
                    <i class="fa fa-calendar "></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_routine') }} </span>
                </a>
            </li>
        @endif
        @if(Auth::user()->permission('take_attendance'))
            <li class="waves-effect">
                <a href="javascript:;" >
                    <i class="fa fa-suitcase"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_attendance') }} <span class="fa arrow"></span> </span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('attendance/') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('sattendance_lang.panel_title') }}</a></li>
                    @if(Auth::user()->permission('is_admin'))
                        <li><a  href="{{ url('teacher_attendance') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('tattendance_lang.panel_title') }}</a></li>
                        <li><a  href="{{ url('employee_attendance') }}" class="waves-effect"><i class="fa fa-caret-right"></i> Employee Attendance</a></li>
                    @endif
                </ul>
            </li>
        @endif
        <li class="waves-effect">
            <a href="{{ url('dormitory/dormitory_list') }}" class="waves-effect">
                <i class="fa fa-building-o"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_hostel') }} </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="{{ url('library/library_list') }}" class="waves-effect">
                <i class="fa fa-book"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_library') }} </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="{{ url('noticeboard/noticeboard_list') }}" class="waves-effect">
                <i class="fa fa-volume-up"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_notice') }} </span>
            </a>
        </li>
        <li class="waves-effect">
            <a href="{{ url('transport/transport_list') }}" class="waves-effect">
                <i class="fa fa-truck"></i>
                <span class="hide-menu">{{ trans('topbar_menu_lang.menu_transport') }} </span>
            </a>
        </li>
        @if(Auth::user()->permission('view_tools'))
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gavel"></i>
                    <span class="hide-menu">{{ trans('other.tools') }} <span class="fa arrow"></span></span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('system_backup') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.system_backup') }}</a></li>
                    <li><a  href="{{ url('data_import') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.data_import') }}</a></li>
                    <li><a  href="{{ url('task_manager') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.task_manager') }}</a></li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->permission('view_settings'))
            <li class="waves-effect">
                <a href="javascript:;">
                    <i class="fa fa-gears"></i>
                    <span class="hide-menu">{{ trans('topbar_menu_lang.menu_setting') }} <span class="fa arrow"></span> </span>
                    
                </a>
                <ul class="nav nav-second-level">
                    <li><a  href="{{ url('general_settings') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.general_settings') }}</a></li>
                    <li><a  href="{{ url('school_settings') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.school_settings') }}</a></li>
                    <li><a  href="{{ url('autobackup_settings') }}" class="waves-effect"><i class="fa fa-caret-right"></i> {{ trans('other.auto_backup_settings') }}</a></li>
                </ul>
            </li>
        @endif
      </ul>
    </div>
  </div>
  </div>
  <!-- Left navbar-header end -->


