@extends('layouts.master')

@section('title')
    Dashboard - Home
@stop

@section('thumb2-main')
	thumb2-main
@stop

@section('nav-fa')
    <a href="/home"><i id="nav-1" class="fa fa-bars fa-3x"></i></a><br>
    <span class="nav-title">Dahsboard</span><br>
	<a href="/generator"><i id="nav-2" class="fa fa-file-code-o fa-3x"></i></a><br>
    <span class="nav-title">Lorem Ipsum Generator</span><br>
    <i id="nav-3" class="fa  fa-dot-circle-o fa-3x"></i><br>
    <span class="nav-title">Profile Maker</span><br>
    <i id="nav-4" class="fa  fa-tags fa-3x"></i><br>
    <span class="nav-title">chmod cruncher</span><br>
    <i id="nav-5" class="fa  fa-cogs fa-3x"></i><br>
    <span class="nav-title">xkcd password generator</span><br>
@stop


@section('nav-menu')
 <div id="dashboard" class="text-left">
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
@stop


@section('nav-slave')
  <div class="text-center">
    <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
    <p class="lead">Speed-up the development of your website with the Best Friend Developer tools.</p>
    <p>
        <img src="{{ asset('img/video.jpg') }}" width="620" height="315" alt=""/> 
    </p>
  </div>  
@stop