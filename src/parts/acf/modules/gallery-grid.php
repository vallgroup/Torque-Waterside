<?php
/**
 * Used to render all images from a given gallery, in a pre-defined masonry grid layout
 */

if ( have_rows('images') ) {

  // open container ?>
  <section class="gallery-container">
    <div class="row gallery-module" >
      <div class="gallery-grid-root grid-rows-<?php echo $num_rows; ?>"><?php

        while ( have_rows('images') ) { the_row();

          $image = get_sub_field('image');

          $caption = $image['caption'];
          $src = $image['url'];

          $iframe_src_url = get_sub_field('iframe_src_url');

          $col_start = get_sub_field('column_start');
          $col_end = get_sub_field('column_end');
          $row_start = get_sub_field('row_start');
          $row_end = get_sub_field('row_end');
          $width = intval($col_end) - intval($col_start);
          $height = intval($row_end) - intval($row_start);

          ?>

          <div class="
            grid-image
            grid-column-<?php echo $col_start; ?>-<?php echo $width; ?>
            grid-row-<?php echo $row_start; ?>-<?php echo $height; ?>
            grid-width-<?php echo $width; ?>
            grid-height-<?php echo $height; ?>
          ">

            <div class="grid-image-container" style="background-image: url('<?php echo $src; ?>')">

              <?php if ( $caption ) { ?>
                <div class="caption-overlay">
                  <?php echo $caption; ?>
                </div>
              <?php } ?>
            
            </div>

          </div>

          <?php
        }

      // close container ?>
      </div>
    </div>
  </section><?php

}
