<?php

function revoltmedia_customize_register( $wp_customize ) {
    //Company Name
    $wp_customize->add_setting(
        'revoltmedia_company_name' //give it an ID
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'revoltmedia_company_name',
            array(
                'label'          => __( 'Company Name', 'revoltmedia' ),
                'priority' => '100',
                'section'        => 'title_tagline',
                'settings'       => 'revoltmedia_company_name',
                'type'           => 'text'
            )
        )
    );

    //Header logo svg
    $wp_customize->add_setting(
        'revoltmedia_logo_svg' //give it an ID
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'revoltmedia_custom_logo_svg', array(
        'label' => __( 'Logo (SVG)', 'revoltmedia' ),
        'section' => 'title_tagline',
        'mime_type' => 'image',
        'priority' => '150',
        'description' => 'An SVG version of the logo. Shown in most modern browsers.',
        'settings'   => 'revoltmedia_logo_svg' //pick the setting it applies to
    ) ) );

    //Header logo png
    $wp_customize->add_setting(
        'revoltmedia_logo_png' //give it an ID
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'revoltmedia_custom_logo_png', array(
        'label' => __( 'Logo (PNG)', 'revoltmedia' ),
        'section' => 'title_tagline',
        'mime_type' => 'image',
        'priority' => '160',
        'description' => 'An PNG version of the logo. Used if no SVG logo is provided. Or as a fallback for browsers that don\'t suport SVG.',
        'settings'   => 'revoltmedia_logo_png' //pick the setting it applies to
    ) ) );

}
add_action( 'customize_register', 'revoltmedia_customize_register' );

function revoltmedia_register_my_menus() {
    register_nav_menus(
        array(
        'MENU_1' => __( 'Header Menu' ),
        // 'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'revoltmedia_register_my_menus' );