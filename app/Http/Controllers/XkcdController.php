<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

class XkcdController extends Controller
{
    public function showXkcd() 
	{
		$custom = new Xkcd('words');
		$custom->session('nW', 'words'); 
		return view('p2', array(
			 'status' => $custom->word_status,
			 'display' => $custom->display()
		));	
    }		
}
