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
                  <li><a href="/home/57/90/">Lorem Ipsum Generator</a></li>
                  <li><a href="">Profile Maker</a></li>
                  <li><a href="">Chmod Cruncher</a></li>
                  <li><a href="">XKCD Password Generator</a></li>
                </ul> 
            </div>
      </div>
@stop

@section('nav-slave')
    <div class="text-center">
        <h1 class="intro">Boost Productivity and Build like a Pro.</h1>
        <p class="lead">
            Speed-up the development of your website with the Best Friend Developer tools.
        </p>
        <p>
<iframe width="620" height="290" src="http://www.youtube.com/embed/SMIqux_jN6c?rel=0&start=258&end=272&autoplay=0" frameborder="0" allowfullscreen></iframe>
        </p>
    </div>  
@stop