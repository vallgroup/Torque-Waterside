<?php

require_once( get_stylesheet_directory() . '/api/torque-waterside-rest-controller-class.php');
require_once( get_stylesheet_directory() . '/includes/waterside-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/widgets/waterside-child-widgets-class.php');
require_once( get_stylesheet_directory() . '/includes/customizer/waterside-child-customizer-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/waterside-child-acf-class.php');
require_once( get_stylesheet_directory() . '/includes/torque-jetpack-form/torque-jetpack-form-class.php' );
require_once( get_stylesheet_directory() . '/includes/torque-jetpack-form/torque-jetpack-form-fields-class.php' );

if ( class_exists( 'Torque_Waterside_REST_Controller' ) ) {
  new Torque_Waterside_REST_Controller();
}

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
    // Hook into Jetpackfilters when WP loads, without instantiating the entire class
    Torque_Jetpack_Form::register_redirect_filter();
    Torque_Jetpack_Form::register_req_label_filter();
    // add_filter( 'jetpack_development_mode', '__return_true' );
    add_filter( 'jetpack_is_staging_site', '__return_true' );
 }

 /**
  * Floorplan Settings
  */
if ( class_exists( 'Torque_Floor_Plan_CPT' ) ) {
  register_taxonomy(
    'floor_plan_cat',
    'floor_plan',
    array(
      'show_in_rest' => true,
      'hierarchical' => true,
    )
  );
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


add_action( 'wp_head', 'waterside_head_output' );
function waterside_head_output() { ?>
  <!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		 if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		 n.queue=[];t=b.createElement(e);t.async=!0;
		 t.src=v;s=b.getElementsByTagName(e)[0];
		 s.parentNode.insertBefore(t,s)}(window, document,'script',
										 'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '332649404637194');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=332649404637194&ev=PageView&noscript=1"
				   /></noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Mailchimp Code -->
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/5cb351ec3204e9c5b7d7b2fe9/847ccf68a5bfa9616740b0389.js");</script>
	<!-- End Mailchimp Code -->
<?php }


function torque_customize_register( $wp_customize ) {

  $wp_customize->add_setting( 'disable_custom_css', array(
    'type' => 'theme_mod', // or 'option'
    'capability' => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
    'default' => '',
    'transport' => 'postMessage', // refresh or postMessage
    'sanitize_callback' => '',
    'sanitize_js_callback' => '', // Basically to_json.
  ) );

  $wp_customize->add_control( 'disable_custom_css', array(
    'type' => 'checkbox',
    'priority' => 1, // Within the section.
    'section' => 'custom_css', // Required, core or custom.
    'label' => __( 'Disable CSS' ),
    'input_attrs' => array(
      'class' => 'disable-customizer-css',
    ),
    // 'active_callback' => 'callback_single',
  ) );

  /* JS API
  wp.customize( 'disable_custom_css', function( value ) {
    value.bind( function( newval ) {
        console.log( 'newval', newval );
        disableCustomCss
    } );
  } );
  */
}
add_action( 'customize_register', 'torque_customize_register' );

/**
 * output dialog modal on the footer
 */
function waterside_footer_output() {
  ?>
  <div id="waterside-modal" class="waterside-modal">
    <div class="waterside-modal-inner">
      <a href="#" id="waterside-modal-close">x</a>
      <div class="ws-floorplan-cta-form">
        <div class="ws-floorplan-cta-form--header">
          <img src="http://watersideeastlake.com/wp-content/uploads/2021/01/waterside.png" alt="waterside logo">
        </div>
        <div class="ws-floorplan-cta-form--body">
          <div class="ws-floorplan-cta-form--copy">
            <p>Get our downloadable Floor Plan Guide to compare and contrast all layout options. Where should we send this?</p>
          </div>

          <form id="ws-floorplan-cta-form" class="ws-floorplan-cta-form--form" action="" method="post">
            <div class="ws-floorplan-cta-form--field">
              <label for="name">
                <input type="text" id="name" name="name" value="" placeholder="name">
              </label>
            </div>

            <div class="ws-floorplan-cta-form--field">
              <label for="email">
                <input type="email" id="email" name="email" value="" placeholder="email address">
              </label>
            </div>

            <button type="submit" name="submit">Send My Way</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
}
add_action( 'wp_footer', 'waterside_footer_output' );

?>
