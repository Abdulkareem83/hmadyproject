<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCtrl extends Controller
{
    //

    /**
     * showProfilePage. To show the profile page
     *
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Smart Applications Co. <www.smartapps-ye.com>
     */
    public function showProfilePage()
    {
    	$mainTitle= trans('lang.account');
    	$title = trans('lang.profilePage');
    	return view('home.profile')
    			->with(compact('title', 'mainTitle'));
    }
}
