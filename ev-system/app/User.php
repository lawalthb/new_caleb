<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','class_id','section_id','parent_id', 
        'dormitory_id','reg_no','image','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function can_post()
    {
        $role = $this->role;
        if($role == 'teaching' || $role == 'non-teaching')
        {
            return true;
        }
        return false;
    }
    public function student()
    {
        return $this->hasMany('App\User','student_id');
    }
    public function classes()
    {
        return $this->belongsTo('App\Classes','class_id');
    }

    // Permissions

    public function permission($value)
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->$value == 1 ? true : false;
        return $permission;
    }


    public function can_view_student()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_student == 1 ? true : false;
        return $permission;
    }
    public function can_add_student()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_student == 1 ? true : false;
        return $permission;
    }
    public function can_add_teacher()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_teacher == 1 ? true : false;
        return $permission;
    }
    public function can_view_teachers()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_teachers == 1 ? true : false;
        return $permission;
    }
    public function can_add_employee()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_employee == 1 ? true : false;
        return $permission;
    }
    public function can_view_employee()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_employee == 1 ? true : false;
        return $permission;
    }
    public function can_send_sms()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->send_sms == 1 ? true : false;
        return $permission;
    }
    public function can_view_schools()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_schools == 1 ? true : false;
        return $permission;
    }
    public function can_add_schools()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_school == 1 ? true : false;
        return $permission;
    }
    public function can_view_parents()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_parents == 1 ? true : false;
        return $permission;
    }
    public function can_add_parent()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_parent == 1 ? true : false;
        return $permission;
    }
    public function can_add_class()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_class == 1 ? true : false;
        return $permission;
    }
    public function can_view_classes()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_classes == 1 ? true : false;
        return $permission;
    }
    public function can_add_section()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_section == 1 ? true : false;
        return $permission;
    }
    public function can_view_sections()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_sections == 1 ? true : false;
        return $permission;
    }
    public function can_add_tests()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_tests == 1 ? true : false;
        return $permission;
    }
    public function can_view_tests()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_tests == 1 ? true : false;
        return $permission;
    }
    public function can_add_subject()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_subject == 1 ? true : false;
        return $permission;
    }
    public function can_view_subjects()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_subjects == 1 ? true : false;
        return $permission;
    }
    public function can_add_exam()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_exam == 1 ? true : false;
        return $permission;
    }
    public function can_view_exams()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_exams == 1 ? true : false;
        return $permission;
    }
    public function can_add_invoice()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_invoice == 1 ? true : false;
        return $permission;
    }
    public function can_view_invoice()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_invoice == 1 ? true : false;
        return $permission;
    }
    public function can_add_mark()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_mark == 1 ? true : false;
        return $permission;
    }
    public function can_view_marks()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_marks == 1 ? true : false;
        return $permission;
    }
    public function can_add_payment()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->add_payment == 1 ? true : false;
        return $permission;
    }
    public function can_view_payment()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_payment == 1 ? true : false;
        return $permission;
    }
    public function can_take_attendance()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->take_attendance == 1 ? true : false;
        return $permission;
    }
    public function can_view_settings()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_settings == 1 ? true : false;
        return $permission;
    }
    public function can_view_tools()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->view_tools == 1 ? true : false;
        return $permission;
    }
    public function is_teacher()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->is_teacher == 1 ? true : false;
        return $permission;
    }
    public function is_parent()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->is_parent == 1 ? true : false;
        return $permission;
    }
    public function is_student()
    {
        $permission = Role::find($this->role_id) && Role::find($this->role_id)->is_student == 1 ? true : false;
        return $permission;
    }
}

