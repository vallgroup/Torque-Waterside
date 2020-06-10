<?php
/**
 * Content Module Template: Title & Text
 */
?>

<div class="title-text-container <?php echo $background_color ?>">
  
<div class="row-container">

    <div class="content-container">

      <?php if ( $title ) { ?>
        <h3 class="title-color-<?php echo $title_color; ?>"><?php echo $title; ?></h3>
      <?php } ?>
        
      <?php if ( 'one' === $column_arrangement ) { ?>
        <?php if ( $text ) { ?>
          <div class="text-wrapper">
            <div><?php echo $text; ?></div>
          </div>
        <?php } ?>
      <?php } elseif ( 'two' === $column_arrangement ) { ?>
        <div class="two-cols-container">
          <?php if ( $column_one_text ) { ?>
            <div class="text-wrapper col-one">
              <div><?php echo $column_one_text; ?></div>
            </div>
          <?php } ?>
          <?php if ( $column_two_text ) { ?>
            <div class="text-wrapper col-two">
              <div><?php echo $column_two_text; ?></div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
        

    </div>

  </div>

</div>