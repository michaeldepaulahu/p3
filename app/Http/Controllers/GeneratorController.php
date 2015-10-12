<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Badcow\LoremIpsum\Generator;

class GeneratorController extends Controller
{
    // 
	public function showGenerator(Request $request)
	{
		$generator = new Generator();		
		if ($request->has('text')) {
    		$paragraph= $request->input('text');
			$text= $generator->getParagraphs($paragraph);
			$formatted = implode('<p>', $text); 
			return $formatted;
		}	
		//View::make('home')->with('paragraph',$formatted); 
	}
		
}
