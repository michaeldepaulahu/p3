<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title','Developer Best Friend')</title>
<meta charset="utf-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="dehashed password generator">
<meta name="keywords" content="dehashed, password, generator">
<meta name="author" content="michaeldepaula">
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css"> 
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
<!--JS-->
<script src="{{ asset('js/jquery-1.11.3.min.js') }} "></script>
<script src="{{ asset('js/custom.js') }} "></script>
<script src="{{ asset('js/p2-custom.js') }} "></script>
</head>
    <body>
        <div class="container-fluid">
            <div class="thumb1"> 
                <div class="row text-center">
                    <div class="col-md-12">
                        <img src="{{ asset('img/logo.png') }}" width="299" height="96" alt="Developer Best Friend Logo"/> 
                    </div> 
                </div>
            </div>
            <div class="@yield('thumb2-main')">
                <div class="thumb2"> 
                    <div class="row">
                        <div class="col-lg-12 nav-fa-container">
                            <div class="row">
                                <div class="col-md-3 col-md-2 nav-left hidden-sm hidden-xs">
                                    <div class="nav-fa">
                                        @yield('nav-fa')
                                    </div>                              
                                </div>                            
                                <div class="col-md-3 col-md-2 nav-left1 hidden-md hidden-lg">
                                    <div class="nav-fa1">
                                        <nav class="navbar navbar-inverse">
                                          <div class="container-fluid">
                                            <div class="navbar-header">
                                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                              </button>
                                              <a class="navbar-brand" href="#">Dashboard</a>
                                            </div>
                                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                              <ul class="nav navbar-nav">
                                                <li class="active"><a href="/">Dashboard <span class="sr-only">(current)</span></a></li>
                                                <li><a href="/loremipsum">Lorem Ipsum</a></li>
                                                <li><a href="/profile">Profile Maker</a></li>
                                                <li><a href="/chmod">CHMOD Cruncher</a></li>
                                                <li><a href="/xkcd">XKCD Generator</a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </nav>
                                    </div>                              
                                </div>
                                <div class="col-xs-12 col-md-3 col-lg-3 nav-middle">
                                	<div class="nav-menu">
                                        @yield('nav-menu')
                                    </div>
                                </div>                                
                                <div class="col-xs-12 col-md-6 col-lg-7 nav-right">
                                	<div class="nav-slave">
                                        @yield('nav-slave')                                       
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/bootstrap.min.js') }} "></script>      
    </body>
</html>