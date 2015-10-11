    <div class="form-group" id="words-group1">
        <label>Number of Words (Max. 9)</label>
        <input type="text" class="form-control" name='words' id='words1' value="<?php echo $_SESSION['nW']; ?>" maxlength="1">
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
    <div class="form-group" id="special1">
        <label>Separator</label>
        <input type="hidden" class="form-control" name='delimiter1' id='delimiter1' value="">
        <button class="btn btn-default symbols" type="button" id="at1">@</button>
        <button class="btn btn-default symbols" type="button" id="hyphen1">-</button>
        <button class="btn btn-default symbols" type="button" id="hash1">#</button>
        <button class="btn btn-default symbols" type="button" id="dollar1">$</button>
        <button class="btn btn-default symbols" type="button" id="under1">_</button>
        <button class="btn btn-default symbols" type="button" id="mark1">!</button>
        <button class="btn btn-default symbols" type="button" id="tilde1">~</button> 
        <button class="btn btn-default symbols" type="button" id="comma1">,</button>  
        <button class="btn btn-default symbols" type="button" id="pipe1">|</button>  
        <button class="btn btn-default symbols" type="button" id="colon1">:</button>  
        <button class="btn btn-default" type="button" id="semi1">;</button>                                    
    </div>
              
        <button type="submit" class="btn btn-default" id="generate1">Generate</button>
