<?php
/**
* XKCD Generator
* 
* Description:
* The XKCD Generator generator allows for auto-generation 
* of highly secure passwords by employing randomization of a mix 
* of letters, numbers and special characters attributes.
*
* Author: Michael Depaula
* Copyright: (c) Michael Depaula
*/
namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

/**
* XkcdApiController class
*
* This class contains the required logic to use the XKCD
* class within this web application. 
*
*/
class XkcdApiController extends Controller
{
    /**
    * Function Name : showXkcd
    * Params : Request $request
    * Route: any - /xkcd
    * Purpose : Shows the XKCD web application 
    * integrated
    * 
    * Returns: 
    * sends the resutls to the XKCD view to print
    * passwords, provides online/offline statuses
    */	
    public function showXkcd(Request $request)
    {
        // validates the user input
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