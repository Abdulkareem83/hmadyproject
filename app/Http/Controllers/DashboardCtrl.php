<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    //
    /**
     * index. show dashboard main page
     *
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function index()
    {
    	$mainTitle = trans('lang.dashboard');
    	$title = trans('lang.home');

    	return view('admin.dashboard.index')
    			->with(compact('mainTitle', 'title'));
    }
    
}
