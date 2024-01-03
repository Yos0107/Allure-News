<?php
/**
 *  Allure News Footer Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'allure_news_footer_section', array(
   'priority'       => 85,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'allure-news' ),
    'description' => __('Enter your own copyright text.', 'allure-news'),
    'section'   => 'allure_news_footer_section',
    'settings'  => 'allure_news_options[allure-news-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'allure_news_options[allure-news-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-go-to-top'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'allure-news' ),
    'description' => __('Checked to Enable Go to Top', 'allure-news'),
    'section'   => 'allure_news_footer_section',
    'settings'  => 'allure_news_options[allure-news-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );