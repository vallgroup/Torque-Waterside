<?php
/**
 * Content Module Template: Single Media
 */

// setup hero video
$_video_src = '';
$_video_html = '';
$_video_html_start = '';
$_video_html_end = '';
if ( 'video-external' === $media ) {
  // set iframe start/end
  $_video_html_start = '<iframe class="media-video" src="';
  $_video_html_end = '" frameborder="0" allow="autoplay"></iframe>';

  if ( strpos( $video_external, 'vimeo' ) !== false ) {
    // remove trailing slash if found
    $video_external = rtrim( $video_external, '/' );
    // explode by slash
    $_url_parts = explode('/', $video_external);
    // use last element in array as video id, and compose video src string
    $_video_src = 'https://player.vimeo.com/video/'.end( $_url_parts ).'?title=0&byline=0&portrait=0';
    // compose iframe html
    $_video_html = $_video_html_start . $_video_src . $_video_html_end;
  } else  {
    // simple iframe fallback with link provided by user
    $_video_html = $_video_html_start . $video_external . $_video_html_end;
  }
} elseif ( 'video-internal' === $media ) {
  // html5 video element
  // video start/end
  $_video_html_start = '<video class="media-video"><source src="';
  $_video_html_end = '" type="video/mp4"></video>';
  // video source 
  $_video_src = $video_internal['url'];
  // compose iframe html
  $_video_html = $_video_html_start . $_video_src . $_video_html_end;
}
?>

<section class="single-media-container">
  <div class="row-container">
    <div class="content-container type-<?php echo $media; ?>">
      <?php if ( 'image' === $media ) { ?>
        <div class="media-image" style="background-image: url(<?php echo $image; ?>);" ></div>
      <?php } elseif ( 'video-external' === $media || 'video-internal' === $media ) { ?>
        <?php echo $_video_html; ?>
      <?php } ?>
    </div>
  </div>
</section>