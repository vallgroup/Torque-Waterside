<?php
/**
 * Template: Map Section
 */

if ( $map_id ) { ?>
<section class="map-section">
  <?php // Torque Map
  $shortcode = '[torque_map';
  $shortcode .= ' map_id="' . $map_id . '"';
  $shortcode .= ']';
  echo do_shortcode( $shortcode ); ?>
</section>
<?php } ?>