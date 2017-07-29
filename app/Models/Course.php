<?php

namespace App\Models;

use URL;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    public function getPictureAttribute($picture){
    	return URL::to('uploads/'.$picture);
    }
}
