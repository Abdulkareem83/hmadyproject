<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    //
    /**
     * index. To show home page
     *
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Smart Applications Co. <www.smartapps-ye.com>
     */
    public function index()
    {
    	$mainTitle = "Hamdy";
    	$title = "Home";
    	return view('home.index')
    				->with(compact('title', 'mainTitle'));
    }
}
