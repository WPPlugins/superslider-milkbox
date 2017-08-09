=== SuperSlider-Milkbox ===
Contributors: Daiv Mowbray
Donate link: http://wp-superslider.com/superslider-milkbox
Tags: animated, lightbox, mootools, popover, gallery, imageshow
Requires at least: 2.5
Tested up to: 2.7
Stable tag: 0.2

pop over light box built with Milkbox 2, uses mootools 1.2

== Description ==

 Another pop over light box. Theme based, animated, automatic linking, autoplay slideshow,  built with Milkbox2 , uses mootools 1.2 java script. This plugin is part of the SuperSlider series. Get more supersliders at [supersliders](http://wordpress.org/extend/plugins/superslider/ "SuperSliders")

**Support**

If you have any problems or suggestions regarding this plugin [please speak up](http://support.wp-superslider.com/forum/superslider-show "support forum")

**NOTICE**

* The downloaded folder's name should be superslider-milkbox
* Also available for [download from here](http://wp-superslider.com/superslider-milkbox/superslider-show-download "superslider-milkbox plugin home page").
* Probably not compatible with plugins which use jquery. (not tested)


**Features**

* complete global control from options page
* full short code over ride per post
* Endless image animation/transition possibilities
* Control transition time, image display time.
* Uses WordPress native media / images

##Demos##

This plugin can be seen in use here:

* [Demo 1](http://wp-superslider.com/wp-plugins/superslider-milkbox/milkbox-demo-1 "Demo")
* [Demo 2](http://wp-superslider.com/wp-plugins/superslider-milkbox/milkbox-demo-2 "Demo")
* [Demo 3](http://wp-superslider.com/wp-plugins/superslider-milkbox/milkbox-demo-3 "Demo")
* [Demo 4](http://wp-superslider.com/wp-plugins/superslider-milkbox/milkbox-demo-4 "Demo")

== Screenshots ==

1. ![Milkbox sample](screenshot-1.png "Milkbox sample")
2. ![SuperSlider-Milkbox options screen](screenshot-2.png "SuperSlider-Milkbox options screen")
3. ![SuperSlider-Milkbox MetaBox on post screen](screenshot-3.png "SuperSlider-Milkbox MetaBox screen")

== Installation ==

* Unpack contents to wp-content/plugins/ into a **superslider-milkbox** directory
* Activate the plugin,
* Configure global settings for plugin under > settings > SuperSlider-Milkbox
* Create post/page ,Add WordPress images.
* (optional) add milkbox shortcode to your post.
* (optional) move SuperSlider-Milkbox plugin sub folder plugin-data to your wp-content folder,
	under  > settings > SuperSlider-Milkbox > option group, File Storage - Loading Options
	select "Load css from plugin-data folder, see side note. (Recommended)". This will
	prevent plugin uploads from over writing any css changes you may have made.

== USAGE ==

If you are not sure how this plugin works you may want to read the following.

* First ensure that you have uploaded all of the plugin files into wp-content/plugins/superslider-milkbox folder.
* Go to your WordPress admin panel and stop in to the plugins control page. Activate the SuperSlider-Milk plugin.
* Create a new post, use the WordPress built in media uploader, (upload some images).
* Click on insert image from the media uploader popover panel.
* Publish your new post, click on your image, and your new Milkbox popover should appear.
* Alternatively you can modify how the Milkbox popover works per post by adding a shortcode, either manually or via the Milkbox metabox available on your post screen.


You should be able to view your new Milkbox popover in the new post.
You can adjust how the Milkbox popover looks and works by making adjustments in the plugin settings page. (ss-Milk).

== OPTIONS AND CONFIGURATIONS ==

Available under > settings > SuperSlider-Milkbox

* theme css files to use
* shortcode metabox (on or off for the post / page screens)
* autolink (add rel="milkbox" automatically to images)
* transition type
* transition speed
* display time
* Overlay opacity
* transition time
* image border width
* image border color
* image padding
* to load or not Mootools.js
* css files storage loaction
* **numerous more Advanced design options**

----------
Available in the shortcode tag:

* start height="40"
* start width="20"
* Overlay opacity
* transition="elastic:In:Out"
* image delay="milliseconds"
* transition duration="milliseconds"
* image border width
* image border color
* image padding
* titles="true"



== Themes ==

Create your own graphic and animation theme based on one of these provided.

**Available themes**

* default
* blue
* black
* custom

== To Do ==

* Enqueue javascript files


== Frequently Asked Questions ==	

=  Why isn't my Milkbox working? =

>*You first need to check that your web site page isn't loading more than 1 copy of mootools javascript into the head of your file.
>*While reading the source code of your website files header look to see if another plugin is using jquery. This may cause a javascript conflict. Jquery and mootools are not always compatible.

=  How do I change the style of the Milkbox? =
  
>I recommend that you move the folder plugin-data to your wp-content folder if you already have a plugin-data folder there, just move the superslider folder. Remember to change the css location option in the settings page for this plugin. Or edit directly: **wp-content/plugins/superslider-show/plugin-data/superslider/ssMilk/custom/custom.css** Alternatively, you can copy those rules into your WordPress themes, style file. Then remember to change the css location option in the settings page for this plugin.
  

= The stylesheet doesn't seem to be having any effect? =
 
>Check this url in your browser:
>http://yourblogaddress/wp-content/plugins/superslider-show/plugin-data/superslider/ssMilk/default/default.css
>If you don't see a plaintext file with css style rules, there may be something wrong with your .htaccess file (mod_rewrite). If you don't know how to fix this, you can copy the style rules there into your themes style file.

= How do I use different graphics and symbols for close and next buttons? =

>You can upload your own images to
>http://yourblogaddress/wp-content/plugins/superslider-milkbox/plugin-data/superslider/ssMilk/custom/images


== CAVEAT ==

Currently this plugin relies on Javascript to create the popover.
If a user's browser doesn't support javascript the image will display normally.

== HISTORY ==

* 0.2 (2009/1/15)

    * first public launch

---------------------------------------------------------------------------