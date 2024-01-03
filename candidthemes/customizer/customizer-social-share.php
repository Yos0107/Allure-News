<?php
/**
 *  Allure News Social Share Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'allure_news_social_share_section', array(
   'priority'       => 87,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Social Share Options', 'allure-news' ),
   'panel'     => 'allure_news_panel',
) );

/*Blog Page Social Share*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-blog-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-blog-sharing'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-blog-sharing]', array(
    'label'     => __( 'Enable Social Sharing', 'allure-news' ),
    'description' => __('Checked to Enable Social Sharing In Home Page,  Search Page and Archive page.', 'allure-news'),
    'section'   => 'allure_news_social_share_section',
    'settings'  => 'allure_news_options[allure-news-enable-blog-sharing]',
    'type'      => 'checkbox',
    'priority'  => 10,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-sharing'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Blog Page', 'allure-news' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_social_share_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Single Page social sharing*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-sharing'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-sharing]', array(
    'label'     => __( 'Social Sharing on Single Post', 'allure-news' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_social_share_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/* Static Front Page social sharing*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-static-page-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-static-page-sharing'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-static-page-sharing]', array(
    'label'     => __( 'Social Sharing on Static Front Page', 'allure-news' ),
    'description' => __('Checked to Enable Social Sharing In static front page.', 'allure-news'),
    'section'   => 'allure_news_social_share_section',
    'settings'  => 'allure_news_options[allure-news-enable-static-page-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );