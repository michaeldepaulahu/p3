<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

class ProfileController extends Controller
{
    //
	public function showProfile() {
		return view('profile');					
    }	
}
