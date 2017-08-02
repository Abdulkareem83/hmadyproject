<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    public function course()
    {
    	return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function videos()
    {
    	return $this->hasMany('App\Models\Video', 'chapter_id', 'id');
    }
}
