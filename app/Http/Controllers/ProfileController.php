<?php

namespace Developerbf\Http\Controllers;

use Illuminate\Http\Request;
use Developerbf\Http\Requests;
use Developerbf\Http\Controllers\Controller;
use Developerbf\lib\Xkcd;

class ProfileController extends Controller
{	
	public $profile = array();
	public $track = array();
	public $name = array();
	public $email = array();
	public $track_name = array(); 
	public $track_email = array(); 	
	public $track_date = array();  
	public $track_id = array(); 
	const LISTS = 10;
	const MAXLIST = 10;

	
	function __construct() 
	{
		$this->autoCreateList();
		
		// this controls how many items to display
		//$this->showRandom(3);
		//$this->display();
		//$this->displayJSON();
   	}


	/**
    * Responds to requests to GET /profile
	* shows the profile view page 
    */	
    public function showProfile() {
		return view('profile')->with('profile', new ProfileController);			
    }
	
	public function postProfile(Request $request) {
 	   $text = $request->input('text');
	   $type = $request->input('type');
	   $post = array($text, $type); 
	   return view('profile')->with('profile', new ProfileController)->with('post', $post);	
	   //return 'Process adding new book: '.$title;
	}	
	
	/**
	* It auto-generates a list of profiles loading the list
	* for initial use. List is loaded in the profile array. 
	*/	
	public function autoCreateList()
	{
		// includes and assigns required lists for name and email items
		include $this->getFile('lists.php'); 

		$this->name = $list_name;

		$this->email = $list_email;

		// builds the profile list up to the size of LISTS
		for ($i = 0; $i<=self::LISTS; $i++)
		{
			// randomly generate salts, passwords from the XKCD app
			// names, emails, birthdays, IDs and hashes
			$salt = $this->salt();
			
			$xkcd =  $this->Xkcd();
			
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

			// pushes the element to the profile list
			array_push($this->profile, $array);
		}				
	}

	/**
	* It generates each unique value for the name, email, birthday and id keys, 
	* and add these values to each corresponding track array, so the 
	* autoCreateList method can use these values to generate the end profile list
	*/	
	public function doRandom($min = NULL, $key = NULL, &$track, $wc = NULL, $date = NULL)
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
		}
		else
		{
			// pushes item  in the tracking array
			array_push($track,$array);
		}				
	}

	/**
	* It generates each unique value for creating the salt using mcrypt_create_iv
	* add these values to the corresponding track array, so the autoCreateList
	* method can use these values to generate the end profile list
	*/	
	public function salt()
	{
		$salt = base64_encode(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM));	
		return $salt;
	}

	/**
	* It uses the XKCD tool to generates each unique password value and 
	* add the value to the corresponding track array, so the autoCreateList
	* method can use these values to generate the end profile list
	*/	
	public function Xkcd()
	{
		// mimics the the $_POST from XKCD form
		$_POST['words'] = 2;
		$_POST['checkbox'] = "on";
		$_POST['firstcase'] = "on";
		$_POST['delimiter'] = "-";

		// returns the XKCD password 
		$custom = new Xkcd('words');
		return $custom->display();
	}		
	
	/**
	* Pre-selects the items from the profule list based on the 
	* input from the user and loads into the profile track array. 
	*/			
	public function showRandom($param)
	{			
		// validates user input 
		if ($param <= self::MAXLIST)
		{	
			for ($j=0; $j < $param; $j++)
			{
				$rand = rand(0,sizeof($this->profile)-1);

				// ensures item is unique in the tracking array		
				if (in_array($this->profile[$rand], $this->track))
				{
					$j--;
				}
				else
				{
					// pushes item  in the tracking array						
					array_push($this->track,$this->profile[$rand]);
				}				
			}
		}
	}		

	/**
	* Displays/Prints profile list 
	*/		
	public function display()
	{
		
		foreach ($this->track as $value) {
   			echo $value['id']  . "\n";
			echo $value['email'] . "\n";			
			echo $value['birthday'] . "\n";
			echo $value['name']  . "\n";
			echo $value['user'] . "\n";
			echo $value['password'] . "\n";
			echo $value['salt'] . "\n";
			echo $value['hash'] . "\n";
			echo $value['img'] . "\n";
			echo "\n\n";
		}	
	}
	
	/**
	* Displays/Prints profile list JSON 
	*/		
	public function displayJSON()
	{
		$json = json_encode($this->track, JSON_PRETTY_PRINT |  256 | 16 |JSON_UNESCAPED_SLASHES);
		//echo "<pre>" . $json . "</pre>";		
		echo $json;		
	}

	/**
	* includes external files 
	*/		
	public function getFile($file)
	{
		$path = app_path().'/includes/' . $file;
		return $path; 
	}		
}
