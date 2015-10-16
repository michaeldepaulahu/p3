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
                <input id="text" type="text" class="form-control" name="text" placeholder="number of users" value="{{ $_POST['text'] or 1 }}"><br>      	
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
				<?php
				 
				isset($post['ur']) ? $run->send('r'): $run->showPermission ($split[1], "r", 4, 5, 6, 7, '-');
				isset($post['uw']) ? $run->send('w'): $run->showPermission ($split[1], "w", 2, 3, 6, 7, '-');
				isset($post['ue']) ? $run->send('x'): $run->showPermission ($split[1], "x", 1, 3, 5, 7, '-');
                ?>                
                </div> 
                <div class="col-md-4">
				<?php
				isset($post['gr']) ? $run->send('r'): $run->showPermission ($split[2], "r", 4, 5, 6, 7, '-');
				isset($post['gw']) ? $run->send('w'): $run->showPermission ($split[2], "w", 2, 3, 6, 7, '-');
				isset($post['ge']) ? $run->send('x'): $run->showPermission ($split[2], "x", 1, 3, 5, 7, '-');					
				?>                
                </div> 
                <div class="col-md-4">
				<?php
				isset($post['or']) ? $run->send('r'): $run->showPermission ($split[3], "r", 4, 5, 6, 7, '-');
				isset($post['ow']) ? $run->send('w'): $run->showPermission ($split[3], "w", 2, 3, 6, 7, '-');
				isset($post['oe']) ? $run->send('x'): $run->showPermission ($split[3], "x", 1, 3, 5, 7, '-');					
				?>                   
                </div>
            </div> 
        </a> 
        <a  class="list-group-item">
            <div class="row chmod_caption text-center">
                <div class="col-md-4">         
                 <?php
				isset($post['ur']) ? $run->send($postSum[3]): $run->showPermission ($split[1], $postSum[3], 4, 5, 6, 7, $postSum[6]);
				isset($post['uw']) ? $run->send($postSum[4] ): $run->showPermission ($split[1], $postSum[4], 2, 3, 6, 7, $postSum[7]);
				isset($post['ue']) ? $run->send($postSum[5] ): $run->showPermission ($split[1], $postSum[5], 1, 3, 5, 7, $postSum[8]);					
				 ?>
                </div> 
                <div class="col-md-4">
                 <?php
				isset($post['gr']) ? $run->send($postSum[3]): $run->showPermission ($split[2], $postSum[3], 4, 5, 6, 7, $postSum[6]);
				isset($post['gw']) ? $run->send($postSum[4] ): $run->showPermission ($split[2], $postSum[4], 2, 3, 6, 7, $postSum[7]);
				isset($post['ge']) ? $run->send($postSum[5] ): $run->showPermission ($split[2], $postSum[5], 1, 3, 5, 7, $postSum[8]);					
				 ?>                
                </div> 
                <div class="col-md-4">
                 <?php
				isset($post['or']) ? $run->send($postSum[3]): $run->showPermission ($split[3], $postSum[3], 4, 5, 6, 7, $postSum[6]);
				isset($post['ow']) ? $run->send($postSum[4] ): $run->showPermission ($split[3], $postSum[4], 2, 3, 6, 7, $postSum[7]);
				isset($post['oe']) ? $run->send($postSum[5] ): $run->showPermission ($split[3], $postSum[5], 1, 3, 5, 7, $postSum[8]);					
				 ?>  
                </div>
            </div> 
        </a>         
        <a class="list-group-item text-center">
            <div class="row">
                  <div class="col-md-12 chmod-bit">
					<?php 
					$postSum[9] != 0 ? $run->send($postSum[9]): $run->send($split[0]);
					$postSum[0] != 0 ? $run->send($postSum[0]): $run->send($split[1]);
					$postSum[1] != 0 ? $run->send($postSum[1]): $run->send($split[2]);
					$postSum[2] != 0 ? $run->send( $postSum[2]): $run->send($split[3]);								
					?>
                  </div>
            </div>
        </a>                      
    </div>
</div> 
@stop