<?php
/**
 * Content Module Template: Title & Text
 */
?>

<div class="title-text-container">
  
<div class="row-container">

    <div class="content-container">

      <?php if ( $title ) { ?>
        <h3 class="title-color-<?php echo $title_color; ?>"><?php echo $title; ?></h3>
      <?php } ?>
        
      <?php if ( $text ) { ?>
        <div class="text-wrapper">
          <p><?php echo $text; ?></p>
        </div>
      <?php } ?>

    </div>

  </div>

</div>