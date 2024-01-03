<?php
/**
 *  Allure News Top Header Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'allure_news_header_section', array(
   'priority'       => 15,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );
/*callback functions header section*/
if ( !function_exists('allure_news_header_active_callback') ) :
  function allure_news_header_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_header = absint($allure_news_theme_options['allure-news-enable-top-header']);
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
/*Enable Top Header Section*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-top-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-top-header'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-top-header]', array(
   'label'     => __( 'Enable Top Header', 'allure-news' ),
   'description' => __('Checked to show the top header section like search and social icons', 'allure-news'),
   'section'   => 'allure_news_header_section',
   'settings'  => 'allure_news_options[allure-news-enable-top-header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );
/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-top-header-social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-top-header-social'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-top-header-social]', array(
   'label'     => __( 'Enable Social Icons', 'allure-news' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'allure-news'),
   'section'   => 'allure_news_header_section',
   'settings'  => 'allure_news_options[allure-news-enable-top-header-social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'allure_news_header_active_callback'
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-top-header-menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-top-header-menu'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-top-header-menu]', array(
    'label'     => __( 'Menu in Header', 'allure-news' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'allure-news'),
    'section'   => 'allure_news_header_section',
    'settings'  => 'allure_news_options[allure-news-enable-top-header-menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'allure_news_header_active_callback'
) );

/*Enable Date in top Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-top-header-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-top-header-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-top-header-date]', array(
    'label'     => __( 'Date in Header', 'allure-news' ),
    'description' => __('Enable Date in Header', 'allure-news'),
    'section'   => 'allure_news_header_section',
    'settings'  => 'allure_news_options[allure-news-enable-top-header-date]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'allure_news_header_active_callback'
) );

/*Date format*/
$wp_customize->add_setting('allure_news_options[allure-news-top-header-date-format]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-top-header-date-format'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-top-header-date-format]', array(
    'choices' => array(
        'default-date' => __('Theme Default Date Format', 'allure-news'),
        'core-date' => __('Setting Date Fromat', 'allure-news'),
    ),
    'label' => __('Select Date Format in Header', 'allure-news'),
    'description' => __('You can have default format for date or Setting > General date format.', 'allure-news'),
    'section' => 'allure_news_header_section',
    'settings' => 'allure_news_options[allure-news-top-header-date-format]',
    'type' => 'select',
    'priority' => 5,
    'active_callback'=> 'allure_news_header_active_callback',
));