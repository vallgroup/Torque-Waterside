<?php
/**
 * Template part for displaying page hero
 *
 * @package Torque
 */

// get data 
$title = esc_html( get_the_title() );
$media = get_field( 'media' );
$image = get_field( 'image' );
$video_external = get_field( 'video_external' );
$video_internal = get_field( 'video_internal' );
$loop_video = get_field( 'loop_video' );
$autoplay_video = get_field( 'autoplay_video' );
?>

<div class="page-hero">

  <div class="type-<?php echo $media; ?>">
    <?php if ( 'image' === $media ) { ?>
      <div class="hero-image" style="background-image: url(<?php echo $image; ?>);" ></div>
    <?php } elseif ( 'video-external' === $media ) { ?>
      <div class="hero-video">
        <iframe
          src="<?php echo $video_external; ?>"
        ></iframe>
      </div>
    <?php } elseif ( 'video-internal' === $media ) { ?>
      <div class="hero-video">
        <!-- TODO:  -->
      </div>
    <?php } ?>
  </div>

  <h1 class="hero-title"><?php echo $title; ?></h1>

</div>
