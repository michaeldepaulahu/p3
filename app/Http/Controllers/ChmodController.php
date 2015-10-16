<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;

class ChmodController extends Controller
{

	public function showChmod(Request $request)
	{
	   $post = $request->all();
	   
	   $userPermission = $this->getInput($request, 'ur','uw','ue');
	   $groupPermission = $this->getInput($request, 'gr','gw','ge');
	   $otherPermission = $this->getInput($request, 'or','ow','oe');
	   $specialPermission = $this->getInput($request, 'su','sg','sb');
	   
	   $read = $this->postHtmltags('Read', NULL);
	   $write = $this->postHtmltags('Write', NULL);
	   $execute = $this->postHtmltags('Execute', NULL);
	   $noread = $this->postHtmltags(NULL, 'Read Denied');
	   $nowrite = $this->postHtmltags(NULL, 'Write Denied');
	   $noexecute = $this->postHtmltags(NULL,'Execute Denied');	   
	   
	   $postSum = array(
	   $userPermission, 
	   $groupPermission, 
	   $otherPermission, 
	   $read, 
	   $write, 
	   $execute,
	   $noread,
	   $nowrite,
	   $noexecute,
	   $specialPermission
	   ); 
	   
	   return view('chmod')->with('post', $post)->with('postSum', $postSum);			
	}
	

	/**
	* Reads the input and calculates the permissions
	*  
	*/	
	public function getInput($request, $read,$write,$execute)
	{
	   $read = $request->input($read );
	   $write = $request->input($write);
   	   $execute = $request->input($execute);
	   return $read + $write + $execute;		
	}


	/**
	* Formats the tags in returning allowing and denying permissions
	*  
	*/			
	public function postHtmltags($allow = NULL, $denied = NULL)
	{
		if ($allow != NULL)
		{
			$permitted = '<i class="fa fa-check-circle-o"></i>';
			$allow = '<span class="allow">' . $permitted . '<strong> '. $allow .' </strong></span><br>';
			return $allow;
		} else {
			$restrict = '<i class="fa fa-minus-circle"></i>';
			$denied = '<span class="deny">' . $restrict . ' ' . $denied . '</span><br>';
			return $denied;
		}
	}
}
