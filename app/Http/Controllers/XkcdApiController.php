<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

class XkcdApiController extends Controller
{
    //
	public function showXkcd(Request $request)
	{
		$this->validate($request, [
			'words' => 'numeric|max:9',
		]);
		
		$xkcd = new Xkcd('words');
		$xkcd->session('nW', 'words'); 
		return view('xkcd')
		->with('display', $xkcd->display())
		->with('status', $xkcd->word_status);		
	}
}
