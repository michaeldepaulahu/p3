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
    <div class="text-left">
        <h4>DASHBOARD</h4>
        <p class="media text-left">
            Welcome to the Developer Best Friend web portal - a central point of access to simple, core and functional web development tools.<br><i class="fa fa-sort-desc"></i>
        </p>
        <h5>LOADED COMPONENTS</h5>
            <div class="media text-left">
                <ul class="cp">
                  <li><a href="/?start=57&amp;end=90">Lorem Ipsum Generator</a></li>
                  <li><a href="/?start=108&amp;end=188">Profile Maker</a></li>
                  <li><a href="/?start=189&amp;end=257">Chmod Cruncher</a></li>
                  <li><a href="/?start=258&amp;end=437">XKCD Password Generator</a></li>
                </ul> 
            </div>
      </div>
@stop

@section('nav-slave')
    <div id="nav-slave" class="text-center hidden-xs hidden-sm">
        <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
        <p class="lead">
            Speed-up the development of your website with the Best Friend Developer tools.
        </p>
        <br>
        <div class="video">
            <iframe width="420" src="http://www.youtube.com/embed/yEDVJR_ptrE?rel=0&amp;start=<?php if (isset($_GET['start'])) echo $_GET['start']; else { $auto = 0; echo 0; } ?>&amp;end=<?php if (isset($_GET['end'])) echo  $_GET['end']; else { echo 437; } ?>&amp;autoplay={!! $auto or 1  !!}" allowfullscreen></iframe> 
        </div>
    </div>  
    <div id="nav-slave1" class="text-center hidden-md hidden-lg">
        <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
        <p class="lead lead_mobile">
            Speed-up the development of your website with the Best Friend Developer tools.
        </p>
        <div class="intro-img">
            <a href="https://www.youtube.com/watch?v=yEDVJR_ptrE"><img class="img-responsive text-center" src="{{ asset('img/thumb.jpg') }}" alt="home intro"></a><br>
        </div>
    </div>  
@stop