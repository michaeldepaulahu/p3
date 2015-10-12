<!DOCTYPE html>
<html lang="en">
<head>
<title>P3</title>
<meta charset="utf-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="dehashed password generator">
<meta name="keywords" content="dehashed, password, generator">
<meta name="author" content="michaeldepaula">
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <p class="title">Developer Best Friend</p>
                        <div class="status_info">

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

            </div>
        </div>  
        <div class="row thumb2">
            <div class="col-xs-12 col-sm-12 col-md-12s">
            		
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