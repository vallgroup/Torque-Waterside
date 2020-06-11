<?php

$modules = 'content_modules';
$modules_path = '/parts/acf/modules/';

// allowable tags
$allowable_title_tags = '<i><b><em><strong>';
$allowable_tagline_tags = '<blockquote><a><ul><ol><li><i><b><em><strong><p><br><table><tbody><thead><td><tr>';
$allowable_content_tags = '<blockquote><a><ul><ol><li><i><b><em><strong><p><br><table><tbody><thead><td><tr><img>';

if ( have_rows( $modules ) ) :

  while ( have_rows( $modules ) ) : the_row();

    switch ( get_row_layout() ) {

      case 'content_spacer' :

        // options
        $spacer_height = get_sub_field( 'spacer_height' );
        $spacer_measurement = get_sub_field( 'spacer_measurement' );
        $visibility = get_sub_field( 'visibility' );

        include locate_template( $modules_path . 'content-spacer.php' );

        break;

      case 'image_title_text_cta' :

        // options
        $alignment  = get_sub_field( 'alignment' );
        $image      = get_sub_field( 'image' );
        $title      = get_sub_field( 'title' );
        $text       = get_sub_field( 'text' );
        $cta        = get_sub_field( 'cta' );

        include locate_template( $modules_path . 'image-title-text-cta.php' );

        break;

      case 'cta_banner' :

        // options
        $title      = get_sub_field( 'title' );
        $cta        = get_sub_field( 'cta' );

        include locate_template( $modules_path . 'cta-banner.php' );

        break;

      case 'title_text' :

        // options
        $column_arrangement = get_sub_field( 'column_arrangement' );
        $background_color   = get_sub_field( 'background_color' );
        $title              = get_sub_field( 'title' );
        $title_color        = get_sub_field( 'title_color' );
        $text               = get_sub_field( 'text' );
        $column_one_text    = get_sub_field( 'column_one_text' );
        $column_two_text    = get_sub_field( 'column_two_text' );

        include locate_template( $modules_path . 'title-text.php' );

        break;

      case 'single_media' :

        // options
        $media          = get_sub_field( 'media' );
        $image          = get_sub_field( 'image' );
        $video_external = get_sub_field( 'video_external' );
        $video_internal = get_sub_field( 'video_internal' );

        include locate_template( $modules_path . 'single-media.php' );

        break;

      case 'floorplans' :

        // options
        // $media          = get_sub_field( 'media' );
        // $image          = get_sub_field( 'image' );
        // $video_external = get_sub_field( 'video_external' );
        // $video_internal = get_sub_field( 'video_internal' );

        include locate_template( $modules_path . 'floorplans.php' );

        break;

      case 'map' :

        // options
        // $media          = get_sub_field( 'media' );
        // $image          = get_sub_field( 'image' );
        // $video_external = get_sub_field( 'video_external' );
        // $video_internal = get_sub_field( 'video_internal' );

        include locate_template( $modules_path . 'map.php' );

        break;

    }

  endwhile;
endif;

?>
