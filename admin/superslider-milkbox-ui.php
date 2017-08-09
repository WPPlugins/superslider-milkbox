<?php
/*
Copyright 2008 daiv Mowbray

This file is part of milkbox

Milkbox is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

milkbox is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Fancy Categories; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	/**
   * Should you be doing this?
   */ 	
   
	if ( !current_user_can('manage_options') ) {
		// Apparently not.
		die( __( 'ACCESS DENIED: Your don\'t have permission to do this.', 'milkbox' ) );
		}
		if (isset($_POST['set_defaults']))  {
			check_admin_referer('milk_options');
			$Milk_OldOptions = array(
				"milk_shortcode" => "true",
				"auto_milk" =>	"true",
				"load_moo" => "on",
				"css_load" => "default",
				"css_theme" => "default",//end header ops 
				"opacity" => "0.7",
				"top" => "10",
				"width" => "40",
				"height" => "40",
				"duration" => "500",
				"milk_trans_type"	=> "sine",
				"milk_trans_typeinout" => "in:out",/*function (ex. Transitions.Sine.easeIn) or string (ex. 'quint:out')*/
                "borderwidth" => "4",
                "bordercolor" => "#000000",
                "canvaspad" => "0",
				"play" => "false",
				"delay" => "7",
				"title" => "false");//end array

			update_option($this->optionsName, $Milk_OldOptions);
				
			echo '<div id="message" class="updated fade"><p><strong>' . __( 'Milkbox Default Options reloaded.', 'milkbox' ) . '</strong></p></div>';
			
		}
		elseif ($_POST['action'] == 'update' ) {
			
			check_admin_referer('milk_options'); // check the nonce
					// If we've updated settings, show a message
			echo '<div id="message" class="updated fade"><p><strong>' . __( 'Milkbox Options saved.', 'milkbox' ) . '</strong></p></div>';
			
			$Milk_newOptions = array(			
				'milk_shortcode'=> $_POST['op_shortcode'],
				'auto_milk' 	=> $_POST['op_auto_milk'],
				'load_moo'		=> $_POST['op_load_moo'],
				'css_load'		=> $_POST['op_css_load'],
				'css_theme'		=> $_POST["op_css_theme"],
				'opacity'		=> $_POST["op_overlayOpacity"],
				'top'			=> $_POST["op_topPosition"],				
				'width'			=> $_POST["op_initialWidth"],
				'height'		=> $_POST["op_initialHeight"],
				'duration'		=> $_POST["op_resizeDuration"],
				'play'			=> $_POST["op_autoPlay"],
				'delay'		   => $_POST["op_autoPlayDelay"],
				//'title'		   => $_POST["op_removeTitle"],
				'milk_trans_type'		=> $_POST["op_trans_type"],
				'milk_trans_typeinout'	=> $_POST["op_trans_typeinout"],
				'borderwidth'   => $_POST["op_borderwidth"],
                'bordercolor'   => $_POST["op_bordercolor"],
                'canvaspad'     => $_POST["op_canvaspad"]
			);	

		update_option($this->optionsName, $Milk_newOptions);

		}	

		$Milk_newOptions = get_option($this->optionsName);   

	/**
	*	Let's get some variables for multiple instances
	*/
    $checked = ' checked="checked"';
    $selected = ' selected="selected"';
	$site = get_option('siteurl'); 
?>

<div class="wrap">
<form name="milk_options" method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
<?php if ( function_exists('wp_nonce_field') )
		wp_nonce_field('milk_options'); echo "\n"; ?>
		
<div style="">
<a href="http://wp-superslider.com/">
<img src="<?php echo $site ?>/wp-content/plugins/superslider-milkbox/admin/img/logo_superslider.png" style="margin-bottom: -15px;padding: 20px 20px 0px 20px;" alt="SuperSlider Logo" width="52" height="52" border="0" /></a>
  <h2 style="display:inline; position: relative;">SuperSlider-Milkbox Options</h2>
 </div><br style="clear:both;" />
 <table class="form-table">
	<tr
<?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?>	
	><th scope="row">Milkbox Appearance</th>
		<td width="70%" valign="top">
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Theme options start -->  	
		<legend><b><?php _e(' Themes',$Milk_domain); ?>:</b></legend>
	<table width="100%" cellpadding="10" align="center">
	<tr>
		<td width="25%" align="center" valign="top"><img src="<?php echo $site ?>/wp-content/plugins/superslider-milkbox/admin/img/default.png" alt="default" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo $site ?>/wp-content/plugins/superslider-milkbox/admin/img/blue.png" alt="blue" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo $site ?>/wp-content/plugins/superslider-milkbox/admin/img/black.png" alt="black" border="0" width="110" height="25" /></td>
		<td width="25%" align="center" valign="top"><img src="<?php echo $site ?>/wp-content/plugins/superslider-milkbox/admin/img/custom.png" alt="custom" border="0" width="110" height="25" /></td>
	</tr>
	<tr>
		<td><label for="op_css_theme1">
			 <input type="radio"  name="op_css_theme" id="op_css_theme1"
			 <?php if($Milk_newOptions['css_theme'] == "default") echo $checked; ?> value="default" />
			</label>
		</td>
		<td> <label for="op_css_theme2">
			 <input type="radio"  name="op_css_theme" id="op_css_theme2"
			 <?php if($Milk_newOptions['css_theme'] == "blue") echo $checked; ?> value="blue" />
			 </label>
  		</td>
		<td><label for="op_css_theme3">
			 <input type="radio"  name="op_css_theme" id="op_css_theme3"
			 <?php if($Milk_newOptions['css_theme'] == "black") echo $checked; ?> value="black" />
			 </label>
  		</td>
		<td> <label for="op_css_theme4">
			 <input type="radio"  name="op_css_theme" id="op_css_theme4"
			 <?php if($Milk_newOptions['css_theme'] == "custom") echo $checked; ?> value="custom" />
			</label>
     </td>
	</tr>
	</table>

  </fieldset>
  </td>
		<td width="30%" valign="top">
		
		</td>
	</tr>
	
	<tr><th scope="row">Milkbox Shortcode</th>
		<td width="70%" valign="top">
				<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Theme options start -->  
   <legend><b><?php _e(' Shortcode',$Milk_domain); ?>:</b></legend>
		 <ul style="list-style-type: none;">
		 	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	
    	<label for="op_shortcodemilkbox">
    		<input type="radio" 
    		<?php if($Milk_newOptions['milk_shortcode'] == "true") echo $checked; ?> name="op_shortcode" id="op_shortcodemilkbox" value="true" /> 
    		<?php _e('Milkbox shortcode metabox in post screen is turned on.',$Milk_domain); ?>
    		</label>
    		<br />
    	<label for="op_shortcodepopover">
     		<input type="radio" 
     		<?php if($Milk_newOptions['milk_shortcode'] == "false") echo $checked; ?>  name="op_shortcode" id="op_shortcodepopover" value="false" />
     		<?php _e(' Off, not displayed on post / page screen.',$Milk_domain); ?>
     		</label><br />
     		<span class="setting-description">
     		<?php _e('By turning this off the Milkbox shortcode metabox will not be available on your post screen, short code will still work. Milkbox shortcode allows you to change the way your Milkbox works on a per post / page bases.',$Milk_domain); ?>
     		</span>
    		</li>
		 </ul>
	</fieldset>
  </td>
		<td valign="top" width="30%">
		<p class="submit">
		<input type="submit" id="update1" class="button-primary" value="<?php _e(' Update options',$Milk_domain); ?> &raquo;" />
		</p>
		</td>
	</tr>
	
	<tr><th scope="row">Milkbox Auto Link Images</th>
		<td width="70%" valign="top">
				<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;">
   <legend><b><?php _e(' Autolink',$Milk_domain); ?>:</b></legend>
		 <ul style="list-style-type: none;">
		 	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

    	<label for="op_auto_milkon">
    		<input type="radio" 
    		<?php if($Milk_newOptions['auto_milk'] == "true") echo $checked; ?> name="op_auto_milk" id="op_auto_milkon" value="true" /> 
    		<?php _e('Milkbox autolink to images is turned on.',$Milk_domain); ?>
    		</label>
    		<br />
    	<label for="op_auto_milkoff">
     		<input type="radio" 
     		<?php if($Milk_newOptions['auto_milk'] == "false") echo $checked; ?>  name="op_auto_milk" id="op_auto_milkoff" value="false" />
     		<?php _e(' Off, required rel="milkbox" not added automatically to your images.',$Milk_domain); ?>
     		</label><br />
     		<span class="setting-description">
     		<?php _e('By turning this off the Milkbox plugin will not add the rel="milkbox" code to your images. Milkbox will still work, but you will have to add the rel code manually per image or via another manner.',$Milk_domain); ?>
     		</span>
    		</li>
		 </ul>
	</fieldset>
  </td>
		<td valign="top">
		
		</td>
	</tr>
	
	<tr><th scope="row">Options</th>
		<td>
		<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- SLideshow options start -->
   <legend><b><?php _e(' Personalize Transitions',$Milk_domain); ?>:</b></legend>
   <p><?php _e('These options are global. You can modify most options within your individual post by adding options to the shortcode.',$Milk_domain); ?>
		</p>
   <ul style="list-style-type: none;">
     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_trans_type"><?php _e(' Transition type',$Milk_domain); ?>:   </label>  
		 <select name="op_trans_type" id="op_trans_type">
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "sine") echo $selected; ?> id="sine" value='sine'> sine</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "elastic") echo $selected; ?> id="elastic" value='elastic'> elastic</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "bounce") echo $selected; ?> id="bounce" value='bounce'> bounce</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "back") echo $selected; ?> id="back" value='back'> back</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "expo") echo $selected; ?> id="expo" value='expo'> expo</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "circ") echo $selected; ?> id="circ" value='circ'> circ</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "quad") echo $selected; ?> id="quad" value='quad'> quad</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "cubic") echo $selected; ?> id="cubic" value='cubic'> cubic</option>
			 <option <?php if($Milk_newOptions['milk_trans_type'] == "linear") echo $selected; ?> id="linear" value='linear'> linear</option>
			</select>
		<label for="op_trans_typeinout"><?php _e(' Transition action.',$Milk_domain); ?></label>
		<select name="op_trans_typeinout" id="op_trans_typeinout">
			 <option <?php if($Milk_newOptions['milk_trans_typeinout'] == "in") echo $selected; ?> id="in" value='in'> in</option>
			 <option <?php if($Milk_newOptions['milk_trans_typeinout'] == "out") echo $selected; ?> id="out" value='out'> out</option>
			 <option <?php if($Milk_newOptions['milk_trans_typeinout'] == "in:out") echo $selected; ?> id="inout" value='in:out'> in:out</option>     
		</select><br />
		<span class="setting-description"><?php _e(' IN is the begginning of transition. OUT is the end of transition.',$Milk_domain); ?></span>
     </li><!-- //'quad:in:out'sine:out, elastic:out, bounce:out, expo:out, circ:out, quad:out, cubic:out, linear:out, -->    
      	
      	<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_initialHeight"><?php _e(' Initial height '); ?>:
		 <input type="text" class="span-text" name="op_initialHeight" id="op_initialHeight" size="3" maxlength="6"
		 value="<?php echo ($Milk_newOptions['height']); ?>" /></label> 
		 <span class="setting-description"><?php _e('px, this is the starting height',$Milk_domain); ?></span>
	 </li>     
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_initialWidth"><?php _e(' Initial width '); ?>:
		 <input type="text" class="span-text" name="op_initialWidth" id="op_initialWidth" size="3" maxlength="6"
		 value="<?php echo ($Milk_newOptions['width']); ?>" /></label> 
		 <span class="setting-description"><?php _e('px, this is the starting width',$Milk_domain); ?></span>
	 </li>
      <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_resizeDuration"><?php _e(' Resize Transition time '); ?>:
		 <input type="text" class="span-text" name="op_resizeDuration" id="op_resizeDuration" size="3" maxlength="6"
		 value="<?php echo ($Milk_newOptions['duration']); ?>" /></label> 
		 <span class="setting-description"><?php _e('  In milliseconds, ie: 1000 = 1 second, (default 500)',$Milk_domain); ?></span>
	</li>
      
     <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_topPosition"><?php _e(' Top possition '); ?>:
		 <input type="text" class="span-text" name="op_topPosition" id="op_topPosition" size="3" maxlength="3"
		 value="<?php echo ($Milk_newOptions['top']); ?>" /></label> 
		 <span class="setting-description"><?php _e('  Image margin from window top, (default 40)',$Milk_domain); ?></span>
	 </li>
	 
	 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_overlayOpacity"><?php _e(' Overlay opacity '); ?>:
		 <input type="text" class="span-text" name="op_overlayOpacity" id="op_overlayOpacity" size="3" maxlength="3"
		 value="<?php echo ($Milk_newOptions['opacity']); ?>" /></label> 
		 <span class="setting-description"><?php _e('   (default 0.7)',$Milk_domain); ?></span>
	 </li>
     
	 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

			<label for="op_autoPlayon">
				<input type="radio" 
				<?php if($Milk_newOptions['play'] == "true") echo $checked; ?> name="op_autoPlay" id="op_autoPlayon" value="true" /> 
				<?php _e(' Auto play on.',$Milk_domain); ?>
				</label>
				<br />
			<label for="op_autoPlayoff">
				<input type="radio" 
				<?php if($Milk_newOptions['play'] == "false") echo $checked; ?>  name="op_autoPlay" id="op_autoPlayoff" value="false" />
				<?php _e(' off.',$Milk_domain); ?>
				</label>

		  <span class="setting-description"><?php _e('When more than one image is available, Milkbox can be set to run as a slideshow.',$Milk_domain); ?></span>
	  </li>
	  <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
		 <label for="op_autoPlayDelay"><?php _e(' Image viewing time'); ?>:
		 <input type="text" class="span-text" name="op_autoPlayDelay" id="op_autoPlayDelay" size="3" maxlength="3"
		 value="<?php echo ($Milk_newOptions['delay']); ?>" /></label> 
		 <span class="setting-description"><?php _e(' (If Auto play is on) In seconds, (default 7)',$Milk_domain); ?></span>
	</li>
	<!--  <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">

			<label for="op_removeTitleon">
				<input type="radio" 
				<?php //if($Milk_newOptions['title'] == "false") echo $checked; ?> name="op_removeTitle" id="op_removeTitleon" value="false" /> 
				<?php //_e(' Image title on (default).',$Milk_domain); ?>
				</label>
				<br />
			<label for="op_removeTitleoff">
				<input type="radio" 
				<?php //if($Milk_newOptions['title'] == "true") echo $checked; ?>  name="op_removeTitle" id="op_removeTitleoff" value="true" />
				<?php //_e(' off.',$Milk_domain); ?>
				</label>

     	 <span class="setting-description"><?php //_e('  Image title to display or not.',$Milk_domain); ?>
     	 </span>
	 
	</li>-->
     </ul>
  </fieldset>
  </td>
		<td valign="top">
		
		</td>
	</tr>
	
    <tr><th scope="row">Design</th>
		<td>
<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Header files options start -->
   			<legend><b><?php _e(' Design Options'); ?>:</b></legend>
  		 <ul style="list-style-type: none;">
  		   
  		   <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_borderwidth"><?php _e(' Image border width '); ?>:
		 <input type="text" class="span-text" name="op_borderwidth" id="op_borderwidth" size="2" maxlength="3"
		 value="<?php echo ($Milk_newOptions['borderwidth']); ?>" /></label> 
		<span class="setting-description"><?php _e('px, this is the border around the image.',$Milk_domain); ?></span>
	 </li>  
	 
	 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_bordercolor"><?php _e(' Image border color '); ?>:
		 <input type="text" class="span-text" name="op_bordercolor" id="op_bordercolor" size="7" maxlength="7"
		 value="<?php echo ($Milk_newOptions['bordercolor']); ?>" /></label> 
		 
	 </li> 
	 
	 <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
     <label for="op_canvaspad"><?php _e('Image canvas padding '); ?>:
		 <input type="text" class="span-text" name="op_canvaspad" id="op_canvaspad" size="2" maxlength="3"
		 value="<?php echo ($Milk_newOptions['canvaspad']); ?>" /></label> 
		 <span class="setting-description"><?php _e('px, this is the padding between image and its border.',$Milk_domain); ?></span>
	 </li>   



    </ul>
     </fieldset>
     </td>
		<td valign="top"></td>
	</tr>
    
    
	<tr
<?php if ($this->base_over_ride != "on") { 
  		 echo '';
  		} else {
  		echo 'style="display:none;"';
  		}?>	
	><th scope="row">File Storage</th>
		<td>
<fieldset style="border:1px solid grey;margin:10px;padding:10px 10px 10px 30px;"><!-- Header files options start -->
   			<legend><b><?php _e(' Loading Options'); ?>:</b></legend>
  		 <ul style="list-style-type: none;">
  		 
  		<li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
    	<label for="op_load_moo">
    	<input type="checkbox" 
    	<?php if($Milk_newOptions['load_moo'] == "on") echo $checked; ?> name="op_load_moo" id="op_load_moo" />
    	<?php _e(' Load Mootools 1.2 into your theme header.',$Milk_domain); ?></label>
    	
	</li>
	
    <li style="border-bottom:1px solid #cdcdcd; padding: 6px 0px 8px 0px;">
  
    	<label for="op_css_load1">
			<input type="radio" name="op_css_load" id="op_css_load1"
			<?php if($Milk_newOptions['css_load'] == "default") echo $checked; ?> value="default" />
			<?php _e(' Load css from default location. milkbox plugin folder.',$Milk_domain); ?></label><br />
    	<label for="op_css_load2">
			<input type="radio" name="op_css_load"  id="op_css_load2"
			<?php if($Milk_newOptions['css_load'] == "pluginData") echo $checked; ?> value="pluginData" />
			<?php _e(' Load css from plugin-data folder, see side note. (Recommended)',$Milk_domain); ?></label><br />
    	<label for="op_css_load3">
			<input type="radio" name="op_css_load"  id="op_css_load3"
			<?php if($Milk_newOptions['css_load'] == "off") echo $checked; ?> value="off" />
			<?php _e(' Don\'t load css, manually add to your theme css file.',$Milk_domain); ?></label>

    </li>
    </ul>
     </fieldset>
     </td>
		<td valign="top">
		<p>
		<?php _e(' If your theme or any other plugin loads the mootools 1.2 javascript framework into your file header, you can de-activate it here.',$Milk_domain); ?></p><p><?php _e(' Via ftp, move the folder named plugin-data from this plugin folder into your wp-content folder. This is recomended to avoid over writing any changes you make to the css files when you update this plugin.',$Milk_domain); ?></p></td>
	</tr>
	
</table>
<p class="submit">
		<input type="submit" name="set_defaults" value="<?php _e(' Reload Default Options',$Milk_domain); ?> &raquo;" />
		<input type="submit" id="update2" class="button-primary" value="<?php _e(' Update options',$Milk_domain); ?> &raquo;" />
		<input type="hidden" name="action" id="action" value="update" />
 	</p>
 </form>
</div>
<?php
	echo "";
?>