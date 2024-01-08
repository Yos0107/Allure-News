<?php
/**
 *  Allure News Typography Option
 *
 *
 */
$wp_customize->add_panel( 'allure_news_typography', array(
    'priority' => 30,
    'capability' => 'edit_theme_options',
    'title' => __( 'Fonts Options', 'allure-news' ),
) );

/*
* Font and Typography Options
* Paragraph Option Section
* 
*/
$wp_customize->add_section( 'allure_news_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Paragraph Font', 'allure-news' ),
   'panel' 		 => 'allure_news_typography',
) );
/*Paragraph Font Family*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-family-url]', array(
    'label'     => __( 'Body Paragraph Font Family', 'allure-news' ),
    'description' =>__( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_font_options',
    'settings'  => 'allure_news_options[allure-news-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );

/*
* Heading Fonts Options
* Heading Font Option Section
* 
*/

/*Heading Fonts*/
$wp_customize->add_section( 'allure_news_heading_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading Font Family', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-heading-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-heading-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-heading-family-url]', array(
    'label'     => __( 'Select Heading Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown(H1-H6).', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_heading_font_options',
    'settings'  => 'allure_news_options[allure-news-font-heading-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );


