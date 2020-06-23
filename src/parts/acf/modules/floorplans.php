<?php
/**
 * Content Module Template: Floorplans
 */

$dl_all_fps = get_field( 'all_floorplans_file', 'option' );

?>

<section class="floorplans-container <?php //echo $background_color; ?>">
  
  <div class="row-container">

    <div class="content-container">

      <?php 
        if ( class_exists( 'Torque_Floor_Plan_CPT' ) ) {
          $shortcode = '[torque_filtered_loop ';
          $shortcode .= 'post_type="'.Torque_Floor_Plan_CPT::$floor_plan_labels['post_type_name'].'" ';
          $shortcode .= 'posts_per_page="-1" ';
          $shortcode .= 'filters_types="tabs_acf" ';
          $shortcode .= 'filters_args="'.Torque_Floor_Plan_CPT::$FLOORPLAN_CATEGORY_ACF_KEY.'"';
          $shortcode .= ']';
        
          echo do_shortcode($shortcode); 
          
          // show download all link, if set in options
          if ( $dl_all_fps ) { ?>
            <div class="download-all-fps-wrapper">
              <a href="<?php echo $dl_all_fps['url']; ?>" target="_blank">Download All Floorplans</a>
            </div>
          <?php }

        } else {
          echo 'Floorplan CPT not found, contact site admin.';
        }
      ?>

    </div>

  </div>

</section>