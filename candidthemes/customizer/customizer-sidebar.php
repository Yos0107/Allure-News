<?php
/**
 *  Allure News Sidebar Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'allure_news_sidebar_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sidebar Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );
/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'allure_news_options[allure-news-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-sidebar-blog-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','allure-news'),
    'left-sidebar'    => __('Left Sidebar','allure-news'),
    'no-sidebar'      => __('No Sidebar','allure-news'),
    'middle-column'   => __('Middle Column','allure-news')
),
   'label'     => __( 'Inner Pages Sidebar', 'allure-news' ),
   'description' => __('This sidebar will work for all Pages', 'allure-news'),
   'section'   => 'allure_news_sidebar_section',
   'settings'  => 'allure_news_options[allure-news-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'allure_news_options[allure-news-sidebar-front-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-sidebar-front-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-sidebar-front-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','allure-news'),
    'left-sidebar'    => __('Left Sidebar','allure-news'),
    'no-sidebar'      => __('No Sidebar','allure-news'),
    'middle-column'   => __('Middle Column','allure-news')
),
   'label'     => __( 'Front Page Sidebar', 'allure-news' ),
   'description' => __('This sidebar will work for Front Page', 'allure-news'),
   'section'   => 'allure_news_sidebar_section',
   'settings'  => 'allure_news_options[allure-news-sidebar-front-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Archive Page Sidebar Layout*/
$wp_customize->add_setting( 'allure_news_options[allure-news-sidebar-archive-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-sidebar-archive-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-sidebar-archive-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','allure-news'),
    'left-sidebar'    => __('Left Sidebar','allure-news'),
    'no-sidebar'      => __('No Sidebar','allure-news'),
    'middle-column'   => __('Middle Column','allure-news')
),
   'label'     => __( 'Archive Page Sidebar', 'allure-news' ),
   'description' => __('This sidebar will work for all Archive Pages', 'allure-news'),
   'section'   => 'allure_news_sidebar_section',
   'settings'  => 'allure_news_options[allure-news-sidebar-archive-page]',
   'type'      => 'select',
   'priority'  => 10,
) );