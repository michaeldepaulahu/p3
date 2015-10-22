@extends('layouts.master')

@section('title')
    Ipsum Generator
@stop

@section('thumb2-main')
    thumb2-main1
@stop

@section('nav-fa')
    <a href="/"><i id="nav-1" class="fa fa-bars fa-3x"></i></a><br>
    <span class="nav-title">Dahsboard</span><br>
    <a href="/loremipsum"><i id="nav-2" class="fa fa-file-code-o fa-3x fa-active"></i></a><br>
    <span class="nav-title">Lorem Ipsum Generator</span><br>
    <a href="/profile"><i id="nav-3" class="fa fa-dot-circle-o fa-3x"></i></a><br>
    <span class="nav-title">Profile Maker</span><br>
    <a href="/chmod"><i id="nav-4" class="fa  fa-tags fa-3x"></i></a><br>
    <span class="nav-title">chmod cruncher</span><br>
    <a href="/xkcd"><i id="nav-5" class="fa  fa-cogs fa-3x"></i></a><br>
    <span class="nav-title">xkcd password generator</span><br>
@stop

@section('nav-menu')
    <div id="text_generator" class="">
        <h4>TEXT GENERATOR</h4>
        <form action="/loremipsum" method="post">
            <div class="form-group text-left">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>        
                <label>How many paragraphs do you want?</label>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input id="text" type="text" class="form-control" name="text" placeholder="number of paragraphs" value="{{ $_POST['text'] or 1 }}"><br>
                <div class="xs-wrapper hidden-sm hidden-xs"> 
                    <label>Page Layout:</label>
                    <select class="form-control" name="page">
                        <option value="12">Full Page</option>
                        <option value="6">Half Page</option>
                        <option value="4">1/4 Page</option>
                        <option value="2">1/8 Page</option>
                    </select>
                    <label>Alignment:</label>
                    <select class="form-control" name="align">
                        <option value="text-left">Left</option>
                        <option value="text-center">Center</option>
                        <option value="text-right">Right</option>
                        <option value="text-justify">Justify</option>
                    </select> 
                </div>               															        	
                <button id="generate" type="submit" class="btn btn-default">Generate</button>
                <button id="view" type="button" class="btn btn-default hidden-sm hidden-xs" data-toggle="modal" data-target="#myModal">View</button>
            </div>
        </form>
    </div>  
@stop

@section('nav-slave')
    <!--Mobile View-->
    <div class="mobile-viewnav hidden-md hidden-lg">   
        <ul class="nav nav-tabs">
           <li role="presentation" class="active view-nav"><a class="view-i-all">View ALL</a></li>
        </ul>
        <div class="tab">
            <div class="well ctrl-lorem">
                <?php 
                   if(is_array($paragraph)){
                       echo implode('<p><p>', $paragraph); 
                    } else {
                       echo $paragraph;	
                    }
                ?> 
            </div>
        </div>                 
    </div> 
    <!--End Mobile View-->  
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="copy" class="btn btn-primary">Select All</button>
                </div>
                <div class="modal-body">
                	<!--cannot contain spaces within the textarea, otherwise white space is added-->
                    <textarea  id="paragraph" rows="4" cols="50" readonly><?php 
                    if(is_array($paragraph)) { 
                        foreach($paragraph as $value)
                        echo $value . "\n\n";	
                    }
                    ?></textarea>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Modal --> 
    <div class="text-center slave-container hidden-xs hidden-md"> 
        <p class="t_title">LOREM IPSUM</p>
        <div class="row">
            <div class="col-md-{{ $page }} {{ $align }}">        
                <?php 
                    if(is_array($paragraph)){
                        echo implode('<p><p>', $paragraph); 
                        } else {
                        echo $paragraph;	
                    }
                ?> 
            </div>
        </div>
    </div> 
@stop