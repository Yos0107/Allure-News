<?php
/**
 *  Allure News Color Option
 *
 * @since Allure News 1.0.0
 *
 */

$wp_customize->add_panel(
    'colors',
    array(
        'title'    => __( 'Color Options', 'allure-news' ),
        'priority' => 30, // Before Additional CSS.
    )
);
$wp_customize->add_section(
    'colors',
    array(
        'title' => __( 'General Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'allure_news_options[allure-news-site-title-hover]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['allure-news-site-title-hover'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-site-title-hover]',
        array(
            'label'       => esc_html__( 'Site Title Hover Color', 'allure-news' ),
            'description' => esc_html__( 'It will change the color of site title in hover.', 'allure-news' ),
            'section'     => 'colors',
             'settings'  => 'allure_news_options[allure-news-site-title-hover]',
        )
    )
);

/* Site tagline color */
$wp_customize->add_setting( 'allure_news_options[allure-news-site-tagline]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['allure-news-site-tagline'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-site-tagline]',
        array(
            'label'       => esc_html__( 'Site Tagline Color', 'allure-news' ),
            'description' => esc_html__( 'It will change the color of site tagline color.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['allure-news-primary-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-primary-color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'allure-news' ),
            'description' => esc_html__( 'Applied to main color of site.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);
/* Logo Section Colors */

$wp_customize->add_section(
    'logo_colors',
    array(
        'title' => __( 'Logo Section Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Colors background the logo */
$wp_customize->add_setting( 'allure_news_options[allure-news-logo-section-background]',
    array(
        'default'           => $default['allure-news-logo-section-background'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-logo-section-background]',
        array(
            'label'       => esc_html__( 'Background Color', 'allure-news' ),
            'description' => esc_html__( 'Will change the color of background logo.', 'allure-news' ),
            'section'     => 'logo_colors',
        )
    )
);