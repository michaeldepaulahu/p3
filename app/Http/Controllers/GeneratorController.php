<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Badcow\LoremIpsum\Generator;

class GeneratorController extends Controller
{

	public function getShow() {
		return view('generate.show');
	}
	
   /// public function showGenerator() {
	//	return view('generate.show')->with('generate', new GeneratorController);			
    //}		

    // 
	public function showGenerator(Request $request)
	{
		$generator = new Generator();		
		if ($request->has('text')) {
    		$paragraph= $request->input('text');
			$text= $generator->getParagraphs($paragraph);
			return view('generate.show')->with('paragraph', $text);
		}else
		{
			return view('generate.show')->with('paragraph', NULL);;
		}
	}
		
}
