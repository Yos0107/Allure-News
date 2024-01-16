<?php
/**
 *  Allure News Top Header Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'allure_news_trending_news_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Trending News Options', 'allure-news' ),
   'panel'     => 'allure_news_panel',
) );

/*Trending News*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-trending-news]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-trending-news'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-trending-news]', array(
    'label'     => __( 'Trending News in Header', 'allure-news' ),
    'description' => __('Trending News will appear on the top header.', 'allure-news'),
    'section'   => 'allure_news_trending_news_section',
    'settings'  => 'allure_news_options[allure-news-enable-trending-news]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );


/*callback functions header section*/
if ( !function_exists('allure_news_header_trending_active_callback') ) :
  function allure_news_header_trending_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_trending = absint($allure_news_theme_options['allure-news-enable-trending-news']);
      if( 1 == $enable_trending   ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Trending News Category Selection*/
$wp_customize->add_setting( 'allure_news_options[allure-news-trending-news-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-trending-news-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new Allure_News_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-trending-news-category]',
    array(
      'label'     => __( 'Select Category For Trending News', 'allure-news' ),
      'description' => __('Select the category from dropdown. It will appear on the header.', 'allure-news'),
      'section'   => 'allure_news_trending_news_section',
      'settings'  => 'allure_news_options[allure-news-trending-news-category]',
      'type'      => 'category_dropdown',
      'priority'  => 5,
      'active_callback'=>'allure_news_header_trending_active_callback'
    )
  )
);

/*Trending News*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-trending-news-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-trending-news-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-trending-news-text]', array(
    'label'     => __( 'Trending News Text', 'allure-news' ),
    'description' => __('Write your own text in place of Trending news.', 'allure-news'),
    'section'   => 'allure_news_trending_news_section',
    'settings'  => 'allure_news_options[allure-news-enable-trending-news-text]',
    'type'      => 'text',
    'priority'  => 5,
    'active_callback'=>'allure_news_header_trending_active_callback'
) );

/*Speed of News Section*/
$wp_customize->add_setting( 'allure_news_options[allure-news-post-speed]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => 10,
  'sanitize_callback' => 'allure_news_sanitize_number_range',

) );
$wp_customize->add_control( 'allure_news_options[allure-news-post-speed]', array(
  'label'     => __( 'Speed Controller.', 'allure-news' ),
  'description' => __('Change the speed.', 'allure-news'),
  'section'   => 'allure_news_trending_news_section',
  'settings'  => 'allure_news_options[allure-news-post-speed]',
  'type'      => 'number',
  'input_attrs'     => array(
    'min' => 1,
  ),
  'priority'  => 5,
  'active_callback'=>'allure_news_header_trending_active_callback'
) );