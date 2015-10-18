<?php
/**
* CHMOD Cruncher
* 
* Description:
* This file contains the logic of the CHMOD Cruncher web application. 
* The CHMOD Cruncher web application allows the user to simulate a 
* typical call to the chmod command,  which is a command that sets 
* access permiisions to files and directories in a OS system like Unix.
*
* Author: Michael Depaula
* Copyright: (c) Michael Depaula
*
*/

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;

/**
* ChmodController class
*
* This class contains the general logic of the Chmod Cruncher.
*
*/
class ChmodController extends Controller
{
	
    /**
    * These are permissions variables 
	* sent to the chmod view
    */	
    public $read;
    public $write;
    public $execute;
    public $noread;
    public $nowrite;
    public $noexecute;
    public $userPermission;
    public $groupPermission;
    public $otherPermission;
    public $specialPermission;
    public $postSum = array();

    /**
    * Function Name : showChmod
	* Params : Request $request
	* Route: get - /chmod
    * Purpose : Send the initial values to the chmod view
	* 
	* Returns: 
	* spl - initial octal perimison
	* post - sets to no post as default
	* setHtml tags - prints default permissions
	* postSum - reads map of permissions as default 
	* run - sends the controller to the view
    */	
    public function showChmod(Request $request)
    {
        $spl = array(0,0,0,0);

        $post = $request->all();

        $this->setHtmltags($request);

        $postSum = array (0, 0, 0, 0, 0, 0, $this->noread, $this->nowrite, $this->noexecute, 0);

        return view('chmod')
		->with('split', $spl)
		->with('post', $post)
        ->with('postSum', $postSum)
        ->with('run', new ChmodController);
    }

    /**
    * Function Name : postChmod
	* Params : Request $request
	* Route: post - /chmod
    * Purpose : takes permission readings or octal input
	* and builds the view with permission results
	* 
	* Returns: 
	* spl - splits octal input
	* post - reads general posted values
	* setHtml tags - prints processed permissions
	* postSum - reads map of permissions based on checked
	* or octal inputs
    */	
    public function postChmod(Request $request)
    {
        // performs octal input validation  
        $this->validate($request, [
            'text'  => 'numeric|digits:4|max:7777'
        ]);
		
		// takes octal reading and splits each digit 
        $text = $request->input('text');
        $spl = str_split($text);
         
		// reads all posts
        $post = $request->all();
        
		// sums the permission and sets to each group
        $this->setSum($request);
        
		// formats Html results of permissions
        $this->setHtmltags($request);
        
		// builds an array of permission settins
        $postSum = array (
            $this->userPermission,
            $this->groupPermission,
            $this->otherPermission,
            $this->read,
            $this->write,
            $this->execute,
            $this->noread,
            $this->nowrite,
            $this->noexecute,
            $this->specialPermission
        );	
	   
	   // reads map of permissions based on checked or octal inputs
	   return view('chmod')
	   ->with('post', $post)
	   ->with('postSum', $postSum)
	   ->with('split', $spl)
	   ->with('run', new ChmodController);
	}

    /**
    * Function Name : getHtmltags
	* Params : $allow = null, $denied = null
    * Purpose : formats the green-red, allow-deny
	* permissions
    */			
    private function getHtmltags($allow = null, $denied = null)
    {
        if ($allow != null) 
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
	
    /**
    * Function Name : setHtmltags
	* Params : $request
    * Purpose : Assigns the htmltags values to print in green
	* -red, allow-deny permissions
    */		
    private function setHtmltags($request)
    {
        $this->read = $this->getHtmltags('Read', null);
        $this->write = $this->getHtmltags('Write', null);
        $this->execute = $this->getHtmltags('Execute', null);
        $this->noread = $this->getHtmltags(null, 'Read Denied');
        $this->nowrite = $this->getHtmltags(null, 'Write Denied');
        $this->noexecute = $this->getHtmltags(null,'Execute Denied');
    }

    /**
    * Function Name : selectPermission
	* Params : $splitn, $set, $case1, $case2, $case3, $case4, $get
    * Purpose : Reads cases from mapChmod to select the right
	* permission
    */
    private function selectPermission($splitn, $set, $case1, $case2, $case3, $case4, $get)
    {
        $splitn = $splitn;
        switch ($splitn) {
            case $case1:
            case $case2:
            case $case3:
            case $case4:
                echo $set;
                break;
            default:
                echo $get;
        }
    }

    /**
    * Function Name : mapChmod
	* Params : $start, $end, $post, $split, $postSum = null
    * Purpose : sets the mapping of permissions. 
	* For instance, if the checkbox "user, read" is checked, by default 
	* the value returns 4, as we know that 4, 5, 6 and 7 are all reading values. 
	* if instead the user enters 4 as the second value e.g. (0400) in the octal input,  
    * the selectPermission functions will handle the case and return the 
	* right value (r).
    */	
    public function mapChmod($start, $end, $post, $split, $postSum = null)
    {
		// first 9 arrays generates the first row
		// next 9 arrays generates the formatted html permissions
        $array = array (
            array('ur','r',1,'r', 4, 5, 6, 7, '-'),
            array('uw','w',1,'w', 2, 3, 6, 7, '-'),
            array('ue','x',1,'x', 1, 3, 5, 7, '-'),
            array('gr','r',2,'r', 4, 5, 6, 7, '-'),
            array('gw','w',2,'w', 2, 3, 6, 7, '-'),
            array('ge','x',2,'x', 1, 3, 5, 7, '-'),
            array('or','r',3,'r', 4, 5, 6, 7, '-'),
            array('ow','w',3,'w', 2, 3, 6, 7, '-'),
            array('oe','x',3,'x', 1, 3, 5, 7, '-'),
            array('ur',$postSum[3],1,$postSum[3], 4, 5, 6, 7, $postSum[6]),
            array('uw',$postSum[4],1,$postSum[4], 2, 3, 6, 7, $postSum[7]),
            array('ue',$postSum[5],1,$postSum[5], 1, 3, 5, 7, $postSum[8]),
            array('gr',$postSum[3],2,$postSum[3], 4, 5, 6, 7, $postSum[6]),
            array('gw',$postSum[4],2,$postSum[4], 2, 3, 6, 7, $postSum[7]),
            array('ge',$postSum[5],2,$postSum[5], 1, 3, 5, 7, $postSum[8]),
            array('or',$postSum[3],3,$postSum[3], 4, 5, 6, 7, $postSum[6]),
            array('ow',$postSum[4],3,$postSum[4], 2, 3, 6, 7, $postSum[7]),
            array('oe',$postSum[5],3,$postSum[5], 1, 3, 5, 7, $postSum[8]),
        );
        
		// if there is a post from the checkboxes, it prints accordingly  
		// otherwise uses the selectPermission function to select the correct case 
        for ($i = $start; $i <= $end; $i++)
        {
            isset($post[$array[$i][0]]) ?
            $this->send($array[$i][1]) :
            $this->selectPermission (
                $split[$array[$i][2]],
                $array[$i][3],
                $array[$i][4],
                $array[$i][5],
                $array[$i][6],
                $array[$i][7],
                $array[$i][8]
            );
        }
    }
	
    /**
    * Function Name : getSum
	* Params : $request, $read, $write, $execute
    * Purpose : performs each permission calculation (sum) for the user, group,  
    *  other or special permissions 
    */	
    private function getSum($request, $read, $write, $execute)
    {
        $read = $request->input($read);
        $write = $request->input($write);
        $execute = $request->input($execute);
        return $read + $write + $execute;
    }

    /**
    * Function Name : setSum 
	* Params : $request, checkbox inputs
	* Purpose : sets each permission sum for the user, group, other or special 
    * case permissions 
    */	
    private function setSum($request)
    {
        $this->userPermission = $this->getSum($request, 'ur','uw','ue');
        $this->groupPermission = $this->getSum($request, 'gr','gw','ge');
        $this->otherPermission = $this->getSum($request, 'or','ow','oe');
        $this->specialPermission = $this->getSum($request, 'su','sg','sb');
    }
    
	/**
    * Function Name : send 
	* Params : $set
	* Purpose : prints permissions when required
    */			
    public function send($set)
    {
        echo $set;
    }
}