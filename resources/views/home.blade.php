@extends('layouts.master')

@section('title')
    Dashboard - Home
@stop

@section('thumb2-main')
    thumb2-main
@stop

@section('nav-fa')
    <a href="/"><i id="nav-1" class="fa fa-bars fa-3x"></i></a><br>
    <span class="nav-title">Dahsboard</span><br>
    <a href="/loremipsum"><i id="nav-2" class="fa fa-file-code-o fa-3x"></i></a><br>
    <span class="nav-title">Lorem Ipsum Generator</span><br>
    <a href="/profile"><i id="nav-3" class="fa fa-dot-circle-o fa-3x"></i></a><br>
    <span class="nav-title">Profile Maker</span><br>
    <a href="/chmod"><i id="nav-4" class="fa  fa-tags fa-3x"></i></a><br>
    <span class="nav-title">chmod cruncher</span><br>
    <a href="/xkcd"><i id="nav-5" class="fa  fa-cogs fa-3x"></i></a><br>
    <span class="nav-title">xkcd password generator</span><br>
@stop

@section('nav-menu')
    <div id="dashboard" class="text-left">
        <h4>DASHBOARD</h4>
        <p class="media text-left">
            Welcome to the Developer Best Friend web portal - a central point of access to simple, core and functional web development tools.<br><i class="fa fa-sort-desc"></i>
        </p>
        <h5>LOADED COMPONENTS</h5>
            <div class="media text-left">
                <ul class="cp">
                  <li><a href="/?start=57&end=90">Lorem Ipsum Generator</a></li>
                  <li><a href="/?start=108&end=188">Profile Maker</a></li>
                  <li><a href="/?start=189&end=257">Chmod Cruncher</a></li>
                  <li><a href="/?start=258&end=437">XKCD Password Generator</a></li>
                </ul> 
            </div>
      </div>
@stop

@section('nav-slave1')
    <div class="text-center">
        <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
        <p class="lead">
            Speed-up the development of your website with the Best Friend Developer tools.
        </p>
        <p>
            <div class="video">
                    <iframe width="420" src="http://www.youtube.com/embed/yEDVJR_ptrE?rel=0&start=
			    	<?php 
				    // retrieves video positioning
    				if (isset($_GET['start']))
	    				echo $_GET['start'];
		    		else { 
			    		$auto = 0; 
				    	echo 0; 
    				} 
	    			?>&end=
		    		<?php 
			    	if (isset($_GET['end']))
    					echo  $_GET['end'];  
	    			else {
		    			echo 437; 
			    	}
				    ?>&autoplay={!! $auto or 1  !!}" frameborder="0" allowfullscreen></iframe>  
            </div> 
        </p>
    </div>  
@stop

@section('nav-slave2')
    <div class="text-center">
        <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
        <p class="lead lead_mobile">
            Speed-up the development of your website with the Best Friend Developer tools.
        </p>
        <p>
            <img class="img-responsive" src="{{ asset('img/thumb.jpg') }}" alt="home intro">
        </p>
    </div>  
@stop