<?php
/**
* Profile Generator
* 
* Description:
* This file contains the logic of the Profile Generator web application. 
* The Profile generator randomly creates a number of 
* user profiles constructued for the purpose of promptly facilitating
* and generating dummy user profiles during web development.  
*
* Author: Michael Depaula
* Copyright: (c) Michael Depaula
*
*/
namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

/**
* ProfileController class
*
* This class contains the general logic of the Profile Generator.
*
*/
class ProfileController extends Controller
{	
    /**
    * User profiles lists are generated on the fly, so no
    * actual list is pre-generated. The declared empty arrays will
    * hold the generated values. 
    */
    const LISTS = 30;
    const MAXLIST = 30;
    public $profile = array();
    public $track = array();
    public $name = array();
    public $email = array();
    public $track_name = array(); 
    public $track_email = array(); 	
    public $track_date = array();  
    public $track_id = array(); 

    /**
    * Function Name : __construc
    *	
    * Purpose : Initiates the list
    * Function call : autoCreateList()
    * Returns: 
    * an array list of size n, 
    * as specified by the user
    */	
    function __construct() 
    {
        $this->autoCreateList();
    }
	
    /**
    * Function Name : showProfile
    *
    * Route : Responds to requests to GET /profile
    * Purpose : shows the profile view page 
    * Returns : profile view, sends the controller to view 
    */	
    public function showProfile() 
    {
        return view('profile')->with('profile', new ProfileController);			
    }

    /**
    * Function Name : postProfile
    *	
    * Params : Request $request
    * Route : Responds to requests to POST /profile
    * Purpose : shows the profile view page 
    * Returns : 
    * n users to generate - text
    */	
    public function postProfile(Request $request) 
    {
        // performs  input validation  
        $this->validate($request, [
            'text'  => 'numeric|integer|max:30'
        ]);

        $text = $request->input('text');

        $post = array($text); 
        return view('profile')
            ->with('profile', new ProfileController)
            ->with('post', $post);	
    }	

    /**
    * Function Name : autoCreateList
    *	
    * Purpose : it auto-generates a list of profiles loading the list
    * for initial use. List is loaded in the profile array. 
    * Returns : profile array containing a list of useful 
    * random user profiles
    */		
    private function autoCreateList()
    {
        // includes and assigns required lists for name and email items
        include $this->getFile('lists.php'); 

        $this->name = $list_name;

        $this->email = $list_email;

        // builds the profile list up to the size of LISTS
        for ($i = 0; $i<=self::LISTS; $i++)
        {
            // randomly generate salts, names, emails, birthdays, 
            // IDs and hashes - passwords are generated using the the XKCD app
            $salt = $this->salt();
			
            $xkcd =  $this->xkcd();
			
            $this->doRandom(0, $this->name, $this->track_name);	
			
            $this->doRandom(0, $this->email, $this->track_email);
			
            $this->doRandom(NULL, NULL, $this->track_date, 1, 1);
			
            $this->doRandom(10000000, 99999999, $this->track_id, 1);
			
            $hash = hash('sha256',$salt.$xkcd); 
			
            // builds the list element
            $array = array(
                'id' => $this->track_id[$i],
                'name' => $this->track_name[$i],
                'birthday' => $this->track_date[$i],
                'email' => $this->track_email[$i],
                'salt' => $salt, 
                'password' => $xkcd, 
                'hash' => $hash,
                'img' => str_replace(" ","%20",$this->track_name[$i].".jpg"),
                'user' => str_replace(" ","",$this->track_name[$i])			
            );

            // pushes the element into the profile array
            array_push($this->profile, $array);
        }				
    }

    /**
    * Function Name : doRandom
    *	
    * Params : $min, $key, &$track, $wc, $date
    * $min - min size to random, 
    * $key - max size or total size of array
    * $track - corresponding array to hold values (i.e name, email, birthday)
    * $wc - required only if no list is available
    * $date - required to flag the method to generate a date
    * 
    * Purpose : it generates each unique value for the name, email, birthday  
    * and id keys, and add these values to each corresponding track array, so the 
    * autoCreateList method can use these values to generate the end profile list
    */	
    private function doRandom($min = NULL, $key = NULL, &$track, $wc = NULL, $date = NULL)
    {
        // sets date variables
        // returning birthdays between 13 and  50, one year = 3153600
        $current = strtotime(date("m/d/Y"));
        $age_min = ($current - 409968000);
        $age_max = ($current - 1576800000); 
		
        // checks if wordcount is necessary
        is_null($wc) ? $max=sizeof($key)-1: $max = $key; 
		
        // checks if method is being used to generate dates				
        is_null($date) ? $rand = rand($min,$max) : $rand = date("m/d/Y",rand($age_min, $age_max)); 
		
        // attaches the correct rand variable 
        is_null($wc) ? $array = $key[$rand] : $array = $rand; 
		
        // ensures item is unique in the tracking array
        if (in_array($array, $track))
        {
            $this->doRandom($min, $key, $track, $wc, $date);
        } else {
            // pushes item  in the corresponding tracking array
            array_push($track,$array);
        }				
    }

    /**
    * Function Name : salt
    * 
    * Purpose : it generates each unique value for creating the salt 
    * using mcrypt_create_iv add these values to the corresponding track array, 
    * so the autoCreateList method can use these values to generate the end profile list
    */	
    private function salt()
    {
        $salt = base64_encode(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM));	
        return $salt;
    }

    /**
    * Function Name : Xkcd
    * 
    * Purpose : it uses the XKCD tool to generates each unique password value and 
    * add the value to the corresponding track array, so the autoCreateList
    * method can use these values to generate the end profile list
    */	
    private function xkcd()
    {
        // similates the the $_POST from XKCD form
        $_POST['words'] = 2;
        $_POST['checkbox'] = "on";
        $_POST['firstcase'] = "on";
        $_POST['delimiter'] = "-";

        // returns the XKCD password 
        $custom = new xkcd('words');
        return $custom->display();
    }		

    /**
    * Function Name : showRandom
    * 
    * Purpose : pre-selects the items from the profile list based on the 
    * input from the user and loads into the profile track array. 
    */			
    public function showRandom($param)
    {			
        // enforces rule for the max size of users
        if ($param <= self::MAXLIST)
        {	
            for ($j=0; $j < $param; $j++)
            {
                $rand = rand(0,sizeof($this->profile)-1);

                // ensures item is unique in the tracking array		
                if (in_array($this->profile[$rand], $this->track))
                {
                    $j--;
                } else {
                    // pushes item  in the tracking array						
                    array_push($this->track,$this->profile[$rand]);
                }				
            }
        }
    }		

    /**
    * Function Name : display
    * 
    * Purpose : prints the n users 
    */		
    public function display()
    {
        foreach ($this->track as $value) {
            echo 'id : ' . $value['id']  . "\n";
            echo 'email : ' . $value['email'] . "\n";			
            echo 'birthday : ' . $value['birthday'] . "\n";
            echo 'name : ' . $value['name']  . "\n";
            echo 'user : ' .  $value['user'] . "\n";
            echo 'password : ' . $value['password'] . "\n";
            echo 'salt : ' . $value['salt'] . "\n";
            echo 'hash : ' . $value['hash'] . "\n";
            echo 'img : ' . $value['img'] . "\n";
            echo "\n\n";
        }
    }
	
    /**
    * Function Name : displayJson
    * 
    * Purpose : displays/prints profile list 
    * JSON format
    */		
    public function displayJson()
    {
        $json = json_encode($this->track, JSON_PRETTY_PRINT |  256 | 16 |JSON_UNESCAPED_SLASHES);
        echo $json;		
    }

    /**
    * Function Name : displayCsv
    * 
    * Purpose : displays/prints profile list 
    * CSV format as comma delimited
    */		
    public function displayCsv()
    {
        // comma delimited headers
        echo 'id,email,birthday,name,user,password,salt,hash,img' . "\n";
        foreach ($this->track as $value) {
            echo $value['id']  . ",";
            echo $value['email'] . ",";			
            echo $value['birthday'] . ",";
            echo $value['name']  . ",";
            echo $value['user'] . ",";
            echo $value['password'] . ",";
            echo $value['salt'] . ",";
            echo $value['hash'] . ",";
            echo $value['img'];
            echo "\n";
        }
    }

    /**
    * Function Name : getFile
    * 
    * Purpose : includes external files
    */		
    public function getFile($file)
    {
        $path = app_path().'/includes/' . $file;
        return $path; 
    }		
}