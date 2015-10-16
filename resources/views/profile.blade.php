@extends('layouts.master')

@section('title')
    Ipsum Generator
@stop

@section('thumb2-main')
	thumb2-main2
@stop

@section('nav-fa')
    <a href="/home"><i id="nav-1" class="fa fa-bars fa-3x"></i></a><br>
    <span class="nav-title">Dahsboard</span><br>
    <i id="nav-2" class="fa fa-file-code-o fa-3x"></i><br>
    <span class="nav-title">Lorem Ipsum Generator</span><br>
    <i id="nav-3" class="fa  fa-dot-circle-o fa-3x"></i><br>
    <span class="nav-title">Profile Maker</span><br>
    <i id="nav-4" class="fa  fa-tags fa-3x"></i><br>
    <span class="nav-title">chmod cruncher</span><br>
    <i id="nav-5" class="fa  fa-cogs fa-3x"></i><br>
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
                <label class="label-control">1. Enter the number of user profiles to generate and click the Generate button:</label>
                <input id="text" type="text" class="form-control" name="text" placeholder="number of users" value="{{ $_POST['text'] or 1 }}"><br>      	
                <button id="generate" type="submit" class="btn btn-default">Generate</button><br>
                 <label class="label-control">3. Click below to view the formatted data:</label>                 
                <button id="viewDeft" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">View All</button>
                <button id="viewJson" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">View JSON</button>
            </div>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="copy" class="btn btn-primary">Select All</button>
                <button type="button" id="copy1" class="btn btn-primary">Select All</button>
            </div>
            <div id="modal-body" class="modal-body">
                <textarea  id="paragraph" rows="4" cols="50" readonly><?php  $profile->display(); ?></textarea>
            </div>
            <div id="modal-body1" class="modal-body">
                <textarea  id="paragraph1" rows="4" cols="50" readonly><?php  $profile->displayJSON(); ?></textarea>
            </div>            
        </div>
    </div>
</div> 
<!-- End Modal -->    
    
@stop


@section('nav-slave')

<div class="text-center slave-container"> 
	<img class="img-profile" src="{{ asset("img/" . $profile->track[0]['img']) }}" alt=""/><br>
    <div class="profile_title">{{ $profile->track[0]['name'] }}</div> <br>    
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