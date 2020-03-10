<?php

/**
 * Add ACF fields.
 */
if( function_exists('acf_add_local_field_group') ):

    /**
     * Add ACF Field group for service content to service post type.
     */
    acf_add_local_field_group(
        array(
            'key' => 'group_service',
            'title' => 'Service Content',
            'location' => array(
                array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'rm-service',
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
                    'key' => 'service_icon',
                    'label' => 'Icon',
                    'name' => 'service_icon',
                    'type' => 'image',
                    'instructions' => 'Icon for this service',
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
                ), // service_icon
            ) // distributor => fields
        ) // distributor
    ); //acf_add_local_field_group

endif;
