<?php 
/**
 *  Allure News Additional Settings Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'allure_news_extra_options', array(
    'priority'       => 75,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Extra Options', 'allure-news' ),
    'panel'          => 'allure_news_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-preloader]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-preloader'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-preloader]', array(
    'label'     => __( 'Enable Preloader', 'allure-news' ),
    'description' => __( 'It will enable the preloader on the website.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-preloader]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Home Page Content*/
$wp_customize->add_setting( 'allure_news_options[allure-news-front-page-content]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-front-page-content'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-front-page-content]', array(
    'label'     => __( 'Hide Front Page Content', 'allure-news' ),
    'description' => __( 'Checked to hide the front page content from front page.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-front-page-content]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Hide Post Format Icons*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-post-formats-icons]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-post-formats-icons'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-post-formats-icons]', array(
    'label'     => __( 'Hide Post Formats Icons', 'allure-news' ),
    'description' => __( 'Icons like camera, photo, video, audio will hide.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-post-formats-icons]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );


/*Hide Read More Time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-hide-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-hide-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-hide-read-time]', array(
    'label'     => __( 'Hide Reading Time', 'allure-news' ),
    'description' => __( 'You can hide the reading time in whole site.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-hide-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Font awesome version loading*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-awesome-version-loading]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-awesome-version-loading'],
    'sanitize_callback' => 'allure_news_sanitize_select'
 ) );
 $wp_customize->add_control( 'allure_news_options[allure-news-font-awesome-version-loading]', array(
   'choices' => array(
    'version-4'    => __('Current Theme Used Version 4','allure-news'),
    'version-5'   => __('Fontawesome Version 5','allure-news'),
    'version-6'   => __('New Fontawesome Version 6','allure-news'),
 ),
   'label'     => __( 'Select the preferred fontawesome version', 'allure-news' ),
   'description' => __('You can select the latest fontawesome version to get more options for icons', 'allure-news'),
   'section'   => 'allure_news_extra_options',
   'settings'  => 'allure_news_options[allure-news-font-awesome-version-loading]',
   'type'      => 'select',
   'priority'  => 15,
 ) );