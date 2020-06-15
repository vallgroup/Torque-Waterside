<?php
/**
 * Template part for displaying page hero
 * Media: image, internal MP4, external YouTube or Vimeo
 *
 * @package Torque
 */

// get data
$enable_hero = get_field( 'enable_hero' );
$container_class = $enable_hero
  ? ''
  : 'no-media';
$media = get_field( 'media' );
// media urls/ids
$image = get_field( 'image' );
$video_external = get_field( 'video_external' );
$video_internal = get_field( 'video_internal' );
// title
$title = get_field( 'title' )
  ? get_field( 'title' )
  : esc_html( get_the_title() );
// video atts
$loop_video = get_field( 'loop_video' )
  ? '1'
  : '0';
$autoplay_video = get_field( 'autoplay_video' )
  ? '1'
  : '0';
// hero mask
$hero_mask = get_field( 'hero_mask' );
$hero_mask_opacity = get_field( 'hero_mask_opacity' )
  ? get_field( 'hero_mask_opacity' )
  : '0';

// setup hero video
$_video_src = '';
$_video_html = '';
$_video_html_start = '';
$_video_html_end = '';
if ( 'video-external' === $media ) {
  // embedded iframe video
  
  // set iframe start/end
  $_video_html_start = '<iframe class="hero-video" src="';
  $_video_html_end = '" frameborder="0" allow="autoplay"></iframe>';

  if ( strpos( $video_external, 'vimeo' ) !== false ) {
    // remove trailing slash if found
    $video_external = rtrim( $video_external, '/' );
    // explode by slash
    $_url_parts = explode('/', $video_external);
    // use last element in array as video id, and compose video src string
    $_video_src = 'https://player.vimeo.com/video/'.end( $_url_parts ).'?title=0&byline=0&portrait=0&autoplay='.$autoplay_video.'&loop='.$loop_video.'&autopause=0&background='.$autoplay_video.'&muted=1';
    // compose iframe html
    $_video_html = $_video_html_start . $_video_src . $_video_html_end;
  } else  {
    // simple iframe fallback with link provided by user
    $_video_html = $_video_html_start . $video_external . $_video_html_end;
  }
} elseif ( 'video-internal' === $media ) {
  // html5 video element
  // setup video atts
  $_controls = '1' === $autoplay_video
    ? ''
    : 'controls';
  $_muted = '1' === $autoplay_video
    ? 'muted'
    : '';
  $_autoplay = '1' === $autoplay_video
    ? 'autoplay'
    : '';
  $_loop = '1' === $loop_video
    ? 'loop'
    : '';
  // video start/end
  $_video_html_start = '<video class="hero-video" '. $_controls .' '. $_autoplay .' '. $_loop .' '. $_muted .'><source src="';
  $_video_html_end = '" type="video/mp4"></video>';
  // video source 
  $_video_src = $video_internal['url'];
  // compose iframe html
  $_video_html = $_video_html_start . $_video_src . $_video_html_end;

}

// setup hero mask, if mask set and video is set to autoplay
$_hero_mask = '';
if ( $hero_mask && '1' === $autoplay_video ) {
  $_hero_mask = '<div class="hero-mask" style="background-color:'. $hero_mask . '; opacity: ' . $hero_mask_opacity . ';"></div>';
}
?>

<div class="page-hero <?php echo $container_class; ?> type-<?php echo $media; ?>">
  <?php if ( $enable_hero ) { ?>
    <div class="type-<?php echo $media; ?>">
      <?php if ( 'image' === $media ) { ?>
        <div class="hero-image" style="background-image: url(<?php echo $image; ?>);" >
          <?php echo $_hero_mask; ?>
        </div>
      <?php } elseif ( 'video-external' === $media ) { ?>
        <?php echo $_video_html; ?>
        <?php echo $_hero_mask; ?>
      <?php } elseif ( 'video-internal' === $media ) { ?>
        <?php echo $_video_html; ?>
        <?php echo $_hero_mask; ?>
      <?php } ?>
    </div>
  <?php } ?>
  <h1 class="hero-title"><?php echo $title; ?></h1>
</div>
