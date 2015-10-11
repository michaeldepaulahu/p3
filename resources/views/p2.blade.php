<!DOCTYPE html>
<html lang="en">
<head>
<title>P2 - XKCD Password Generator</title>
<meta charset="utf-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="dehashed password generator">
<meta name="keywords" content="dehashed, password, generator">
<meta name="author" content="michaeldepaula">
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="{{ asset('css/p2-style.css') }}">
<link href='https://fonts.googleapis.com/css?family=Special+Elite|Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
<!--JS-->
<script src="{{ asset('js/jquery-1.11.3.min.js') }} "></script>
<script src="{{ asset('js/custom.js') }} "></script>
</head>
<body>
    <div class="container-fluid">     
        <!--header-->
        <header>
            <div class="row thumb1 text-center">
                <div class="col-lg-12 hidden-xs">
                    <p class="title">xkcd Password Generator</p>
						<form method='POST' action='/xkcd' class="form-inline hidden-xs">
	                        {!! Form::token() !!}
							<?php include(app_path().'/includes/process.php'); ?>
                        </form>
                        <div class="status_info">
                			<img src="{{ asset('img/off.png') }}" alt="Offline"> Offline dictionary - 500 words | 
                            <img src="{{ asset('img/on.png') }}" alt="Online"> Online dictionary - 3000 words
                        </div>
		          </div>
            <!--Mobile Navigation-->
            <nav class="navbar navbar-default visible-xs">
                <div class="container-fluid">
                    <!-- Control -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile1" aria-expanded="false">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">xkcd Password Generator</a>
                    </div>
                    <!-- Menu -->
                    <div class="collapse navbar-collapse" id="mobile1">
                        <div class="nav navbar-nav">
							<form method='POST' action='/xkcd' class="form-mobile visible-xs">
                            {!! Form::token() !!}
								<?php include(app_path().'/includes/process1.php'); ?>
                        	</form>
                            <div class="status_info">
                                <img src="{{ asset('img/off.png') }}" alt="Offline"> Offline dictionary - 500 words<br> 
                                <img src="{{ asset('img/on.png') }}" alt="Online"> Online dictionary - 3000 words
                            </div>                            
                        </div>
                    </div>
                </div>
            </nav>
            <!--End Mobile Navigation-->        
            </div>
		</header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 main">
                <div class="generate text-center">{{ $display }}</div>
                <div class="text-center" id="anim"><img src="img/{{ rand(1,13) }}.png" alt="xkcd"></div>
                <div id="anim1" class="animate text-center"></div>
                <div class="animate text-center status">{{ $status }}</div>
            </div>
        </div>  
        <div class="row thumb2">
            <div class="col-xs-12 col-sm-12 col-md-12s">
            <h2>XKCD Password Generator</h2>
				This password generator, inspired by the <a href="http://xkcd.com/936/">XKCD webcomic</a>, allows for auto-generation of highly secure passwords by employing randomization of a mix of letters, numbers and special characters attributes. By using such schema, it increases the password strengths exhausting guesses and attempts against sophisticated and systematic searches, such as brute-force attacks. 
             <h2>Features</h2>
             <ul>   
                <li>Randomization</li>
                <li>Entropy up to +- 300 bits</li>
                <li>Numbers and Special Characters inclusion</li>
                <li>Case selection</li>
                <li>Up to 9 words selection providing lengths up to +- 70 chars</li>
                <li>500 random words in offline mode</li>
                <li>3000 random words in online mode</li>
                <li>Mobile/Tablet Friendly</li>
			</ul>
			<h2>Generating Passwords</h2>
			<p>The generator allows for entering any number from 1 to 9 at a time. Next the generator gives the option to include a number, a symbol and to format each word to a special case, First letter uppercase or all letters uppercase. 
Please keep in mind that the password strength level of the user-defined password increases according to the number of definitions added to the password string.</p>
			<p>For instance, to create a password with entropy as high as 300 bits, select 9 words, and enter as many options as possible to the definition.  A much weaker password will increase the chance for a malicious attack (i.e. selecting “2 words” and  including just "a number" to the definition).</p>
			<p>Another interesting feature with the password generator is that it runs as offline and online mode. Offline dictionary offers up to 500 words versus the online mode which offers up to 3000 words to select from. 
The online mode selects the words from an external server, which may be up running constantly, but occasionally the server may go down for maintenance or any other reason, in this case, the offline mode will simply take over. This assures dictionary availability at all times.</p>
            		
            </div>
        </div>               
	</div>
 <!--footer-->
    <footer>
        <div class="container footer">
            <div class="row">
                <div class="col-md-8">
                    <p><strong>&copy; 2015 Dehashed.com</strong></p>
                </div>
                <div class="col-md-4">
                    <p><strong>XKCD Webcomics</strong></p>
                    <ul>
                        <li><a href="http://xkcd.com/936/">Inspired by XKCD Password Strength Webcomic</a></li>
                        <li><a href="https://en.wikipedia.org/wiki/Xkcd">More about XKCD</a></li>
                    </ul>
                </div>
                </div>
            </div>   
    </footer>
   	<!--end footer-->     
    <script src="js/bootstrap.min.js"></script>
</body>
</html>