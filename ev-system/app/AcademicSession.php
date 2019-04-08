<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSession extends Model
{
    //
    public static function findNext($id)
    {
        return static::where('id', '>', $id)->first();
    }
}
