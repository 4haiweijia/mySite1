<?php 
//================================================
// Include CSS styles and js scripts. 
// Add bootstrap styles and scripts.
//================================================

//Define a function, or hook, which includes the scripts into the generated html
function mytheme_script_enqueue() {
 //bootstrap CSS styles
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3', 'all');
  //my own CSS styles
  wp_enqueue_style('mythemestyle',get_template_directory_uri().'/css/mytheme.css',array(),'0.1','all');
  //jquery script
  wp_enqueue_script('jquery');
  //bootstrap js scripts
	 wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.3', true);
  //my own js scripts
  wp_enqueue_script('mythemejs',get_template_directory_uri().'/js/mytheme.js',array(),'0.1',true);
 }

//Do the include hook at the front end
 add_action('wp_enqueue_scripts', 'mytheme_script_enqueue');

 //A function/hook that includes all the custom things
 // for mytheme.
function mytheme_setup(){
//===============================
//Active menus
//===============================
 add_theme_support('menus');
 register_nav_menu('primary','Primary Header Nav');
 register_nav_menu('secondary','footer Nav');

//===============================
//Theme support
//===============================
 add_theme_support('custom-background');
 add_theme_support('custom-header');
 add_theme_support('post-thumbnails');
 //The names of these post-formats are fixed by WP
 add_theme_support('post-formats',array('aside','image','video')) ;
}

//Do the above hook at the init stage
add_action('init','mytheme_setup');

 /*===============================================
Add sidebar to mytheme, sidebar content has to be
filled by wp-admin in the widget interface of the WP web tool.
=================================================*/
//Hook to register the sidebar
function mytheme_widget_setup(){
 register_sidebar(array(
 'name' =>'Sidebar1',
 'id' => 'sidebar-1',
 'class'=>'custom',
 'description' => 'mytheme side bar 1.',
 'before_widget' => '<li id="%1$s" class="widget %2$s">',
 'after_widget'  => '</li>',
 'before_title'  => '<h2 class="widget-title">',
 'after_title'   => '</h2>',

 ));
}

//Do the hook at the right moment
add_action('widgets_init','mytheme_widget_setup');
