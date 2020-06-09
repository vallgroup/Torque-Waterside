<?php
/**
 * Content Module Template: CTA Banner
 */
?>

<div class="cta-banner-container">
  
<div class="row-container
    <?php echo $alignment; ?>
  ">

    <div class="content-container">

      <?php if ( $title ) { ?>
        <h2><?php echo $title; ?></h2>
      <?php } ?>
        
      <?php if ( $cta ) { ?>
        <div class="cta-wrapper">
          <a class="cta-btn" href="<?php echo $cta['url']; ?>"><?php echo $cta['title']; ?></a>
        </div>
      <?php } ?>

    </div>

  </div>

</div>