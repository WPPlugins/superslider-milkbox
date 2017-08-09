<?php
/*
Plugin Name: SuperSlider-Milkbox
Plugin URI: http://wp-superslider.com/superslider-milkbox
Description:  Another pop over light box. Theme based, animated, automatic linking, autoplay show built with Milkbox2 , uses mootools 1.2 java script.
Author: Daiv Mowbray
Version: 0.2
Author URI: wp-superslider.com

*/ 

/*  Copyright 2008  Daiv Mowbray  (email : daiv.mowbray@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists('ssMilk')) {
    class ssMilk	{
				/**
		* @var string   The name the options are saved under in the database.
		*/
		var $milkOpOut;
		var $optionsName = "ssMilkbox_options";
		var $Milk_domain = 'superslider-milkbox';
		var $base_over_ride;
		var $ssBaseOpOut;
		
		function set_milk_paths()
			{
			if ( !defined( 'WP_CONTENT_URL' ) )
				define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
			if ( !defined( 'WP_CONTENT_DIR' ) )
				define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
			if ( !defined( 'WP_PLUGIN_URL' ) )
				define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
			if ( !defined( 'WP_PLUGIN_DIR' ) )
				define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
			if ( !defined( 'WP_LANG_DIR') )
				define( 'WP_LANG_DIR', WP_CONTENT_DIR . '/languages' );

			}
		
		/**
		* PHP 4 Compatible Constructor
		*/
		function ssMilk(){//$this->__construct();
			
			ssMilk::milk();
		
		}
		
		/**
		* PHP 5 Constructor
		*/		
		function __construct(){
		
			self::milk();
		
		}
		
		function language_switcher() {
			$superslider_Milkbox_locale = get_locale();
			$superslider_Milkbox_mofile = dirname(__FILE__) . "/lang/Superslider-Milkbox-".$superslider_Milkbox_locale.".mo";
			load_textdomain("superslider_Milkbox", $superslider_Milkbox_mofile);		
		}
		
		/**
		* Retrieves the options from the database.
		* @return array
		*/
		function get_milk_options() {
			$milkOptions = array(
				"milk_shortcode" =>	"true",
				"auto_milk" =>	"true",
				"load_moo"	=>	"on",
				"css_load"	=>	"default",
				"css_theme"	=>	"default",
				"opacity"	=>	"0.7",
				"top"		=>	"10",
				"width"		=>	"40",
				"height" 	=> 	"40",
				"duration"	=> 	"800",
				"milk_trans_type"		=> 	"sine",
				"milk_trans_typeinout"	=> "in:out",
				"play" 			=> 	"false",
				"delay" 		=> 	"7",
				"borderwidth"	=>	"4",
				"bordercolor"	=>	"#000000",
				"canvaspad"	=>		"0",
				"title"		=> 		"false");
				
				/*
		onXmlGalleries:$empty,
		onClosed:$empty
				*/
		
			$savedOptions = get_option($this->optionsName);
				if (!empty($savedOptions)) {
					foreach ($savedOptions as $key => $option) {
						$milkOptions[$key] = $option;
					}
			}
			update_option($this->optionsName, $milkOptions);
				return $milkOptions;
		}
		
		/**
		* Saves the admin options to the database.
		*/
		function saveMilkOptions(){
			update_option($this->optionsName, $this->milkOptions);
		}
		
		/**
		* Loads functions into WP API
		* 
		*/
		function milk_init() {

			$this->milkOptions = $this->get_milk_options();
			$this->set_milk_paths();
			
			// lets see if the base plugin is here and get its options
			if (class_exists('ssBase')) {
					$this->ssBaseOpOut = get_option('ssBase_options');
					extract($this->ssBaseOpOut);
					$this->base_over_ride = $ss_global_over_ride;
				}else{
				$this->base_over_ride = 'false';
				}

		}
		
		/**
		* Outputs the HTML for the admin sub page.
		*/
		function milk_ui(){
			global $base_over_ride;
			global $Milk_domain;
			include_once 'admin/superslider-milkbox-ui.php';
		} 
		
		function milk_admin_pages(){
			if( function_exists('add_options_page') ) {
				if( current_user_can('manage_options') ) {
					add_options_page(__('Superslider-Milkbox'),__('SuperSlider-Milkbox'), 8, 'Superslider-Milkbox', array(&$this, 'milk_ui'));
					add_filter('plugin_action_links', array(&$this, 'filter_plugin_milk'), 10, 2 );	
					add_action('admin_head', array(&$this,'ssbox_admin_style'));
				}					
			}
		}
		/**
		* format an array output for testing
		*/
		function print_format_array($array_name) { 
			echo 'this array contains: ';
	 		 echo '<pre>'; 
	  		ksort($array_name); 
	  		print_r($array_name); 
	  		echo '</pre>'; 
	  		echo '--- end array listing ----';
		} 
		
		/**
		* Add link to options page from plugin list.
		*/
		function filter_plugin_milk($links, $file) {
			 static $this_plugin;
				if( ! $this_plugin ) $this_plugin = plugin_basename(__FILE__);
	
			if( $file == $this_plugin )
				$settings_link = '<a href="options-general.php?page=Superslider-Milkbox">'.__('Settings').'</a>';
				array_unshift( $links, $settings_link ); //  before other links
		
			return $links;
		}

		
		/**
		*	remove options from DB upon deactivation
		*/
		function milk_ops_deactivation(){
		
			delete_option($this->optionsName);
		
		}

		/**
		* Called by the action wp_head
		*/
		
		function milkbox_add_javascript(){
			global $atts;
			extract($this->milkOpOut);			
			echo "\t<!-- The following js is part of the Superslider-Milkbox v0.2 plugin available at http://wp-superslider.com/ -->\n";

		if ( $atts['transition'] != '') {
			$resizeTransition = $atts['transition'];
			} else {
			$resizeTransition = $milk_trans_type.':'.$milk_trans_typeinout;	
		}
				
			$mymilkbox = "
			var ssMilk = new Milkbox({
						overlayOpacity: ".$opacity.",
						topPosition: ".$top.",
						initialWidth: ".$width.",
						initialHeight: ".$height.",
						canvasBorderWidth: '".$borderwidth."px',
						canvasBorderColor: '".$bordercolor."',
						canvasPadding: '".$canvaspad."px',
						resizeDuration: ".$duration.",
						resizeTransition:'".$resizeTransition."',
						autoPlay: ".$play.",
						autoPlayDelay: ".$delay.",
						removeTitle: ".$title."
						});";
						
			$milkoutput = "\n\t"."<script type=\"text/javascript\">\n";
			$milkoutput .= "\t"."// <![CDATA[\n";		
			$milkoutput .= "window.addEvent('domready', function() {
						".$mymilkbox."
						});\n";
			$milkoutput .= "\t"."// ]]></script>\n";

			echo $milkoutput;

		}
		

		function milk_change_options($atts){	
			global $atts;
			$this->milkOpOut = array_merge($this->milkOpOut, array_filter($atts));
  			return $this->milkOpOut;

		}
		/**
		* milk_shortcode_out - produces and returns the content to replace the shortcode tag
		*
		* @param array $atts  An array of attributes passed from the shortcode
		* @param string $content   If the shortcode wraps round some html, this will be passed.
		*/
		function milk_shortcode_out( $attr, $content = null) { 
			global $atts;
			$atts = array();
			$atts = $attr;
			if ($atts !=='') $this->milk_change_options($atts);

		}
		
		/**
		* Tells WordPress to load the scripts
		*/
		function milk_add_scripts(){
			global $base_over_ride;
			$js_path = WP_CONTENT_URL . '/plugins/'. plugin_basename(dirname(__FILE__)) . '/js/';

			extract($this->milkOpOut);
			
			if (!is_admin()) {				
						if (function_exists('wp_enqueue_script')) {
						if ($this->base_over_ride != "on") {
							if ($load_moo == 'on'){
								echo "\t<!-- The following javascript is part of the Superslider-Milkbox v0.2 plugin available at http://wp-superslider.com/ -->\n";
								//wp_enqueue_script('moocore', $js_path.'mootools-1.2.1-core-yc.js', NULL , 1.2);		
								//wp_enqueue_script('moomore', $js_path.'mootools-1.2-more.js', array('moocore'), 1.2);
								echo "\t".'<script src="'.$js_path.'mootools-1.2.1-core-yc.js" type="text/javascript"></script> '."\n";
								echo "\t".'<script src="'.$js_path.'mootools-1.2-more.js" type="text/javascript"></script> '."\n";
							}
						}	
								
							//wp_enqueue_script('milkbox', $js_path.'milkbox.js', 'moocore' , 2.0); 
							echo "\t".'<script src="'.$js_path.'milkbox.js" type="text/javascript"></script> '."\n";
						}	
			}
			
		}
		
		/**
		* Adds a link to the stylesheet to the header
		*/
		function milk_add_css() {
		
				extract($this->milkOpOut);

				if (class_exists('ssBase')) {
					extract($this->ssBaseOpOut);					
				}
		
				echo "\t<!-- The following css is part of the Superslider-Milkbox v0.2 plugin available at http://wp-superslider.com/ -->\n";

				if ($css_load == 'default') {
						$cssPath = WP_PLUGIN_URL.'/superslider-milkbox/plugin-data/superslider/ssMilkbox/'.$css_theme.'/'.$css_theme.'.css';
						
						echo "\t"."<link type='text/css' rel='stylesheet' rev='stylesheet' href='".$cssPath."' media='screen' />\n";
						
					} elseif ($css_load == 'pluginData') {
						$cssPath = WP_CONTENT_URL.'/plugin-data/superslider/ssMilkbox/'.$css_theme.'/'.$css_theme.'.css';
						
						echo "\t"."<link type='text/css' rel='stylesheet' rev='stylesheet' href='".$cssPath."' media='screen' />\n";
						
					}elseif ($css_load == 'off') {
						$cssPath = '';
					}
		}
		
        function milkboxrel_replace ($content) {
        		global $post;
        		extract($this->milkOpOut);

        		if ( $auto_milk == 'true'){	
            		$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)><(.*?)title=('|\")(.*?)('|\")(.*?)><\/a>/i";
					$replacement = '<a$1href=$2$3.$4$5 title="$9" rel="milkbox[%LIGHTID%]"$6><$7title=$8$9$10 $11></a>';
					$content = preg_replace($pattern, $replacement, $content);
					$content = str_replace("%LIGHTID%", $post->ID, $content);
					//$content = str_replace("%TITLE%", $title, $content);
					
				}

				return $content;
        }
		
		
		/*
		* Register the shortcode
		*/
		function add_milk_shortcode() {	
				if ( function_exists( 'add_shortcode' ) ){				
						add_shortcode('milkbox', array( &$this , 'milk_shortcode_out' ) );
					}
		}
		
		function milk() {
			
			$this->milkOpOut = get_option($this->optionsName);
			
			register_activation_hook(__FILE__, array(&$this,'milk_init') ); //http://codex.wordpress.org/Function_Reference/register_activation_hook
			register_deactivation_hook( __FILE__, array(&$this,'milk_ops_deactivation') ); //http://codex.wordpress.org/Function_Reference/register_deactivation_hook
			
			add_action ( "init", array(&$this,"milk_init" ) );
			
			add_action ( "admin_menu", array(&$this,"milk_admin_pages"));					
			add_action ( "admin_menu", array(&$this,"milk_print_box")); // adds the shortcode meta box
			
			add_action ( "template_redirect" , array(&$this,"add_milk_shortcode") );
			
			add_action ( "wp_head", array(&$this,"milk_add_scripts"));
			add_action ( "wp_head", array(&$this,"milk_add_css"));
			
			add_action ( "wp_footer", array(&$this,"milkbox_add_javascript"));	
			
			add_filter ( "the_content", array(&$this, "milkboxrel_replace"), 12);

			$milk_is_setup = 'true';
		}
		
		/**
		*	Look ahead to check if any posts contain the [milkbox] shortcode
		*/
		function milk_scan() { 
			global $posts; 			
			if ( !is_array ( $posts ) ) 
					return; 	 
			foreach ( $posts as $mypost ) { 
					if ( false !== strpos ( $mypost->post_content, '[milkbox' ) ) { 

							add_action('wp_print_scripts', array(&$this,'ssShow_add_javascript')); //this loads the mootools scripts.
							
							break; 
					} 	
			} 
		} 
			/**
		*	creates slideshow options tab in media window
		*/	
		function milk_print_box() {
			global $Milk_domain;
			extract($this->milkOpOut);
			if	($milk_shortcode == 'true')	{
				if (is_admin ()) {
					
					if( function_exists( 'add_meta_box' )) {
						add_meta_box( 'ss_milk', __( 'SuperSlider-Milkbox', $Milk_domain ), array(&$this,'milk_writebox'), 'post', 'advanced', 'high');
						add_meta_box( 'ss_milk', __( 'SuperSlider-Milkbox', $Milk_domain ), array(&$this,'milk_writebox'), 'page', 'advanced', 'high' );
						
					}
				}
			}
		}
		
		function ssbox_admin_style(){
			if ($this->base_over_ride != "on") {
				$cssPath = WP_PLUGIN_URL.'/superslider-show/admin/ss_admin_style.css';    			
				echo "\n"."<link type='text/css' rel='stylesheet' rev='stylesheet' href='".$cssPath."' media='screen' />\n";
			}	
		}
		
		function milk_writebox() {			
			include_once 'admin/superslider-milk-box.php';
			echo $box;	
			include_once 'admin/js/superslider-milk-box.js';
		}

    }// end class milk
}// end if class milk

//instantiate the class
if (class_exists('ssMilk')) {
	$myssMilk = new ssMilk();
}
?>