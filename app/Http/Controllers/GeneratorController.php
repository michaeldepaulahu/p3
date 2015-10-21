<?php
/**
* LOREM IPSUM GENERATOR
* 
* Description:
* The LOREM IPSUM generator randomly creates a number of 
* paragraphs constructued in latin phrases for the purpose 
* of promptly generating dummy date during web development.  
*
* Author: Michael Depaula
* Copyright: (c) Michael Depaula
* Lorem Ipsum Vendor Package: badcow/lorem-ipsum
* GitHub: https://github.com/Badcow/LoremIpsum
*/
namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Badcow\LoremIpsum\Generator;

/**
* GeneratorController class
*
* This class contains the general logic of the LOREM IPSUM Cruncher.
*
*/
class GeneratorController extends Controller
{	
    /**
    * Function Name : showGenerator
    * Params : Request $request
    * Route: get - /loremipsum
    * Purpose : Shows the lorem ipsum generator view
    * 
    * Returns: 
    * lorem view with generated paragraphs
    */	
    public function showGenerator(Request $request)
    {
        // performs  input validation  
        $this->validate($request, [
            'text'  => 'numeric|integer|max:10'
        ]);
        
		// creates an instance of the lorem ipsum generator
        $generator = new Generator();

        // takes the input and sends the paragraph(s) to the view
		if ($request->has('text')) {
		    $paragraph = $request->input('text');
			$page = $request->input('page');
			$align = $request->input('align');
		    $text= $generator->getParagraphs($paragraph);
		    return view('lorem')
			->with('paragraph', $text)
			->with('page', $page)
			->with('align', $align);
		} else {
			// sets the default to show at view first entry
            $text= $generator->getParagraphs(1);
			$page = "Full Page";
			$align = "Left"; 			
            return view('lorem')
			->with('paragraph', $text)
			->with('page', $page)
			->with('align', $align);
		}
    }
}