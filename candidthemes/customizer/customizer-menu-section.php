<?php
/**
 *  Allure News Menu Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Menu Options*/
$wp_customize->add_section( 'allure_news_primary_menu_section', array(
   'priority'       => 25,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Menu Section Options', 'allure-news' ),
   'panel'     => 'allure_news_panel',
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-sticky-primary-menu]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-sticky-primary-menu'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-sticky-primary-menu]', array(
   'label'     => __( 'Enable Primary Menu Sticky', 'allure-news' ),
   'description' => __('The main primary menu will be sticky.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-sticky-primary-menu]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-menu-section-search]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-menu-section-search'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-menu-section-search]', array(
   'label'     => __( 'Enable Search Icons', 'allure-news' ),
   'description' => __('You can show the search field in header.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-menu-section-search]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Home Icons In Menu*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-menu-home-icon]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-menu-home-icon'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-menu-home-icon]', array(
   'label'     => __( 'Enable Home Icons', 'allure-news' ),
   'description' => __('Home Icon will displayed in menu.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-menu-home-icon]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );