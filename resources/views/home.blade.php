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
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<!--JS-->
<script src="{{ asset('js/jquery-1.11.3.min.js') }} "></script>
<script src="{{ asset('js/custom.js') }} "></script>
</head>
    <body>
        <div class="container-fluid">
            <div class="thumb1"> 
                <div class="row text-center">
                    <div class="col-md-12">
                   		<img src="{{ asset('img/logo.png') }}" width="299" height="96" alt=""/> 
                    </div> 
                </div>
            </div>
            <div class="thumb2-main">
                <div class="thumb2"> 
                    <div class="row">
                        <div class="col-md-12 nav-fa-container">
                            <div class="row">
                                <div class="col-md-2 nav-left">
                                    <div class="nav-fa">
                                        <i id="nav-1" class="fa fa-bars fa-3x"></i><br>
                                        <span class="nav-title">Dahsboard</span><br>
                                        <i id="nav-2" class="fa fa-file-code-o fa-3x"></i><br>
                                        <span class="nav-title">Lorem Ipsum Generator</span><br>
                                        <i id="nav-3" class="fa  fa-dot-circle-o fa-3x"></i><br>
                                        <span class="nav-title">Profile Maker</span><br>
                                        <i id="nav-4" class="fa  fa-tags fa-3x"></i><br>
                                        <span class="nav-title">chmod cruncher</span><br>
                                        <i id="nav-5" class="fa  fa-cogs fa-3x"></i><br>
                                        <span class="nav-title">xkcd password generator</span><br>
                                    </div>                              
                                </div>
                                <div class="col-md-3 nav-middle">
                                	<div class="nav-menu">
                                    	 <div id="dashboard" class="text-left hidden ">
                                             <h4>DASHBOARD</h4>
                                                <p class="media text-left">Welcome to the Developer Best Friend web portal - a central point of access to simple, core and functional web development tools.<br><i class="fa fa-sort-desc"></i> 
                                                </p>
                                             <h5>LOADED COMPONENTS</h5>
                                                <p class="media text-left">
                                                    <ul class="cp">
                                                      <li><a href="">Lorem Ipsum Generator</a></li>
                                                      <li><a href="">Profile Maker</a></li>
                                                      <li><a href="">Chmod Cruncher</a></li>
                                                      <li><a href="">XKCD Password Generator</a></li>
                                                    </ul> 
                                                </p>
                                          </div>
                                         <div id="text_generator" class="">
                                             <h4>TEXT GENERATOR</h4>
                                              <form action="/generator">
                                              <div class="form-group text-left">
                                                <label>How many paragraphs do you want?</label>
                                                <input type="text" class="form-control" name="text" placeholder="number of paragraphs"><br>											<button type="submit" class="btn btn-default">Generate</button>
                                              </div>
                                              </form>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-7 nav-right">
                                	<div class="nav-slave">
                                          <div class="text-center">
                                            <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
                                            <p class="lead">Speed-up the development of your website with the Best Friend Developer tools.</p>
                                            <p>
                                            	<img src="{{ asset('img/video.jpg') }}" width="620" height="315" alt=""/> 
                                            </p>
                                          </div>                                    
                                    </div>                                
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
 <!--footer-->
    <footer>
        <div class="container footer">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>&copy; 2015 Dehashed.com</strong></p>
                </div>
            </div>   
    </footer>
   	<!--end footer-->     
    <script src=" {{ asset(' js/bootstrap.min.js') }}"></script>        
    </body>
</html>