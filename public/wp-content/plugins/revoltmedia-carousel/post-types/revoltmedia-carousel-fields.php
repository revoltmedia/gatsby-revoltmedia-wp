<?php

/**
 * Add ACF fields.
 */
if( function_exists('acf_add_local_field_group') ):

    /**
     * Add ACF Field group for carousel content to carousel post type.
     */
    acf_add_local_field_group(
        array(
            'key' => 'group_carousel',
            'title' => 'Carousel Content',
            'location' => array(
                array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'revoltmedia-carousel',
                ),
                ),
            ),
            'menu_order' => 10,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => 1,
            'description' => 'Content fields augmenting carousel slides.',
            'fields' => array(
                array(
                    'key' => 'carousel_image',
                    'label' => 'Carousel Image',
                    'name' => 'carousel_image',
                    'type' => 'image',
                    'instructions' => 'The icon image that should show in the carousel image.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'return_format' => 'Image ID',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => 'png,jpg,jpeg,svg',
                    'show_in_rest'  => true,
                ),
                array(
                    'key' => 'carousel_link_text',
                    'label' => 'Link Text',
                    'name' => 'carousel_link_text',
                    'type' => 'text',
                    'instructions' => 'Text the slide CTA should use.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'More Info',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ), // carousel_link_text
                array(
                    'key' => 'carousel_link_url',
                    'label' => 'Link URL',
                    'name' => 'carousel_link_url',
                    'type' => 'text',
                    'instructions' => 'URL the slide CTA should link to.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '/link-destination',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ), // carousel_link_url
                array(
                    'key' => 'carousel_link_external',
                    // 'label' => 'Link is External?',
                    'name' => 'carousel_link_external',
                    'type' => 'checkbox',
                    // 'instructions' => 'Check if the link is an external URL.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'external'	=> 'Is this an external link?'
                    ),
                    'layout' => 'horizontal',
                    'allow_custom' => false,
                    'save_custom' => false,
                    'toggle' => false,
                    'return_format' => 'value',
                    'disabled' => 0,
                ), // carousel_link_external
            ) // distributor => fields
        ) // distributor
    ); //acf_add_local_field_group

endif;
