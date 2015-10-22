@extends('layouts.master')

@section('title')
    Profile Generator
@stop

@section('thumb2-main')
    thumb2-main2
@stop

@section('nav-fa') 
    <a href="/"><i id="nav-1" class="fa fa-bars fa-3x"></i></a><br>
    <span class="nav-title">Dahsboard</span><br>
    <a href="/loremipsum"><i id="nav-2" class="fa fa-file-code-o fa-3x"></i></a><br>
    <span class="nav-title">Lorem Ipsum Generator</span><br>
    <a href="/profile"><i id="nav-3" class="fa fa-dot-circle-o fa-3x fa-active"></i></a><br>
    <span class="nav-title">Profile Maker</span><br>
    <a href="/chmod"><i id="nav-4" class="fa  fa-tags fa-3x"></i></a><br>
    <span class="nav-title">chmod cruncher</span><br>
    <a href="/xkcd"><i id="nav-5" class="fa  fa-cogs fa-3x"></i></a><br>
    <span class="nav-title">xkcd password generator</span><br>
@stop

@section('nav-menu')
    @if(isset($post))
        {{ $profile->showRandom($post[0]) }}
    @else
        {{ $profile->showRandom(1) }}
    @endif
    <div id="text_generator" class="">
        <h4>PROFILE MAKER</h4>
        <form action="/profile" method="post">	
            <div class="form-group text-left">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <label class="label-control">1. Enter the number of user profiles to generate and click the Generate button:<br> (Max 30)</label>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                              
                <input id="text" type="text" class="form-control" name="text" placeholder="number of users" value="{{ $_POST['text'] or 1 }}"><br>      	
                <button id="generate" type="submit" class="btn btn-default">Generate</button><br>
                <label class="label-control">2. Click below to view the formatted data:</label>                 
                <button id="viewDeft" type="button" class="btn btn-default hidden-sm hidden-xs" data-toggle="modal" data-target="#myModal">View All</button>
                <button id="viewJson" type="button" class="btn btn-default hidden-sm hidden-xs" data-toggle="modal" data-target="#myModal">View JSON</button>
                <button id="viewCSV" type="button" class="btn btn-default hidden-sm hidden-xs" data-toggle="modal" data-target="#myModal">View CSV</button>                             
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="copy" class="btn btn-primary">Select All</button>
                    <button type="button" id="copy1" class="btn btn-primary">Select All</button>
                    <button type="button" id="copy2" class="btn btn-primary">Select All</button>                    
                </div>
                <div id="modal-body" class="modal-body">
                    <textarea  id="paragraph" rows="4" cols="50" readonly><?php  $profile->display(); ?></textarea>
                </div>
                <div id="modal-body1" class="modal-body">
                    <textarea  id="paragraph1" rows="4" cols="50" readonly><?php  $profile->displayJson(); ?></textarea>
                </div> 
                <div id="modal-body2" class="modal-body">
                    <textarea  id="paragraph2" rows="4" cols="50" readonly><?php  $profile->displayCsv(); ?></textarea>
                </div>                            
            </div>
        </div>
    </div> 
    <!-- End Modal -->        
@stop

@section('nav-slave')
    <!--Mobile View-->
        <div class="mobile-viewnav hidden-md hidden-lg">   
            <ul class="nav nav-tabs">
              <li role="presentation" class="active view-nav"><a class="view-p-all">View ALL</a></li>
            </ul>
            <div class="tab">
              <div class="well ctrl-profile">
                <?php  $profile->display(); ?>
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li role="presentation" class="active view-nav"><a class="view-p-json">JSON</a></li>
            </ul>
            <div class="tab">
              <div class="well ctrljson-profile">
                <?php  $profile->displayJson(); ?>
              </div>
            </div>                
            <ul class="nav nav-tabs">
              <li role="presentation" class="active view-nav"><a class="view-p-csv">View CSV</a></li>
            </ul>
            <div class="tab">
              <div class="well ctrlcsv-profile">
                <?php  $profile->displayCsv(); ?>
              </div>
            </div>                  
        </div> 
   <!--End Mobile View-->
       
    <div class="text-center slave-container hidden-xs hidden-md"> 
        <img class="img-profile" src="{{ asset("img/" . $profile->track[0]['img']) }}" alt=""/><br>
        <div class="profile_title">{{ $profile->track[0]['name'] }} </div> <br>    
        <div class="list-group text-left">
            <a class="list-group-item list-group-item-info text-center">
            About <strong>{{ $profile->track[0]['name'] }} </strong>
            </a>
            <a  class="list-group-item"><strong class="field">ID: </strong>{{ $profile->track[0]['id'] }}</a>
            <a  class="list-group-item"><strong class="field">Email: </strong>{{ $profile->track[0]['email'] }}</a>    
            <a  class="list-group-item"><strong class="field">Birthday: </strong>{{ $profile->track[0]['birthday'] }}</a>
            <a  class="list-group-item"><strong class="field">Username: </strong>{{ $profile->track[0]['user'] }}</a>
            <a  class="list-group-item"><strong class="field">Password: </strong>{{ $profile->track[0]['password'] }}</a>
            <a  class="list-group-item"><strong class="field">Salt: </strong>{{ $profile->track[0]['salt'] }}</a>     
            <a  class="list-group-item"><strong class="field">Hash: </strong>{{ $profile->track[0]['hash'] }}</a>
            <a  class="list-group-item"><strong class="field">Hash: </strong>{{ $profile->track[0]['img'] }}</a>
    	</div> 	
    </div> 
@stop