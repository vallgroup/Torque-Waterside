<?php 
/**
 * Outputs the social icons for Waterside
 */
?>

<?php if ( have_rows( 'social_channels', 'option' ) ) : ?> 
<div class="social-icons">
  <?php while ( have_rows( 'social_channels', 'option' ) ) : the_row();
    // get data
    $url = get_sub_field( 'url' );
    $icon = get_sub_field( 'icon' );
  ?>
    <a 
      href="<?php echo strip_tags( $url ); ?>"
      class="social-icon">
      <img 
        src="<?php echo $icon; ?>"
        alt="Social Icon"
      />
    </a>
  <?php endwhile; ?>
</div>
<?php endif; ?>
