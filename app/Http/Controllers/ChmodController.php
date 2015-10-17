<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;

class ChmodController extends Controller
{
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

    public function showChmod(Request $request)
    {
        $spl = array(0,0,0,0);

        $post = $request->all();

        $this->setSum($request);

        $this->setHtmltags($request);

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

        return view('chmod')
		->with('post', $post)
        ->with('postSum', $postSum)
        ->with('split', $spl)
        ->with('run', new ChmodController);
    }

    public function postChmod(Request $request)
    {
    // validation 
        $this->validate($request, [
            'text'  => 'numeric|digits:4|max:7777'
        ]);

        $text = $request->input('text');
        $spl = str_split($text);

        $post = $request->all();

        $this->setSum($request);

        $this->setHtmltags($request);

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
	   
	   return view('chmod')
	   ->with('post', $post)
	   ->with('postSum', $postSum)
	   ->with('split', $spl)
	   ->with('run', new ChmodController);
	}

    /**
    *  reads read, write, execute inputs and calculates the sum 
    *  of the permissions, then returns the permission result
    */	
    private function getSum($request, $read, $write, $execute)
    {
        $read = $request->input($read);
        $write = $request->input($write);
        $execute = $request->input($execute);
        return $read + $write + $execute;
    }

    /**
    *  defines and sets the user, group, other and special
    *   permissions 
    */	
    private function setSum($request)
    {
        $this->userPermission = $this->getSum($request, 'ur','uw','ue');
        $this->groupPermission = $this->getSum($request, 'gr','gw','ge');
        $this->otherPermission = $this->getSum($request, 'or','ow','oe');
        $this->specialPermission = $this->getSum($request, 'su','sg','sb');
    }
	
    /**
    * Formats the tags  returning allowing and denying permissions
    *  
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
    * Handles the text input printing
    *  
    */
    private function showPermission($splitn, $set, $case1, $case2, $case3, $case4, $get)
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
    * Carries the mission of returning the several seetings in CHMOD
    *  
    */	
    public function mapChmod($start, $end, $post, $split, $postSum = null)
    {
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

        for ($i = $start; $i <= $end; $i++)
        {
            isset($post[$array[$i][0]]) ?
            $this->send($array[$i][1]) :
            $this->showPermission (
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
	
    public function send($set)
    {
        echo $set;
    }
}