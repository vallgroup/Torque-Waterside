<?php
/**
 * Footer template
 */

// get data
$waterside_address = get_field( 'address', 'option' )
  ? strip_tags( get_field( 'address', 'option' ), '<br>, <p>' ) 
  : null;
$waterside_phone = get_field( 'phone', 'option' )
  ? strip_tags( get_field( 'phone', 'option' ) ) 
  : null;
$waterside_email = get_field( 'email', 'option' )
  ? strip_tags( get_field( 'email', 'option' ) ) 
  : null;
$footer_alt_logo = get_field( 'alternate_logo', 'option' )
  ? strip_tags( get_field( 'alternate_logo', 'option' ) ) 
  : null;

?>

<footer>

  <div class="footer-container">

    <div class="footer-block-one">
      
      <?php get_template_part( 'parts/shared/logo', 'white' ); ?>

      <div class="footer-container-inner">
        <div class="footer-inner-col footer-col-one">
          <h5 class="footer-col-title">Visit</h5>
          <?php if ( $waterside_address ) { ?>
            <div class="location-info">
              <a 
                href="https://maps.google.com/?q=<?php echo urlencode( strip_tags( $waterside_address ) ); ?>" 
                target="_blank"
                rel="noopener noreferrer"
              ><?php echo $waterside_address; ?></a>
            </div>
          <?php } ?>
        </div>

        <div class="footer-inner-col footer-col-two">
          <h5 class="footer-col-title">Contact</h5>
          <?php if ( $waterside_phone ) { ?>
            <div class="location-info">
              <span><?php echo $waterside_phone; ?></span>
            </div>
          <?php } ?>
          <?php if ( $waterside_email ) { ?>
            <div class="location-info">
              <span><?php echo $waterside_email; ?></span>
            </div>
          <?php } ?>
        </div>

        <div class="footer-inner-col footer-col-three">
          <h5 class="footer-col-title">Connect</h5>
          <?php get_template_part( 'parts/shared/social_icons' ); ?>
        </div>
      </div>

    </div>

    <?php if ( $footer_alt_logo ) { ?>
      <div class="footer-block-two">
        <img
          src=<?php echo $footer_alt_logo; ?>
          alt="Logo"
        />
      </div>
    <?php } ?>

  </div>

</footer>