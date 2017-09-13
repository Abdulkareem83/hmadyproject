<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";

    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'category_courses', 'category_id', 'course_id');
    }
}
