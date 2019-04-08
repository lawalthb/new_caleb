<?php

use Illuminate\Database\Seeder;
use App\App;
use App\AcademicSession;
use App\User;
use App\Role;
use App\Posts;
use App\Comments;
use App\Classes;
use App\Grade;
use App\Exam;
use App\Routine;
use App\School;
use App\Sections;
use App\Dormitory;
use App\Settings;
use App\Subject;
use App\Day;
use App\Expense;
use App\Employee;
use App\Mark;
use App\Material;
use App\ExpenseCategory;
use App\Notice;
use App\PromotionHistory;
use App\Invoice;
use App\Payment;
use App\Term;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user roles table seeder
        Role::create([
            'name' => 'admin',
            'add_student' => 1,
            'view_students' => 1,
            'view_schools' => 1,
            'add_school' => 1,
            'is_admin' => 1, 
            'is_quality_assurance' => 1, 
            'view_result' => 1, 
            'add_parent' => 1, 
            'view_parents' => 1, 
            'add_teacher' => 1, 
            'view_teachers' => 1, 
            'add_admin' => 1, 
            'view_admin' => 1, 
            'add_class' => 1, 
            'view_classes' => 1, 
            'add_section' => 1, 
            'view_sections' => 1, 
            'add_tests' => 1, 
            'view_tests' => 1, 
            'add_subject' => 1, 
            'view_subjects' => 1, 
            'add_post' => 1, 
            'add_media' => 1, 
            'send_sms' => 1, 
            'add_exam' => 1, 
            'view_exams' => 1, 
            'add_grade' => 1, 
            'view_grade' => 1, 
            'add_mark' => 1, 
            'view_marks' => 1, 
            'view_general_mark_report' => 1, 
            'edit_general_mark_report' => 1, 
            'add_invoice' => 1, 
            'view_invoice' => 1, 
            'add_expense' => 1,
            'view_expenses' => 1,
            'add_expense_category' => 1,
            'view_expense_category' => 1,
            'add_payment' => 1,
            'view_payment' => 1,
            'add_employee' => 1,
            'view_employee' => 1,
            'add_routine' => 1,
            'take_attendance' => 1,
            'add_hostel' => 1, 
            'add_library' => 1, 
            'add_notice' => 1, 
            'add_transport' => 1, 
            'view_tools' => 1, 
            'view_settings' => 1, 
            'admission_enquiry' => 1, 
            'view_visitors_log' => 1, 
        ]);

        Role::create([
            'name' => 'parent',
            'is_parent' => 1,
        ]);

        Role::create([
            'name' => 'student',
            'is_student' => 1,
        ]);

        Role::create([
            'name' => 'teacher',
            'is_teacher' => 1,
            'add_student' => 1,
            'take_attendance' => 1,
            'view_students' => 1,
            'view_subjects' => 1, 
            'add_tests' => 1, 
            'view_tests' => 1, 
            'add_exam' => 1, 
            'view_exams' => 1, 
            'add_grade' => 1, 
            'view_grade' => 1, 
            'add_mark' => 1, 
            'view_marks' => 1, 
            'view_general_mark_report' => 1, 
            'edit_general_mark_report' => 1, 
        ]);

        Role::create([
            'name' => 'receptionist',
            'admission_enquiry' => 1, 
            'view_visitors_log' => 1, 
        ]);

        Role::create([
            'name' => 'quality_assurance',
            'admission_enquiry' => 1, 
            'view_visitors_log' => 1, 
        ]);

        // admin table seeder
        User::create([
            'name' => 'Mr Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'phone' => '232',
            'role' => 'admin',
            'role_id' => '1',
            'admin_type' => 'super',
            'active' => '1',
        ]);

        // parent table seeder
        User::create([
            'name' => 'Mr and Mrs Doe',
            'email' => 'parent@mail.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'role' => 'parent',
            'role_id' => '2',
            'phone' => '6645',
            'address' => 'Oke Ayepe, Osogbo',
            'profession' => 'Doctor',
        ]);

        // student table seeder
        User::create([
            'reg_no' => 'EV20170001',
            'name' => 'Ojo Kayode',
            'email' => 'student@student.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'class_id' => '1',
            'section_id' => '1',
            'parent_id' => '2',
            'dormitory_id' => '1',
            'active' => '1',
            'gender' => 'Male',
            'role' => 'student',
            'role_id' => '3',
            'address' => 'Washington, USA',
        ]);

        // teacher table seeder
        User::create([
            'name' => 'Uncle Emmanuel',
            'email' => 'teacher@teacher.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'role' => 'teacher',
            'role_id' => '4',
            'address' => 'Oke Ayepe, Osogbo',
            'active' => '1',
        ]);

        // receptionist table seeder
        User::create([
            'name' => 'Evelina Bills',
            'email' => 'reception@reception.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'role' => 'receptionist',
            'role_id' => '5',
            'active' => '1',
        ]);

        User::create([
            'reg_no' => 'EV20180002',
            'name' => 'Sammy Brook',
            'email' => 'sammy@student.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'class_id' => '1',
            'section_id' => '1',
            'parent_id' => '2',
            'dormitory_id' => '1',
            'active' => '1',
            'gender' => 'Male',
            'role' => 'student',
            'role_id' => '3',
            'address' => 'Michigan, USA',
        ]);
        User::create([
            'reg_no' => 'EV20180003',
            'name' => 'Jon Cameron',
            'email' => 'jon@student.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'class_id' => '1',
            'section_id' => '1',
            'gender' => 'Male',
            'parent_id' => '2',
            'dormitory_id' => '1',
            'active' => '1',
            'role' => 'student',
            'role_id' => '3',
            'address' => 'Iowa, USA',
        ]);
        User::create([
            'reg_no' => 'EV20180004',
            'name' => 'Raven Sean',
            'email' => 'raven@student.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'class_id' => '1',
            'section_id' => '1',
            'gender' => 'Male',
            'parent_id' => '2',
            'dormitory_id' => '1',
            'active' => '1',
            'role' => 'student',
            'role_id' => '3',
            'address' => 'Vegas, USA',
        ]);
        User::create([
            'reg_no' => 'EV20180005',
            'name' => 'Kelvin Ball',
            'email' => 'kelvin@student.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'class_id' => '1',
            'section_id' => '1',
            'parent_id' => '2',
            'gender' => 'Male',
            'dormitory_id' => '1',
            'active' => '1',
            'role' => 'student',
            'role_id' => '3',
            'address' => 'Florida, USA',
        ]);
        User::create([
            'name' => 'Miss Joe',
            'email' => 'curriculum@curriculum.com',
            'password' => 'password',
            'image' => 'sample.jpg',
            'role' => 'quality_assurance',
            'role_id' => '6',
            'address' => 'San Diego',
            'active' => '1',
        ]);
        AcademicSession::create([
            'name' => '2016/2017',
            'note' => '2016/2017',
            'start' => '2016-08-22 00:00:00',
            'end' => '2017-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2017/2018',
            'note' => '2017/2018',
            'start' => '2017-08-22 00:00:00',
            'end' => '2018-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2018/2019',
            'note' => '2018/2019',
            'start' => '2018-08-22 00:00:00',
            'end' => '2019-08-22 00:00:00',
            'current' => '1',
        ]);
        AcademicSession::create([
            'name' => '2019/2020',
            'note' => '2019/2020',
            'start' => '2019-08-22 00:00:00',
            'end' => '2020-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2020/2021',
            'note' => '2020/2021',
            'start' => '2020-08-22 00:00:00',
            'end' => '2021-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2021/2021',
            'note' => '2021/2022',
            'start' => '2021-08-22 00:00:00',
            'end' => '2022-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2022/2023',
            'note' => '2022/2023',
            'start' => '2022-08-22 00:00:00',
            'end' => '2023-08-22 00:00:00',
            'current' => '0',
        ]);
        AcademicSession::create([
            'name' => '2023/2024',
            'note' => '2023/2024',
            'start' => '2023-08-22 00:00:00',
            'end' => '2024-08-22 00:00:00',
            'current' => '0',
        ]);


        Term::create([
            'name' => 'First Term',
            'session_id' => 1,
        ]);
        Term::create([
            'name' => 'Second Term',
            'session_id' => 1,
        ]);
        Term::create([
            'name' => 'Third Term',
            'session_id' => 1,
        ]);
        Term::create([
            'name' => 'First Term',
            'session_id' => 2,
        ]);
        Term::create([
            'name' => 'Second Term',
            'session_id' => 2,
        ]);
        Term::create([
            'name' => 'Third Term',
            'session_id' => 2,
        ]);
        Term::create([
            'name' => 'First Term',
            'session_id' => 3,
        ]);
        Term::create([
            'name' => 'Second Term',
            'session_id' => 3,
        ]);
        Term::create([
            'name' => 'Third Term',
            'session_id' => 3,
        ]);
        Term::create([
            'name' => 'First Term',
            'session_id' => 4,
        ]);
        Term::create([
            'name' => 'Second Term',
            'session_id' => 4,
        ]);
        Term::create([
            'name' => 'Third Term',
            'session_id' => 4,
        ]);
        Term::create([
            'name' => 'First Term',
            'session_id' => 5,
        ]);
        Term::create([
            'name' => 'Second Term',
            'session_id' => 5,
        ]);
        Term::create([
            'name' => 'Third Term',
            'session_id' => 5,
        ]);
        
        

        /*Restore point for classes*/
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-one',
            'title' => 'Grade One',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-two',
            'title' => 'Grade Two',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-three',
            'title' => 'Grade Three',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-four',
            'title' => 'Grade Four',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-five',
            'title' => 'Grade Five',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-six',
            'title' => 'Grade Six',
            'active' => '1',
        ]);
        Classes::create([
            'teacher_id' => '4',
            'subject_id' => '1',
            'student_id' => '1',
            'section_id' => '1',
            'slug' => 'grade-seven',
            'title' => 'Grade Seven',
            'active' => '1',
        ]);
        Sections::create([
            'teacher_id' => '4',
            'title' => 'First',
            'class_id' => '1',
            'active' => '1',
        ]);
        Subject::create([
            'teacher_id' => '4',
            'class_id' => '1',
            'title' => 'Mathematics',
            'active' => '1',
        ]);

        Subject::create([
            'teacher_id' => '4',
            'class_id' => '1',
            'title' => 'English',
            'active' => '1',
        ]);

        Subject::create([
            'teacher_id' => '4',
            'class_id' => '2',
            'title' => 'Computer Science',
            'active' => '1',
        ]);

        Subject::create([
            'teacher_id' => '4',
            'class_id' => '2',
            'title' => 'Social Science',
            'active' => '1',
        ]);

        Settings::create([
            'system_name' => 'Sample School',
            'system_title' => 'Sample School',
            'system_email' => 'sample@sample.com',
            'skin_color' => 'green',
            'can_change' => '1',
            'page' => '1',
            'address' => '9870 Broadmoor Dr, San Ramon, CA 94583, USA',
            'currency' => '',
            'text_align' => '',
        ]);
        Dormitory::create([
            'name' => 'Beecroft',
            'room_number' => '10',
            'description' => 'this sample dormitory',
            'active' => '1',
        ]);
        Posts::create([
            'author_id' => '1',
            'title' => 'Industrial Visit to A Broadcasting Corporation',
            'body' => 'Students of Semester one to three offering Business Administration were privileged to visit Ghana Broadcasting Corporation (GBC) on 06-11-2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'industrial-visit-to-a-broadcasting-corporation',
            'image' => '62206industrial-visit-to-a-broadcasting-corporation.jpg',
            'active' => '1',
        ]);
        Comments::create([
            'on_post' => '1',
            'from_user' => '1',
            'from_user_role' => 'teaching',
            'body' => 'This is a sample comment',
            
        ]);
        Notice::create([
            'title' => 'This is a sample Notification',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'for' => 'all',
            'active' => '1',
            
        ]);
        Notice::create([
            'title' => 'This is a sample Notification',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'for' => 'all',
            'active' => '1',
            
        ]);
        ExpenseCategory::create([
            'name' => 'Salary Payment',
            'active' => '1',
        ]);
        Expense::create([
            'title' => 'Salary Payment',
            'amount' => '5000',
            'method' => 'Cash',
            'date' => '2017-12-25',
            'category' => '1',
            'active' => '1',
        ]);

        Posts::create([
            'author_id' => '1',
            'title' => 'Pre-Exam Stress Buster',
            'body' => 'We conducted a seminar on ‘Pre-Exam Stress Buster’ at Auditorium on 10-11-2017. Resource person, Dr. Hiteshini Jugessur is a renowned International faculty from Art of Living Foundation. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'pre-exam-stress-buster',
            'image' => '75092pre-exam-stress-buster.jpg',
            'active' => '1',
        ]);
        Posts::create([
            'author_id' => '1',
            'title' => 'Attitude: An essential element at the workplace',
            'body' => 'Department of Business Administration organized a seminar for its BBA students on 11th November. Resource person was Mrs. Lynda C H Fiati, Director of Stelin Automobiles and she spoke on ‘Attitude: An essential element at the workplace. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'attitude-an-essential-element-at-the-workplace',
            'image' => '13807attitude-an-essential-element-at-the-workplace.jpg',
            'active' => '1',
        ]);
        Posts::create([
            'author_id' => '1',
            'title' => 'International Students Week 2017',
            'body' => 'In 1941, November 17 was declared International Students Day. The International Student’s Day is a celebration of multiculturalism, diversity and cooperation among students. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'international-students-week-2017',
            'image' => '36580international-students-week-2017.jpg',
            'active' => '1',
        ]);
        School::create([
            'name' => 'California High School',
            'email' => 'contact@calhigh.edu',
            'phone' => '+1 925-803-3200',
            'photo' => 'logo.png',
            'color' => 'cosmic',
            'address' => '9870 Broadmoor Dr, San Ramon, CA 94583, USA',
            'status' => '1',
        ]);
        Day::create([
            'name' => 'Sunday',
        ]);
        Day::create([
            'name' => 'Monday',
        ]);
        Day::create([
            'name' => 'Tuesday',
        ]);
        Day::create([
            'name' => 'Wednesday',
        ]);
        Day::create([
            'name' => 'Thursday',
        ]);
        Day::create([
            'name' => 'Friday',
        ]);
        Day::create([
            'name' => 'Saturday',
        ]);


        Grade::create([
            'name' => 'Excellent',
            'grade_point' => 'A',
            'mark_from' => '75',
            'mark_upto' => '100',
        ]);
        Grade::create([
            'name' => 'Good',
            'grade_point' => 'B',
            'mark_from' => '50',
            'mark_upto' => '74',
        ]);
        Grade::create([
            'name' => 'Average',
            'grade_point' => 'C',
            'mark_from' => '40',
            'mark_upto' => '49',
        ]);
        Grade::create([
            'name' => 'Poor',
            'grade_point' => 'D',
            'mark_from' => '0',
            'mark_upto' => '39',
        ]);

        Exam::create([
            'name' => 'First Terminal Examination',
            'term_id' => 1,
            'date' => '2018-11-10',
        ]);
        Exam::create([
            'name' => 'Second Terminal Examination',
            'term_id' => 2,
            'date' => '2019-04-03',
        ]);
        Exam::create([
            'name' => 'Third Terminal Examination',
            'term_id' => 3,
            'date' => '2019-08-14',
        ]);
        Exam::create([
            'name' => 'First Terminal Examination',
            'term_id' => 4,
            'date' => '2018-11-10',
        ]);
        Exam::create([
            'name' => 'Second Terminal Examination',
            'term_id' => 5,
            'date' => '2019-04-03',
        ]);
        Exam::create([
            'name' => 'Third Terminal Examination',
            'term_id' => 6,
            'date' => '2019-08-14',
        ]);

        Exam::create([
            'name' => 'First Terminal Examination',
            'term_id' => 7,
            'date' => '2018-11-10',
        ]);
        Exam::create([
            'name' => 'Second Terminal Examination',
            'term_id' => 8,
            'date' => '2019-04-03',
        ]);
        Exam::create([
            'name' => 'Third Terminal Examination',
            'term_id' => 9,
            'date' => '2019-08-14',
        ]);

        Material::create([
            'title' => 'Cabinet/Parliamentary System of Government',
            'description' => 'The central government has exclusive matters constitutionally allocated to it, such matters are of common interest and they may include currency, foreign affairs, communication, census, defence, arms and ammunitions, immigration, customs and excise etc.',
            'file_name' => '72775introduction-to-technology.doc',
            'class_id' => 1,
            'teacher_id' => 4,
        ]);
        Material::create([
            'title' => 'Cabinet/Parliamentary System of Government',
            'description' => 'The central government has exclusive matters constitutionally allocated to it, such matters are of common interest and they may include currency, foreign affairs, communication, census, defence, arms and ammunitions, immigration, customs and excise etc.',
            'file_name' => '72775introduction-to-technology.doc',
            'class_id' => 1,
            'teacher_id' => 4,
        ]);
        Routine::create([
            'subject_id' => '1',
            'class_id' => '1',
            'starts' => '6 am',
            'ends' => '9 am',
            'day_id' => '4',
            'time' => 'am',
        ]);
        Routine::create([
            'subject_id' => '2',
            'class_id' => '1',
            'starts' => '9 am',
            'ends' => '11 am',
            'day_id' => '4',
            'time' => 'am',
        ]);
        PromotionHistory::create([
            'student_id' => '3',
            'from_class' => '1',
            'to_class' => '2',
        ]);
        PromotionHistory::create([
            'student_id' => '3',
            'from_class' => '2',
            'to_class' => '3',
        ]);
        PromotionHistory::create([
            'student_id' => '6',
            'from_class' => '1',
            'to_class' => '2',
        ]);
        PromotionHistory::create([
            'student_id' => '6',
            'from_class' => '2',
            'to_class' => '3',
        ]);
        Payment::create([
            'title' => 'School Fees',
            'payment_type' => 'income',
            'invoice_id' => '1',
            'student_id' => '3',
            'method' => 'Cash',
            'description' => 'School Fees',
            'amount' => '5000',
        ]);
        Payment::create([
            'title' => 'School Fees',
            'payment_type' => 'income',
            'invoice_id' => '1',
            'student_id' => '3',
            'method' => 'Cash',
            'description' => 'School Fees',
            'amount' => '4000',
        ]);
        Invoice::create([
            'title' => 'School Fees',
            'description' => 'School Fees',
            'amount' => '4000',
            'amount_paid' => '4000',
            'date' => '2018-12-14',
            'student_id' => '3',
            'payment_method' => 'Cash',
            'payment_detail' => 'Cash',
            'status' => 'paid',
        ]);
        Invoice::create([
            'title' => 'School Fees',
            'description' => 'School Fees',
            'amount' => '5000',
            'amount_paid' => '5000',
            'date' => '2018-12-14',
            'student_id' => 3,
            'payment_method' => 'Cash',
            'payment_detail' => 'Cash',
            'status' => 'paid',
        ]);
        Mark::create([
            'subject_id' => '1',
            'student_id' => '3',
            'class_id' => '1',
            'exam_id' => '1',
            'term_id' => '1',
            'mark_obtained' => '54',
            'mark_total' => '60',
            'comment' => 'good',
        ]);
        Mark::create([
            'subject_id' => '1',
            'student_id' => '6',
            'class_id' => '1',
            'exam_id' => '1',
            'term_id' => '1',
            'mark_obtained' => '43',
            'mark_total' => '60',
            'comment' => 'good',
        ]);
        Mark::create([
            'subject_id' => '1',
            'student_id' => '7',
            'class_id' => '1',
            'exam_id' => '2',
            'term_id' => '2',
            'mark_obtained' => '38',
            'mark_total' => '60',
            'comment' => 'good',
        ]);
        Mark::create([
            'subject_id' => '2',
            'student_id' => '8',
            'class_id' => '1',
            'exam_id' => '2',
            'term_id' => '2',
            'mark_obtained' => '36',
            'mark_total' => '60',
            'comment' => 'good',
        ]);
        App::create([
            'name' => 'eduvella app',
            'app_token' => 'VRzcwMFVzzwsMvEfyZphPRW7F',
            'app_secret' => 'KfgMJH0X3pqlQLNJg4hFHAG1Y',
        ]);
    }
}
