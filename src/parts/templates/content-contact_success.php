<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Torque
 */

// data
$tagline = get_field( 'tagline' );
$content = get_field( 'content' );

?>

<div class="content-contact-success" >

  <div class="graphic-container"></div>

  <h1><?php echo the_title(); ?></h1>

  <?php if ( $tagline ) { ?>
    <div class="tagline"><?php echo $tagline; ?></div>
  <?php } ?>

  <?php if ( $content ) { ?>
    <div class="content"><?php echo $content; ?></div>
  <?php } ?>
</div>
