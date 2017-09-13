<?php

namespace App\Models;

use URL;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    public function getPictureAttribute($picture)
    {
    	return URL::to('uploads/'.$picture);
    }

    public function chapters()
    {
    	return $this->hasMany('App\Models\Chapter', 'course_id', 'id');
    }

    public function introVideo()
    {
    	return Self::join('chapters', 'courses.id', '=', 'chapters.course_id')
    			->join('videos', 'videos.chapter_id', '=', 'chapters.id')
    			->first();
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_courses', 'course_id', 'category_id');
    }
}
