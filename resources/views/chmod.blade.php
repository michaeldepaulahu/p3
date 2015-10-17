@extends('layouts.master')

@section('title')
    Ipsum Generator
@stop

@section('thumb2-main')
	thumb2-main3
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
  
    <div id="text_generator" class="">
        <h4>CHMOD CRUNCHER</h4>
        <form action="/chmod" method="post">	
            <div class="form-group text-left">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <label class="label-control">1. Enter Octal notation or select permissions below:</label>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input id="text" type="text" class="form-control" name="text" placeholder="number of users" value="{{ '0000' }}"><br>      	
                <label class="label-control">User Permissions:</label>
                <div class="checkbox">
                    <label>
                  		<input type="checkbox" name="ur" value="4"> Read
              		</label>   
                    <label>
                  		<input type="checkbox" name="uw" value="2"> Write
              		</label>   
                    <label>
                  		<input type="checkbox" name="ue" value="1"> Execute
              		</label>                                                            
		        </div>
                
                <label class="label-control">Group Permissions:</label>
                <div class="checkbox">
                    <label>
                  		<input type="checkbox" name="gr" value="4"> Read
              		</label>   
                    <label>
                  		<input type="checkbox" name="gw" value="2"> Write
              		</label>   
                    <label>
                  		<input type="checkbox" name="ge" value="1"> Execute
              		</label>                                                            
		        </div>
                
                <label class="label-control">Other Permissions:</label>
                <div class="checkbox">
                    <label>
                  		<input type="checkbox" name="or" value="4"> Read
              		</label>   
                    <label>
                  		<input type="checkbox" name="ow" value="2"> Write
              		</label>   
                    <label>
                  		<input type="checkbox" name="oe" value="1"> Execute
              		</label>                                                            
		        </div>   
               
               <label class="label-control">Special Permissions:</label>
                <div class="checkbox">
                    <label>
                  		<input type="checkbox" name="su" value="4"> Setuid
              		</label>   
                    <label>
                  		<input type="checkbox" name="sg" value="2"> Setgid
              		</label>   
                    <label>
                  		<input type="checkbox" name="sb" value="1"> Sticky bit
              		</label>                                                            
		        </div>                                                

                <button id="generate" type="submit" class="btn btn-default">Generate</button><br>
            </div>
        </form>
    </div>
     
@stop


@section('nav-slave')

<div class="text-center slave-container"> 
    <div class="list-group text-left">
        <a class="list-group-item head text-center">
            <div class="row">
                  <div class="col-md-4">User</div>
                  <div class="col-md-4">Group</div>
                  <div class="col-md-4">Other</div>
            </div>
        </a>
        <a  class="list-group-item">
            <div class="row chmod_title text-center">
                <div class="col-md-4">                
					{!! $run->mapChmod(0, 2, $post, $split) !!}                
                </div> 
                <div class="col-md-4">
					{!! $run->mapChmod(3, 5, $post, $split) !!}
                </div> 
                <div class="col-md-4">
					{!!$run->mapChmod(6, 8, $post, $split)  !!}
                </div>
            </div> 
        </a> 
        <a  class="list-group-item">
            <div class="row chmod_caption text-center">
                <div class="col-md-4">     
	                {!! $run->mapChmod(9, 11, $post, $split, $postSum) !!}    
                </div> 
                <div class="col-md-4">

					{!! $run->mapChmod(12, 14, $post, $split, $postSum) !!}    			
              
                </div> 
                <div class="col-md-4">
					{!! $run->mapChmod(15, 17, $post, $split, $postSum) !!}   
                </div>
            </div> 
        </a>         
        <a class="list-group-item text-center">
            <div class="row">
                  <div class="col-md-12 chmod-bit">
                 	 {!! isset($postSum[9]) && $postSum[9] != 0 ? $run->send($postSum[9]) : $run->send($split[0]) !!}
                     {!! isset($postSum[0]) && $postSum[0] != 0 ? $run->send($postSum[0]) : $run->send($split[1]) !!}
                     {!! isset($postSum[1]) && $postSum[1] != 0 ? $run->send($postSum[1]) : $run->send($split[2]) !!}
                     {!! isset($postSum[2]) && $postSum[2] != 0 ? $run->send($postSum[2]) : $run->send($split[3]) !!}
                  </div>
            </div>
        </a>                      
    </div>
</div> 
@stop