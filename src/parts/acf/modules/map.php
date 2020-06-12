<?php
/**
 * Content Module Template: Map
 */
?>

<section class="map-container <?php //echo $background_color ?>">
  
  <div class="row-container">

    <div class="content-container">

      <?php if ( $map_id ) { ?>
        <div class="map-wrapper">
          <?php // Torque Map
          $shortcode = '[torque_map';
          $shortcode .= ' map_id="' . $map_id . '"';
          $shortcode .= ']';
          echo do_shortcode( $shortcode ); ?>
        </div>
      <?php } ?>

    </div>

  </div>

</section>