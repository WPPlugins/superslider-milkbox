<?php
$box = '

<form id="milkshort" name="milkshort" action="">

			<label class ="ss_label" for="milkopacity">opacity : <input tabindex="30" type="text" style="width:40px;" class="ss_input" name="milkopacity" id="milkopacity"  maxlength="10" value="" /> 0.7</label> 
			<label class ="ss_label" for="milktop">top : <input tabindex="31" type="text" style="width:40px;"  class="ss_input" name="milktop" id="milktop"  maxlength="10" value="" /> px.</label>
			<label class ="ss_label" for="milkheight">height : <input tabindex="32" type="text" style="width:40px;"  class="ss_input" name="milkheight" id="milkheight"  maxlength="10" value="" /> px.</label>	
			<label class ="ss_label" for="milkwidth">width : <input tabindex="33" type="text" style="width:40px;"  class="ss_input" name="milkwidth" id="milkwidth"  maxlength="10" value="" /> px.</label>
			<label class ="ss_label" for="milkduration">duration : <input tabindex="34" type="text" style="width:40px;"  class="ss_input" name="milkduration" id="milkduration"  maxlength="10" value="" />1200</label>
			
			<label class ="ss_label" for="milkplay">auto play : <input tabindex="35" name="milkplay" id="milkplay" type="checkbox" value="true" /></label>
			<label class ="ss_label" for="milkdelay">delay : <input tabindex="36" type="text" style="width:40px;"  class="ss_input" name="milkdelay" id="milkdelay"  maxlength="10" value="" /> seconds</label>
			
			<label class ="ss_label" for="borderwidth">borderwidth : <input tabindex="37" type="text" style="width:40px;"  class="ss_input" name="borderwidth" id="borderwidth"  maxlength="10" value="" /> px.</label>
			<label class ="ss_label" for="bordercolor">bordercolor : <input tabindex="38" type="text" style="width:60px;"  class="ss_input" name="bordercolor" id="bordercolor"  maxlength="10" value="" /></label>
			<label class ="ss_label" for="canvaspad">canvaspadding : <input tabindex="39" type="text" style="width:40px;"  class="ss_input" name="canvaspad" id="canvaspad"  maxlength="10" value="" /> px.</label>
			
			<!--<label class ="ss_label" for="milktitle">show title : <input tabindex="40" name="milktitle" id="milktitle" type="checkbox" value="true" /></label>-->

			<label class ="ss_label" for="transition">Transition
					<select name="transition" id="transition" tabindex="41" >
						<option id="op_milk_type" value=\'\'> select</option>
						 <option id="op_milk_type1" value=\'sine\'> sine</option>
						 <option id="op_milk_type2" value=\'elastic\'> elastic</option>
						 <option id="op_milk_type3" value=\'bounce\'> bounce</option>
						 <option id="op_milk_type4" value=\'back\'> back</option>
						 <option id="op_milk_type5" value=\'expo\'> expo</option>
						 <option id="op_milk_type6" value=\'circ\'> circ</option>
						 <option id="op_milk_type7" value=\'quad\'> quad</option>
						 <option id="op_milk_type8" value=\'cubic\'> cubic</option>
						 <option id="op_milk_type9" value=\'linear\'> linear</option>
					</select></label>
			<label class ="ss_label" for="transition_out">Trans in out
					<select name="transition" id="transition_out" tabindex="42" >
						<option id="op_milk_typeout" value=\'\'> select</option>
						 <option id="op_milk_typeout1" value=\'in\'> in</option>
						 <option id="op_milk_typeout2" value=\'out\'> out</option>
						 <option id="op_milk_typeout3" value=\'in:out\'> in:out</option>
					</select></label>
					
			<input type="button" tabindex="42" value="Add Milkbox" name="sendmilktofield" id="sendmilktofield" class="button-primary action" style="margin:10px 40px 0 10px; float: right;" onclick="addmilk(); return false;" />
</form>
<br style="clear:both;" /><p>This shortcode helper presently only works for the Html view, it does not work for the Visual view. Selecting any of the above options will add that option to the shortcode. If you want to then set an option to false, just change the property of the option in your shortcode inside of your post window.</p>

';
?>