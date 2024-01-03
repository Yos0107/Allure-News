<?php
/**
 *  Allure News Slider Featured Section Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Slider Options*/
$wp_customize->add_section( 'allure_news_slider_section', array(
 'priority'       => 25,
 'capability'     => 'edit_theme_options',
 'theme_supports' => '',
 'title'          => __( 'Featured Section', 'allure-news' ),
 'panel' 		 => 'allure_news_panel',
) );
/*callback functions slider*/
if ( !function_exists('allure_news_slider_active_callback') ) :
  function allure_news_slider_active_callback(){
    global $allure_news_theme_options;
    $allure_news_theme_options = allure_news_get_options_value();
    $enable_slider = absint($allure_news_theme_options['allure-news-enable-slider']);
    if( 1 == $enable_slider ){
      return true;
    }
    else{
      return false;
    }
  }
endif;
/*Slider Enable Option*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-slider]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['allure-news-enable-slider'],
 'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-slider]', array(
 'label'     => __( 'Enable Featured Section', 'allure-news' ),
 'description' => __('Checked to Featured Section In Home Page.', 'allure-news'),
 'section'   => 'allure_news_slider_section',
 'settings'  => 'allure_news_options[allure-news-enable-slider]',
 'type'      => 'checkbox',
 'priority'  => 10,
) );
/*Slider Category Left Selection*/
$wp_customize->add_setting( 'allure_news_options[allure-news-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Allure_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-select-category]',
    array(
      'label'     => __( 'Select Category For Featured Left Section', 'allure-news' ),
      'description' => __('From the dropdown select the category for the featured left section. Category having post will display in below dropdown.', 'allure-news'),
      'section'   => 'allure_news_slider_section',
      'settings'  => 'allure_news_options[allure-news-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'allure_news_slider_active_callback'
    )
  )
);

/*Slider Category Right Selection*/
$wp_customize->add_setting( 'allure_news_options[allure-news-select-category-featured-right]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-select-category-featured-right'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Allure_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-select-category-featured-right]',
    array(
      'label'     => __( 'Select Category For Featured Right Section', 'allure-news' ),
      'description' => __('From the dropdown select the category for the featured right section. Category having post will display in below dropdown.', 'allure-news'),
      'section'   => 'allure_news_slider_section',
      'settings'  => 'allure_news_options[allure-news-select-category-featured-right]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'allure_news_slider_active_callback'
    )
  )
);


/*Enable Category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-slider-post-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-slider-post-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-slider-post-category]', array(
    'label'     => __( 'Enable the Post Category', 'allure-news' ),
    'description' => __('You can change the category color from Color Options.', 'allure-news'),
    'section'   => 'allure_news_slider_section',
    'settings'  => 'allure_news_options[allure-news-slider-post-category]',
    'type'      => 'checkbox',
    'active_callback'=>'allure_news_slider_active_callback',
    'priority'  => 10,
) );

/*Enable Read Time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-slider-post-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-slider-post-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-slider-post-read-time]', array(
    'label'     => __( 'Enable the Post Read Time', 'allure-news' ),
    'description' => __('Read time can managed from Extra Options. Default word is 200 per minute.', 'allure-news'),
    'section'   => 'allure_news_slider_section',
    'settings'  => 'allure_news_options[allure-news-slider-post-read-time]',
    'type'      => 'checkbox',
    'active_callback'=>'allure_news_slider_active_callback',
    'priority'  => 10,
) );

/*Enable Date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-slider-post-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-slider-post-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-slider-post-date]', array(
    'label'     => __( 'Enable the Post Date', 'allure-news' ),
    'description' => __('Show or Hide the Post Date from the featured posts.', 'allure-news'),
    'section'   => 'allure_news_slider_section',
    'settings'  => 'allure_news_options[allure-news-slider-post-date]',
    'type'      => 'checkbox',
    'active_callback'=>'allure_news_slider_active_callback',
    'priority'  => 10,
) );
/*Enable Author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-slider-post-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-slider-post-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-slider-post-author]', array(
    'label'     => __( 'Enable the Post Author', 'allure-news' ),
    'description' => __('Show or Hide the Post Author from the featured posts.', 'allure-news'),
    'section'   => 'allure_news_slider_section',
    'settings'  => 'allure_news_options[allure-news-slider-post-author]',
    'type'      => 'checkbox',
    'active_callback'=>'allure_news_slider_active_callback',
    'priority'  => 10,
) );