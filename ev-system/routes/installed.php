<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/





Route::get('/send', 'EmailController@ship');
Route::get('/', 'LoginController@index');
Auth::routes();

Route::get('/test-print', function () {
    return view('prints.spreadsheet-exam');
});




Route::get('/dashboard', 'Logged@index');
Route::get('/apps', 'HomeController@apps');
Route::post('/add-app', 'HomeController@add_app');
Route::post('/update-app', 'HomeController@update_app');
Route::get('app/delete/{id}', 'HomeController@destroy_app');
Route::get('/permission', 'HomeController@permission');
Route::post('/update-permission', 'HomeController@update_permission');
Route::get('/roles', 'HomeController@roles');
Route::post('/add-role', 'HomeController@add_role');
Route::post('/update-role', 'HomeController@update_role');
Route::get('role/delete/{id}', 'HomeController@destroy_roles');
Route::get('/visitors-log', 'HomeController@visitors_log');
Route::post('/receptionist/create-visitor', 'HomeController@create_visitors_log');
Route::post('/receptionist/update-visitor', 'HomeController@update_visitors_log');
Route::get('visitor/delete/{id}', 'HomeController@destroy_visitors_log');
Route::get('/admission-enquiries', 'HomeController@admission_enquiries');
Route::post('/receptionist/create-enquiries', 'HomeController@create_admission_enquiries');
Route::post('/receptionist/update-enquiries', 'HomeController@update_admission_enquiries');
Route::get('enquiries/delete/{id}', 'HomeController@destroy_admission_enquiries');
Route::get('/terms', 'HomeController@terms');
Route::post('/add-term', 'HomeController@add_term');
Route::post('/update-term', 'HomeController@update_term');
Route::get('term/delete/{id}', 'HomeController@destroy_term');
Route::get('/sessions', 'HomeController@sessions');
Route::post('/add-session', 'HomeController@add_session');
Route::post('/update-sessions', 'HomeController@update_session');
Route::get('sessions/delete/{id}', 'HomeController@destroy_session');
Route::get('student-promotion',['as' => 'classes', 'uses' => 'HomeController@student_promotion'])->where('id', '[A-Za-z0-9-_]+');
Route::post('select-student-promotion', 'HomeController@select_student_promotion');
Route::get('student-promotion/{current_class}/{next_class}/{promote_from}/{promote_to}',['as' => 'classes', 'uses' => 'HomeController@student_promotion'])->where('id', '[A-Za-z0-9-_]+');
Route::post('student-promotion/{current_class}/{next_class}/{promote_from}/{promote_to}',['as' => 'classes', 'uses' => 'HomeController@store_student_promotion'])->where('id', '[A-Za-z0-9-_]+');

Route::get('schools', 'HomeController@show_schools');
Route::post('store-school', 'HomeController@store_school');
Route::post('update-school', 'HomeController@update_school');
Route::get('school/delete/{id}', 'HomeController@destroy_school');
Route::get('/general_settings', 'HomeController@settings');
Route::post('/general_settings','HomeController@update_settings');
Route::get('/school_settings', 'HomeController@school_settings');
Route::post('/school_settings', 'HomeController@update_school_settings');
Route::get('/autobackup_settings', 'HomeController@backup_settings');
Route::post('/autobackup_settings','HomeController@update_backup_settings');
Route::get('/employee_list', 'HomeController@show_employee');
Route::post('employee/create_employee','HomeController@store_employee');
Route::post('employee/update_employee','HomeController@update_employee');
Route::get('employee/delete/{id}', 'HomeController@destroy_employee');
Route::get('/teacher_list', 'HomeController@show_teacher');
Route::get('/teacher_list/{type}', 'HomeController@export_teacher');
Route::get('/parent_list', 'HomeController@show_parent');
Route::get('class/spread-sheets', 'HomeController@spread_sheets');
Route::post('class/spread-sheets', 'HomeController@view_spread_sheets');
Route::get('class/class_list', 'HomeController@show_class');
Route::post('class/update_class','HomeController@update_class_list');
Route::post('class/create_class','HomeController@store_class');
Route::get('class/section_list', 'HomeController@show_section');
Route::get('class/section_list/{id}',['as' => 'post', 'uses' => 'HomeController@view_section'])->where('id', '[0-9]+');
Route::post('class/create_section','HomeController@store_section');
Route::post('class/update_section','HomeController@update_section');
Route::get('section/delete/{id}', 'HomeController@destroy_section');
Route::get('class/delete/{id}', 'HomeController@destroy_class');
Route::get('/students/student_list', 'HomeController@show_student');
Route::get('students/create_student', 'HomeController@create_student');
Route::post('students/create_student', 'HomeController@store_student');
Route::get('students/create_bulk_student', 'HomeController@create_bulk_student');
Route::post('students/create_bulk_student', 'HomeController@store_bulk_student');
Route::get('parents/create_parent', 'HomeController@create_parent');
Route::post('parents/create_parent', 'HomeController@store_parent');
Route::get('parents/create_bulk_parent', 'HomeController@create_bulk_parent');
Route::post('parents/create_bulk_parent', 'HomeController@store_bulk_parent');
Route::post('parents/update_parent', 'HomeController@update_parent_list');
Route::get('parents/delete/{id}', 'HomeController@destroy_parent');
Route::get('teachers/create_teacher', 'HomeController@create_teacher');
Route::post('teachers/create_teacher','HomeController@store_teacher');
Route::post('teachers/update_teacher','HomeController@update_teacher');
Route::get('teachers/delete/{id}', 'HomeController@destroy_teachers');
Route::get('admin_list', 'HomeController@show_admin');
Route::post('admins/create_admin','HomeController@store_admin');
Route::post('admins/update_admin','HomeController@update_admin');
Route::get('admins/delete/{id}', 'HomeController@destroy_admin');
// language routes
Route::get('language/{locale}', 'HomeController@language');
// dormitory routes
Route::get('dormitory/dormitory_list', 'HomeController@show_dormitory');
Route::get('dormitory/create_dormitory', 'HomeController@create_dormitory');
Route::post('dormitory/create_dormitory', 'HomeController@store_dormitory');
Route::get('dormitory/delete/{id}', 'HomeController@destroy_dormitory');
Route::get('editdormitory/{id}','HomeController@edit_dormitory')->where('id', '[0-9]+');
Route::post('editdormitory', 'HomeController@update_dormitory');
Route::get('ca-tests', 'HomeController@show_ca_test');
Route::get('ca-tests/upload-bulk', 'HomeController@upload_bulk_ca_test');
Route::post('ca-tests/upload-bulk', 'HomeController@store_bulk_ca_test');
Route::get('exam/upload-bulk-exam', 'HomeController@upload_bulk_exam');
Route::post('exam/upload-bulk-exam', 'HomeController@store_bulk_exam');
Route::post('ca-tests','HomeController@update_ca_test');
Route::post('ca-tests/store','HomeController@store_ca_test');
Route::get('ca-tests/{term}/{class}/{subject}','HomeController@view_ca_test');
// exam routes
Route::get('exam/exam_list', 'HomeController@show_exam');
Route::get('exam/create_exam', 'HomeController@create_exam');
Route::post('exam/create_exam', 'HomeController@store_exam');
Route::post('exam/update_exam', 'HomeController@update_exam');
Route::get('exam/delete/{id}', 'HomeController@destroy_exam');
Route::get('exam/manage_mark', 'HomeController@manage_mark');
Route::post('select_mark', 'HomeController@select_mark');
Route::get('manage_mark/{exam}/{class}/{subject}',['as' => 'classes', 'uses' => 'HomeController@manage_mark'])->where('id', '[A-Za-z0-9-_]+');
Route::post('manage_mark',['as' => 'classes', 'uses' => 'HomeController@store_mark'])->where('id', '[A-Za-z0-9-_]+');
// Gallery routes
Route::get('gallery/gallery_list', 'HomeController@show_gallery');
Route::get('gallery/create_gallery', 'HomeController@create_gallery');
Route::post('gallery/create_gallery', 'HomeController@store_gallery');
// grade routes
Route::get('grade/grade_list', 'HomeController@show_grade');
Route::get('grade/create_grade', 'HomeController@create_grade');
Route::post('grade/create_grade', 'HomeController@store_grade');
Route::post('grade/update_grade', 'HomeController@update_grade');
Route::get('grade/delete/{id}', 'HomeController@destroy_grade');
Route::get('marksheet/{title}',['as' => 'classes', 'uses' => 'HomeController@mark_sheet_show'])->where('title', '[A-Za-z0-9-_]+');
// income route
Route::get('income/income_list', 'HomeController@show_income');
// payment routes
Route::get('payment/payment_list', 'HomeController@show_payment');
Route::post('payment/create_payment', 'HomeController@store_payment');
Route::post('payment/update_payment', 'HomeController@update_payment');
Route::get('payment/delete/{id}', 'HomeController@destroy_payment');
// expenses routes
Route::get('expense/expense_list', 'HomeController@show_expense');
Route::post('expense/create_expense', 'HomeController@store_expense');
Route::post('expense/update_expense', 'HomeController@update_expense');
Route::get('expense/delete/{id}', 'HomeController@destroy_expense');
// expense categories routes
Route::get('expense/category_list', 'HomeController@show_expense_categories');
Route::post('expense/create_expense_category', 'HomeController@store_expense_category');
Route::post('expense/update_expense_category', 'HomeController@update_expense_category');
Route::get('expensecat/delete/{id}', 'HomeController@destroy_expense_category');
// transport routes
Route::get('/transport/transport_list', 'HomeController@show_transport');
Route::get('transport/create_transport', 'HomeController@create_transport');
Route::post('transport/create_transport', 'HomeController@store_transport');
Route::post('transport/update_transport', 'HomeController@update_transport');
Route::get('transport/delete/{id}', 'HomeController@destroy_transport');
// backup routes
Route::get('system_backup', 'HomeController@system_backup');
Route::post('backup/generate_backup', 'HomeController@backup_now');
Route::get('data_import', 'HomeController@data_import');
Route::post('import_data', 'HomeController@import_now');
Route::get('recycle_bin', 'HomeController@recycle_bin');
Route::get('task_manager', 'HomeController@task_manager');
Route::get('task_manager/{action}', 'HomeController@execute_taskmanager');
// tools routes
Route::get('tools/clear_view', 'HomeController@clear_view');
// library routes
Route::get('/library/library_list', 'HomeController@show_library');
Route::get('/library/create_library', 'HomeController@create_library');
Route::post('/library/create_library', 'HomeController@store_library');
Route::post('library/update_library', 'HomeController@update_library');
Route::get('library/delete/{id}', 'HomeController@destroy_library');
    // noticeboard routes
Route::get('/noticeboard/noticeboard_list', 'HomeController@show_noticeboard');
Route::post('/noticeboard/create_noticeboard', 'HomeController@store_noticeboard');
Route::post('/noticeboard/update_noticeboard', 'HomeController@update_noticeboard');
Route::get('noticeboard/delete/{id}', 'HomeController@destroy_noticeboard');
// message routes
Route::get('/messages', 'HomeController@show_message');
Route::get('messages/role/{role}',['as' => 'post', 'uses' => 'HomeController@show_message_by_role'])->where('id', '[0-9]+');
Route::get('/messages/sent', 'HomeController@show_sent_message');
Route::get('messages/{id}',['as' => 'post', 'uses' => 'HomeController@view_message'])->where('id', '[0-9]+');
Route::post('messages/reply', 'HomeController@store_reply');
Route::post('messages/store', 'HomeController@store_message');
Route::get('messages/reply/delete/{id}', 'HomeController@destroy_message_reply');
Route::get('messages/bulk', 'HomeController@send_bulk_message');
Route::post('messages/send_bulk_student', 'HomeController@store_bulk_message');
Route::get('messages/send_email', 'HomeController@send_email');
Route::post('messages/send_email', 'HomeController@store_email');
// Routine routes
Route::get('routine/routine_list', 'HomeController@show_routine');
Route::get('routine/create_routine', 'HomeController@create_routine');
Route::post('routine/create_routine', 'HomeController@store_routine');
Route::get('routine/delete/{id}', 'HomeController@destroy_routine');
Route::get('routine/edit/{id}', 'HomeController@edit_routine');
Route::post('routine/update/{id}', 'HomeController@update_routine');
Route::get('profile/{id}','HomeController@admin_profile')->where('id', '[0-9]+');
Route::get('editprofile/{id}','HomeController@edit_profile')->where('id', '[0-9]+');
Route::post('editprofile','HomeController@update_profile')->where('id', '[0-9]+');
Route::post('editprofilepass','HomeController@update_profile_pass')->where('id', '[0-9]+');

Route::get('classes/delete/{id}', 'HomeController@destroy_classes');
Route::get('classes/{title}',['as' => 'classes', 'uses' => 'HomeController@class_show'])->where('title', '[A-Za-z0-9-_]+');
Route::get('classes/{title}/{school}',['as' => 'classes', 'uses' => 'HomeController@class_show_by_school'])->where('title', '[A-Za-z0-9-_]+');
Route::post('classes/update_student', 'HomeController@update_classes_student');
Route::post('select_atendance', 'HomeController@select_attendance');
Route::get('attendance',['as' => 'classes', 'uses' => 'HomeController@attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::get('attendance/{day}/{month}/{year}/{id}',['as' => 'classes', 'uses' => 'HomeController@attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('attendance/{day}/{month}/{year}/{id}',['as' => 'classes', 'uses' => 'HomeController@store_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('attendance/update/{day}/{month}/{year}/{id}',['as' => 'classes', 'uses' => 'HomeController@update_attendance'])->where('id', '[A-Za-z0-9-_]+');
// teacher attendance
Route::post('select_teacher_atendance', 'HomeController@select_teacher_attendance');
Route::get('teacher_attendance',['as' => 'classes', 'uses' => 'HomeController@teacher_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::get('teacher_attendance/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@teacher_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('teacher_attendance/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@store_teacher_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('teacher_attendance/update/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@update_teacher_attendance'])->where('id', '[A-Za-z0-9-_]+');
    // employee attendance
Route::post('select_employee_atendance', 'HomeController@select_employee_attendance');
Route::get('employee_attendance',['as' => 'classes', 'uses' => 'HomeController@employee_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::get('employee_attendance/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@employee_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('employee_attendance/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@store_employee_attendance'])->where('id', '[A-Za-z0-9-_]+');
Route::post('employee_attendance/update/{day}/{month}/{year}',['as' => 'classes', 'uses' => 'HomeController@update_employee_attendance'])->where('id', '[A-Za-z0-9-_]+');
    
// javascript auto select options
Route::get('get_class_section/{id}',['as' => 'sectionli', 'uses' => 'HomeController@sectionli'])->where('id', '[A-Za-z0-9-_]+');
Route::get('get_class_subjects/{id}',['as' => 'subjectli', 'uses' => 'HomeController@subjectli'])->where('id', '[A-Za-z0-9-_]+');

Route::get('subject/{title}',['as' => 'classes', 'uses' => 'HomeController@subject_show'])->where('title', '[A-Za-z0-9-_]+');
Route::post('subject/create_subject','HomeController@store_subject');
Route::post('subject/update_subject','HomeController@update_subject');
Route::get('subject/delete/{id}', 'HomeController@destroy_subject');
Route::get('online_test', 'HomeController@online_test');
Route::post('store_online_test', 'HomeController@store_test');
Route::get('test/delete/{id}', 'HomeController@destroy_test');
Route::post('test/update_test','HomeController@update_test');
Route::get('add_test_question', 'HomeController@add_test_question');
Route::post('add_test_question', 'HomeController@store_test_question');
Route::post('update_test_question', 'HomeController@update_test_question');
Route::get('test_question/delete/{id}', 'HomeController@destroy_test_question');
Route::get('test_question/{id}', 'HomeController@view_test_question');
Route::get('add_bulk_test_question', 'HomeController@add_bulk_test_question');
Route::post('store_bulk_test_question', 'HomeController@store_bulk_test_question');
Route::get('send_sms', 'HomeController@send_sms');


Route::get('teacher/class/study_material', 'TeacherController@study_material');
Route::post('teacher/class/study_material', 'TeacherController@store_study_material');
Route::post('teacher/class/update_study_material', 'TeacherController@update_study_material');
Route::get('teacher/class/study_material/delete/{id}', 'TeacherController@destroy_study_material');


Route::get('parent/subject/{title}',['as' => 'classes', 'uses' => 'ParentController@subject_show'])->where('title', '[A-Za-z0-9-_]+');
Route::get('parent/routine/{id}','ParentController@show_routine')->where('id', '[0-9]+');
Route::get('parent/marks/{id}','ParentController@show_mark')->where('id', '[0-9]+');
Route::get('parent/marks/{id}/{exam}','ParentController@show_submark')->where('id', '[0-9]+');
Route::get('parent/invoice/{id}', 'ParentController@show_payment');


Route::get('student/subject/{id}',['as' => 'classes', 'uses' => 'StudentController@subject_show'])->where('title', '[A-Za-z0-9-_]+');
Route::get('student/routine/routine_list/{id}', 'StudentController@show_routine')->where('title', '[A-Za-z0-9-_]+');
Route::get('student/class/study_material', 'StudentController@study_material');
Route::get('student/payment_invoice', 'StudentController@show_payment');
Route::get('student/ca-test-result/{id}','StudentController@show_mark')->where('id', '[0-9]+');
Route::post('student/ca-test-result/{id}','StudentController@view_mark')->where('id', '[0-9]+');
Route::get('student/exam-result/{id}','StudentController@show_exam_result')->where('id', '[0-9]+');
Route::post('student/exam-result/{id}','StudentController@view_exam_result')->where('id', '[0-9]+');
Route::get('student/online_test', 'StudentController@show_test');
Route::get('student/start_test/{id}','StudentController@start_test')->where('id', '[0-9]+');
Route::post('student/test/store', 'StudentController@store_test');
Route::get('student/test_result/{id}','StudentController@test_result')->where('id', '[0-9]+');


Route::get('posts/new-post','PostController@create');
// save new post
Route::post('posts/new-post','PostController@store');
// edit post form
Route::get('posts/edit/{slug}','PostController@edit');
Route::get('posts/all-post','HomeController@show_post');
// update post
Route::post('posts/update','PostController@update');
// delete post
Route::get('posts/delete/{id}','PostController@destroy');
Route::get('posts/{slug}',['as' => 'post', 'uses' => 'HomeController@view_blog'])->where('slug', '[A-Za-z0-9-_]+');
Route::post('comment/store', 'HomeController@store_comment');
Route::get('posts/comments/delete/{id}', 'HomeController@destroy_post_comment');
Route::get('install/done',['as' => 'blog', 'uses' => 'InstallController@done']);
Route::get('change-skin/{value}','LoginController@change_skin')->where('value', '[A-Za-z0-9-_]+');
//website restore point
Route::get('restore-site', 'LoginController@restore');


