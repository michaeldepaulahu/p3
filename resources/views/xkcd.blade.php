@extends('layouts.master')

@section('title')
    XKCD Password Generator
@stop

@section('thumb2-main')
    thumb2-main4
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
    <a href="/xkcd"><i id="nav-5" class="fa  fa-cogs fa-3x fa-active"></i></a><br>
    <span class="nav-title">xkcd password generator</span><br>
@stop

@section('nav-menu')  
    <div id="text_generator">
        <h4>XKCD Generator</h4>
        <form method='POST' action='/xkcd' class="form-inline hidden-xs">
            {!! Form::token() !!}
            <div class="form-group" id="words-group">
                <label>Number of Words (Max. 9)</label>
                       @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif        
                <input type="text" class="form-control" name='words' id='words' value="<?php echo $_SESSION['nW']; ?>" maxlength="2">
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox" name="checkbox"> Add a number
                </label>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox" name="symbols"> Add a symbol
                </label>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox" name="firstcase"> First letter uppercase
                </label>
            </div>  
            <div class="checkbox">
                <label>
                <input type="checkbox" name="uppercase"> All uppercase
                </label>
            </div><br>             
            <div class="form-group" id="special">
                <label>Separator</label>
                <input type="hidden" class="form-control" name='delimiter' id='delimiter' value="">
                <button class="btn btn-default symbols" type="button" id="at">@</button>
                <button class="btn btn-default symbols" type="button" id="hyphen">-</button>
                <button class="btn btn-default symbols" type="button" id="hash">#</button>
                <button class="btn btn-default symbols" type="button" id="dollar">$</button>
                <button class="btn btn-default symbols" type="button" id="under">_</button>
                <button class="btn btn-default symbols" type="button" id="mark">!</button>
                <button class="btn btn-default symbols" type="button" id="tilde">~</button> 
                <button class="btn btn-default symbols" type="button" id="comma">,</button>  
                <button class="btn btn-default symbols" type="button" id="pipe">|</button>  
                <button class="btn btn-default symbols" type="button" id="colon">:</button>  
                <button class="btn btn-default" type="button" id="semi">;</button>                                    
            </div>         
                <button type="submit" class="btn btn-default" id="generate">Generate</button>            
        </form>      
        <div class="status_info">
            <img src="{{ asset('img/off.png') }}" alt="Offline"> Offline dictionary - 500 words | 
            <img src="{{ asset('img/on.png') }}" alt="Online"> Online dictionary - 3000 words
        </div>
    </div>
@stop

@section('nav-slave')
    <div class="text-center slave-container"> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 main">
                <div class="generate text-center">{{  empty($display) ? "XKCD Password Generator" : $display }}</div>
                <div class="text-center" id="anim"><img src="img/{{ rand(1,13) }}.png" alt="xkcd"></div>
                <div id="anim1" class="animate text-center"></div>
                <div class="animate text-center status">{{ $status or "" }}</div>
            </div>
        </div>        
    </div> 
@stop