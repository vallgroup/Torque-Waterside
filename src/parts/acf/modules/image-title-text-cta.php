<?php
/**
 * Content Module Template: Image, Title, Text & CTA 
 */
?>

<div class="image-title-text-cta-container">
  
<div class="row-container
    <?php echo $alignment; ?>
  ">

    <div class="content-container">

      <?php if ( $title ) { ?>
        <h3><?php echo $title; ?></h3>
      <?php } ?>

      <?php if ( $text ) { ?>
        <div class="content-wrapper">
          <?php echo $text; ?>
        </div>
      <?php } ?>
        
      <?php if ( $cta ) { ?>
        <div class="cta-wrapper">
          <a class="cta-btn" href="<?php echo $cta['url']; ?>"><?php echo $cta['title']; ?></a>
        </div>
      <?php } ?>

    </div>

    <div class="image-container">

      <?php if ( $image ) { ?>
        <div class="image-wrapper">
          <img src="<?php echo $image['sizes']['large']; ?>"/>
        </div>
      <?php } ?>
      
    </div>

  </div>

</div>