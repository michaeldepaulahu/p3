@extends('layouts.master')

@section('title')
    Ipsum Generator
@stop

@section('thumb2-main')
	thumb2-main1
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
    <h4>TEXT GENERATOR</h4>
    <form action="/generator">
        <div class="form-group text-left">
            <label>How many paragraphs do you want?</label>
            <input id="text" type="text" class="form-control" name="text" placeholder="number of paragraphs" value="{{ $_GET['text'] or 1 }}"><br>															        	
            <button id="generate" type="submit" class="btn btn-default">Generate</button>
            <button id="view" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">View</button>
        </div>
    </form>
</div>
@stop


@section('nav-slave')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="copy" class="btn btn-primary">Select All</button>
            </div>
            <div class="modal-body">
                <textarea  id="paragraph" rows="4" cols="50" readonly>
                <?php 
				if(is_array($paragraph))
				{ 
					foreach($paragraph as $value)
					echo $value . "\n\n";	
				}
                ?> 
                </textarea>
            </div>
        </div>
    </div>
</div> 
<!-- End Modal --> 

<div class="text-center" style="color:#FFFFFF; font-size:12px;"> 
	<p class="t_title">LOREM IPSUM</p>
	<?php if(is_array($paragraph))
	{
		  echo implode('<p><p>', $paragraph); 
	}
	else
	{
		echo "Praesent mollis sit et integer egestas habitant auctor integer sem at nam massa, himenaeos netus vel dapibus nibh malesuada leo fusce tortor sociosqu. Fusce facilisis semper class tempus faucibus tristique duis eros cubilia quisque habitasse, aliquam fringilla orci non vel laoreet dolor enim justo facilisis neque, accumsan in ad venenatis hac per dictumst nulla ligula donec. Quisque massa porttitor ullamcorper risus eu platea fringilla habitasse suscipit pellentesque, donec est habitant vehicula tempor ultrices placerat sociosqu ultrices, consectetur ullamcorper tincidunt quisque tellus ante nostra euismod nec. Sem curabitur elit malesuada lacus viverra sagittis sit, ornare orci augue nullam adipiscing pulvinar libero aliquam, vestibulum platea cursus pellentesque leo dui.";	
	}
	?> 
   	
</div> 
@stop