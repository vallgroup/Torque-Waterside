<?php

require_once( get_stylesheet_directory() . '/includes/waterside-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/widgets/waterside-child-widgets-class.php');
require_once( get_stylesheet_directory() . '/includes/customizer/waterside-child-customizer-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/waterside-child-acf-class.php');

/**
 * Child Theme Nav Menus
 */

 if ( class_exists( 'Waterside_Nav_Menus' ) ) {
   new Waterside_Nav_Menus();
 }

/**
 * Child Theme Widgets
 */

if ( class_exists( 'Waterside_Widgets' ) ) {
  new Waterside_Widgets();
}

/**
 * Child Theme Customizer
 */

if ( class_exists( 'Waterside_Customizer' ) ) {
  new Waterside_Customizer();
}

/**
 * Child Theme ACF
 */

 if ( class_exists( 'Waterside_ACF' ) ) {
   new Waterside_ACF();
 }

 /**
  * Filtered Loop plugin settings
  */
 
 if ( class_exists( 'Torque_Filtered_Loop' ) && class_exists( 'Torque_Filtered_Loop_Shortcode' ) ) {
   add_filter( Torque_Filtered_Loop_Shortcode::$LOOP_TEMPLATE_FILTER_HANDLE, function() { return "3"; } );
 }

 /**
  * Map Settings
  */
 if ( class_exists( 'Torque_Map_Controller' ) ) {
    add_filter( Torque_Map_Controller::$DISPLAY_POIS_FILTER , function() { return false; });
    add_filter( Torque_Map_Controller::$API_KEY_FILTER , function() { 
      return get_field( 'google_maps_api_key', 'option' );
    });
    add_filter( Torque_Map_Controller::$POIS_LOCATION, function( $n ) {
    return 'top';
  } );
  add_filter( Torque_Map_Controller::$DISPLAY_POIS_FILTER, function( $n ) {
    return true;
  } );
 }
 if ( class_exists( 'Torque_Map_CPT' ) ) {
    add_filter( Torque_Map_CPT::$POIS_ALLOWED_FILTER, function( $n ) {
      return 5;
    } );
    // add_filter( Torque_Map_CPT::$POIS_MANUAL_FILTER, function( $n ) {
    //   return true;
    // } );
 }

 /**
  * Jetpack filters, for local/staging use
  */
  if ( class_exists( 'Torque_Jetpack_Form' ) ) {
    // Hook into Jetpack's form redirect filter when WP loads, without instantiating the entire class
    Torque_Jetpack_Form::register_redirect_filter();
    // add_filter( 'jetpack_development_mode', '__return_true' );
    add_filter( 'jetpack_is_staging_site', '__return_true' );
 }

/**
 * Admin settings
 */

 // remove menu items
 function torque_remove_menus(){

   //remove_menu_page( 'index.php' );                  //Dashboard
   //remove_menu_page( 'edit.php' );                   //Posts
   //remove_menu_page( 'upload.php' );                 //Media
   //remove_menu_page( 'edit.php?post_type=page' );    //Pages
   //remove_menu_page( 'edit-comments.php' );          //Comments
   //remove_menu_page( 'themes.php' );                 //Appearance
   //remove_menu_page( 'plugins.php' );                //Plugins
   //remove_menu_page( 'users.php' );                  //Users
   //remove_menu_page( 'tools.php' );                  //Tools
   //remove_menu_page( 'options-general.php' );        //Settings

 }
 add_action( 'admin_menu', 'torque_remove_menus' );


// /**
//  * Remove the additional CSS section, introduced in 4.7, from the Customizer.
//  * @param $wp_customize WP_Customize_Manager
//  */
// function torque_remove_css_section( $wp_customize ) {
// 	$wp_customize->remove_section( 'custom_css' );
// }
// add_action( 'customize_register', 'torque_remove_css_section', 15 );


/**
 * Enqueues
 */

// enqueue child styles after parent styles, both style.css and main.css
// so child styles always get priority
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_styles' );
function torque_enqueue_child_styles() {

    $parent_style = 'parent-styles';
    $parent_main_style = 'torque-theme-styles';

    // make sure parent styles enqueued first
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_main_style, get_template_directory_uri() . '/bundles/main.css' );

    // enqueue child style
    wp_enqueue_style( 'waterside-child-styles',
        get_stylesheet_directory_uri() . '/bundles/main.css',
        array( $parent_style, $parent_main_style ),
        wp_get_theme()->get('Version')
    );
}

// enqueue child scripts after parent script
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_scripts');
function torque_enqueue_child_scripts() {

    wp_enqueue_script( 'waterside-child-script',
        get_stylesheet_directory_uri() . '/bundles/bundle.js',
        array( 'torque-theme-scripts' ), // depends on parent script
        wp_get_theme()->get('Version'),
        true       // put it in the footer
    );
}

?>
