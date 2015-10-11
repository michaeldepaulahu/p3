    <div class="form-group" id="words-group">
        <label>Number of Words (Max. 9)</label>
        <input type="text" class="form-control" name='words' id='words' value="<?php echo $_SESSION['nW']; ?>" maxlength="1">
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