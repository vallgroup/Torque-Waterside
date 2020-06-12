<?php
/**
 * Content Module Template: Contact Form
 */
?>

<section class="contact-container">
  
  <div class="row-container">

    <div class="content-container">

      <?php if ( $content ) { ?>
        <div class="content"><?php echo $content; ?></div>
      <?php } ?>

      <h3>Contact</h3>
          
      <?php if ( $waterside_address ) { ?>
        <div class="location-info">
          <a 
            href="https://maps.google.com/?q=<?php echo urlencode( strip_tags( $waterside_address ) ); ?>" 
            target="_blank"
            rel="noopener noreferrer"
          >
            <?php echo $waterside_address; ?>
          </a>
        </div>
      <?php } ?>
      
      <?php if ( $waterside_phone ) { ?>
        <div class="contact-info">
          <span><?php echo $waterside_phone; ?></span>
        </div>
      <?php } ?>
      <?php if ( $waterside_email ) { ?>
        <div class="contact-info">
          <span><?php echo $waterside_email; ?></span>
        </div>
      <?php } ?>

    </div>

    <?php if ( 
      class_exists( 'Torque_Jetpack_Form' ) &&
      class_exists( 'Torque_Jetpack_Form_Fields' )
    ) {
      $torque_jetpack_form = new Torque_Jetpack_Form();
    } ?>

  </div>

</section>