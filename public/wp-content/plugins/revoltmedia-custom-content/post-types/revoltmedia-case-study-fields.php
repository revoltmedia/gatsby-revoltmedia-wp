<?php

/**
 * Add ACF fields.
 */
if( function_exists('acf_add_local_field_group') ):

    /**
     * Add ACF Field group for case_study content to case_study post type.
     */
    acf_add_local_field_group(
        array(
            'key' => 'group_case_study',
            'title' => 'Case Study Content',
            'location' => array(
                array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'rm-case-study',
                ),
                ),
            ),
            'menu_order' => 10,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => 1,
            'description' => 'Content fields augmenting Case Studies.',
            'fields' => array(
                array(
                    'key' => 'case_study_featured',
                    // 'label' => 'Featured Case Study',
                    'name' => 'case_study_featured',
                    'type' => 'checkbox',
                    // 'instructions' => 'Check if the link is a featured Case Study.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'featured'	=> 'Featured Case Study'
                    ),
                    'layout' => 'horizontal',
                    'allow_custom' => false,
                    'save_custom' => false,
                    'toggle' => false,
                    'return_format' => 'value',
                ), // case_study_featured
                array(
                    'key' => 'case_study_logo',
                    'label' => 'Logo',
                    'name' => 'case_study_logo',
                    'type' => 'image',
                    'instructions' => 'Images related to this case study.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'uploadedTo',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ), // case_study_logo
                array(
                    'key' => 'case_study_gallery',
                    'label' => 'Images',
                    'name' => 'case_study_gallery',
                    'type' => 'gallery',
                    'instructions' => 'Images related to this case study.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'min' => 0,
                    'max' => 0,
                    'preview_size' => 'thumbnail',
                    'library' => 'uploadedTo',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 0,
                    'max_height' => 0,
                    'max_size' => 0,
                    'mime_types' => '',
                ), // case_study_gallery
            ) // distributor => fields
        ) // distributor
    ); //acf_add_local_field_group

endif;
