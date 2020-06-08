<?php

require_once( get_template_directory() . '/includes/acf/torque-acf-search-class.php' );

class Waterside_ACF {

  public function __construct() {
    add_action('admin_init', array( $this, 'acf_admin_init'), 99);
    add_action('acf/init', array( $this, 'acf_init' ) );

    // hide acf in admin - client doesnt need to see this
    // add_filter('acf/settings/show_admin', '__return_false');

    // add acf fields to wp search
    if ( class_exists( 'Torque_ACF_Search' ) ) {
      add_filter( Torque_ACF_Search::$ACF_SEARCHABLE_FIELDS_FILTER_HANDLE, array( $this, 'add_fields_to_search' ) );
    }
  }

  public function acf_admin_init() {
    // hide options page
    // remove_menu_page('acf-options');
  }

  public function add_fields_to_search( $fields ) {
    // $fields[] = 'custom_field_name';
    return $fields;
  }

  public function acf_init() {
    // start content sections
    
    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array(
        'key' => 'group_5ede111016767',
        'title' => 'Page Hero',
        'fields' => array(
          array(
            'key' => 'field_5ede11a94cf15',
            'label' => 'Enable Hero?',
            'name' => 'enable_hero',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '50',
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
          ),
          array(
            'key' => 'field_5ede11cf4cf16',
            'label' => 'Media',
            'name' => 'media',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11a94cf15',
                  'operator' => '==',
                  'value' => '1',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '50',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'image' => 'Image',
              'video-external' => 'Video (External)',
              'video-internal' => 'Video (Internal)',
            ),
            'default_value' => array(
              0 => 'image',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5ede11fb4cf17',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'image',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5ede12284cf18',
            'label' => 'Video (External)',
            'name' => 'video_external',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-external',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5ede13054cf19',
            'label' => 'Video (Internal)',
            'name' => 'video_internal',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-internal',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => 'mp4',
          ),
          array(
            'key' => 'field_5ede14dfece0e',
            'label' => 'Autoplay Video?',
            'name' => 'autoplay_video',
            'type' => 'true_false',
            'instructions' => 'Attempt to autoplay the video. Note that due to browser restrictions this option will mute the video.',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-external',
                ),
              ),
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-internal',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '50',
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
          ),
          array(
            'key' => 'field_5ede1454ece0d',
            'label' => 'Loop Video?',
            'name' => 'loop_video',
            'type' => 'true_false',
            'instructions' => 'Attempt to loop the video',
            'required' => 0,
            'conditional_logic' => array(
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-external',
                ),
              ),
              array(
                array(
                  'field' => 'field_5ede11cf4cf16',
                  'operator' => '==',
                  'value' => 'video-internal',
                ),
              ),
            ),
            'wrapper' => array(
              'width' => '50',
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
      acf_add_local_field_group(array(
        'key' => 'group_5ed86b836b714',
        'title' => 'Waterside Options',
        'fields' => array(
          array(
            'key' => 'field_5ed86b890c78e',
            'label' => 'Contact Info',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5ed86bf20c78f',
            'label' => 'Address',
            'name' => 'address',
            'type' => 'text',
            'instructions' => 'Use the &lt;br&gt; tag to insert a line-break.',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ed86c0b0c790',
            'label' => 'Phone',
            'name' => 'phone',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ed86c110c791',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ed8799b14a6f',
            'label' => 'Footer',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5ed879b614a70',
            'label' => 'Alternate Logo',
            'name' => 'alternate_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
          ),
          array(
            'key' => 'field_5ed87b047c796',
            'label' => 'Social Media',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
          ),
          array(
            'key' => 'field_5ed87b217c797',
            'label' => 'Social Channels',
            'name' => 'social_channels',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'collapsed' => '',
            'sub_fields' => array(
              array(
                'key' => 'field_5ed87b3a38394',
                'label' => 'Icon',
                'name' => 'icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '40',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5ed87b6138395',
                'label' => 'URL',
                'name' => 'url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '60',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'acf-options',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
      acf_add_local_field_group(array(
        'key' => 'group_5edde2f4c53e3',
        'title' => 'Content Modules',
        'fields' => array(
          array(
            'key' => 'field_5edde316fa054',
            'label' => 'Content Modules',
            'name' => 'content_modules',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'layouts' => array(
              '5edde31c428fd' => array(
                'key' => '5edde31c428fd',
                'name' => 'image_title_text_cta',
                'label' => 'Image, Title, Text & CTA',
                'display' => 'block',
                'sub_fields' => array(
                  array(
                    'key' => 'field_5edde5804a501',
                    'label' => 'Alignment',
                    'name' => 'alignment',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '50',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array(
                      'align-image-left' => 'Image left, content right',
                      'align-image-right' => 'Content left, image right',
                    ),
                    'default_value' => array(
                      0 => 'align-image-left',
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                  ),
                  array(
                    'key' => 'field_5edde466d7631',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '50',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                  ),
                  array(
                    'key' => 'field_5edde498d7632',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '50',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                  ),
                  array(
                    'key' => 'field_5edde4a6d7633',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '50',
                      'class' => '',
                      'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                  ),
                  array(
                    'key' => 'field_5edde4d9d7634',
                    'label' => 'CTA',
                    'name' => 'cta',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                      'width' => '100',
                      'class' => '',
                      'id' => '',
                    ),
                    'return_format' => 'array',
                  ),
                ),
                'min' => '',
                'max' => '',
              ),
            ),
            'button_label' => 'Add Content Module',
            'min' => '',
            'max' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            ),
          ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));
      
      endif;
    
    // start content sections
  }
}

?>
