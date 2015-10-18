<?php

namespace Developerbf\lib;

class Xkcd
{		

	public $words = array();
	public $track = array(); 
	public $password; 
	public $word_status; 
		
	public function __construct($n_word)
	{
		// retieves words and builds dicionary
		$this->glossary(); 
		
		// randomize the words by building an array of selected numbers
		$this->rendword($this->checkfield($n_word)); 

		// initialize a sesstion to hold off n value
		if (!isset($_SESSION)) 
		{
  			session_start();	
		}
	}
	
	//	DISPLAY FUNCTION
	//	Generates the final formatted password	
	public function display()
	{
		// renders the words
		$fmt_words = $this->show_numbers(); 
		
		// renders numbers
		$fmt_numbers = 
		$this->show(
		$this->numbers(
		$this->checkbox('checkbox')
		));
		
		// renders symbols
		$fmt_symbols =			
		$this->show(
		$this->char(
		$this->checkbox('symbols')
		));	
		
		return $fmt_words . $fmt_numbers . $fmt_symbols;
		
	}
		
	//	GLOSSARY FUNCTION
	//	Retrieves words from external server, or local to build dictonary
	public function glossary()
	{
		// checks if external server is live running
		/*$fp = @fsockopen("www.paulnoll.com", 80, $errno, $errstr,3);
		if (is_resource($fp))
		{
			// retrieve random page from live server, generates online message
			$file = file_get_contents($this->rand_pages());
			fclose($fp);
			$this->word_status = "Generator Status: Online (rendering from 3000 words)";
		}	
		else
		{*/
			// server offline, retrieves locally, generates offline message
			$file = file_get_contents(app_path().'/includes/short.txt');
			$this->word_status = "Generator Status: Offline (rendering from 500 words)"; 

		//}			
		
		// converts page to source code
		$htmlfile = htmlentities($file);
		
		// retrieve <li> patterns
		$pattern = htmlspecialchars("<li>[A-Za-z\s]*<\/li>", ENT_QUOTES);
		preg_match_all("/$pattern/", $htmlfile, $read);
		
		// remove <li> patterns, builds glossary
		$pattern_r = htmlspecialchars("<li>\s+|\s+<\/li>", ENT_QUOTES);
		foreach ($read[0] as $value)
		{
			array_push($this->words,preg_replace("/$pattern_r/", '', $value,-1)); 
		}			
	}

	//	WORD GENERATE FUNCTION
	//	select each word and adds to a track list
	public function rendword($param)
	{				
		// validates number 
		if ($param <= 9)
		{	

			$this->word = $param;
			
			for ($j=0; $j < $this->word; $j++)
			{
				$rand = rand(0,$this->wordcount()-1);
				
				if (in_array($rand, $this->track))
				{
					$j--;
				}
				else
				{
					array_push($this->track,$rand);
				}				
			}
		}
	}

	//	NUMBER GENERATE FUNCTION
	//	randomly selects numbers from 0-9	
	public function numbers($param)
	{
		$numbers = $param == "on" ? rand(0,9) : ""; 	
		return $numbers; 
	}

	//	SYMBOLS GENERATE FUNCTION
	//	randomly selects special characters 	
	public function char($param)
	{	
		if ($param == "on")
		{
			$char = chr(rand(33,126));
			$chr = preg_match("/^[\'\"@a-zA-Z0-9]*$/",$char) ? $this->char($param) : $char;
			return $chr;
		}
	}	
	
	//	FORMATTING FUNCTION
	//	formats the word for special cases and delimiters
	public function generate($param, $delimiter)
	{
		// validates symbols 
		if (preg_match("/[\$_!~,|:;@#\-]/",$delimiter) == 1 || $delimiter == "")
		{
			// formats and adds delimiter
			if ($this->checkbox('uppercase') == "on")
			{ 
				return strtoupper($param.$delimiter);
			}
			else if ($this->checkbox('firstcase') == "on")
			{ 
				return  ucfirst($param.$delimiter);
			}
			else
			{ 
				return  $param.$delimiter;
			}	
		}
		else
		{
				return  $param;
		}
	}		
	
	//	RANDOM SELECT FUNCTION
	//	ramdonly selects pages from live server
	function rand_pages()
	{
		$rando = rand(1,30);
		$url = "http://www.paulnoll.com/Books/Clear-English/words-%02d-%02d-hundred.html";
		
		if ($rando % 2 == 0)
		{
			$rand_pages = sprintf($url, $rando-1, $rando);	
			return $rand_pages;
		} 
		else 
		{
			$rand_pages = sprintf($url, $rando, $rando+1);	
			return $rand_pages;
		}
	}
	
	//	DELIMITER FUNCTION
	//	adds the delimiter (separator)	
	function show_numbers()
	{	
		$format_words = ""; 
		for ($j=0; $j < sizeof($this->track); $j++)
		{
			$j ==  sizeof($this->track)-1 ? $delimiter = "" : $delimiter = 
			$this->checkfield('delimiter');	
			$format_words .=  $this->generate( $this->words[$this->track[$j]], $delimiter);	 
		}
		return $format_words;
	}
	
	//	CHECK POST FUNCTION
	//	error-check post values
	function checkfield($param)
	{
		if (isset($_POST[$param]))
		{
			return $_POST[$param];
		}
	}

	//	CHECKBOX POST FUNCTION
	//	error-check checkbox value, creates on and off values
	function checkbox($param)
	{
		foreach ($_POST as $value)
		{
			if (isset($_POST[$param]))
			{
				return $_POST[$param];
			}
			else
			{
				$_POST[$param] = "off"; 
				return $_POST[$param];
			}
		}
	}
	
	//	SESSION N FUNCTION
	//	Holds number of words input value
	public function session($sessionId, $n_word)
	{
		 $_SESSION[$sessionId] = $this->checkfield($n_word);	
	}
		
	//	SHOW FUNCTION
	//	echos password attributes	
	function show($post)
	{
		return $post;  	
	}
	
	//	COUNT FUNCTION
	//	returns dictionary count
	public function wordcount()
	{
		return count($this->words); 
	}
}
?>