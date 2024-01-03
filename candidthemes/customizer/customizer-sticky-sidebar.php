<?php
/**
 *  Allure News Sticky Sidebar Option
 *
 * @since Allure News 1.0.0
 *
 */

/*Sticky Sidebar*/
$wp_customize->add_section( 'allure_news_sticky_sidebar', array(
    'priority'       => 76,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sticky Sidebar', 'allure-news' ),
    'panel' 		 => 'allure_news_panel',
) );
/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-sticky-sidebar'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'allure-news' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'allure-news'),
    'section'   => 'allure_news_sticky_sidebar',
    'settings'  => 'allure_news_options[allure-news-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );