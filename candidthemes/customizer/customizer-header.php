<?php
/**
 *  Allure News Header Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'allure_news_header_ads_section', array(
   'priority'       => 16,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Ads Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );
/*callback functions header section*/
if ( !function_exists('allure_news_ads_header_active_callback') ) :
  function allure_news_ads_header_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_ads_header = absint($allure_news_theme_options['allure-news-enable-ads-header']);
      if( 1 == $enable_ads_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Header Ads Section*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-ads-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-ads-header'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-ads-header]', array(
   'label'     => __( 'Show Header Advertisement', 'allure-news' ),
   'description' => __('Checked to Enable the header ads. Select either image or google adsense.', 'allure-news'),
   'section'   => 'allure_news_header_ads_section',
   'settings'  => 'allure_news_options[allure-news-enable-ads-header]',
   'type'      => 'checkbox',
   'priority'  => 10,
) );

/*Header Ads Image*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-header-ads-image'],
    'sanitize_callback' => 'allure_news_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'allure_news_options[allure-news-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'allure-news' ),
            'section'   => 'allure_news_header_ads_section',
            'settings'  => 'allure_news_options[allure-news-header-ads-image]',
            'type'      => 'image',
            'priority'  => 10,
            'active_callback' => 'allure_news_ads_header_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'allure-news' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'allure_news_options[allure-news-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'allure-news' ),
    'section'   => 'allure_news_header_ads_section',
    'settings'  => 'allure_news_options[allure-news-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'allure_news_ads_header_active_callback',
    'priority'  => 10
) );

