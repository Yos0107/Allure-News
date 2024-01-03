<?php
/**
 *  Allure News Site Layout Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Site Layout Section*/
$wp_customize->add_section( 'allure_news_site_layout_section', array(
   'priority'       => 35,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Site Layout Options', 'allure-news' ),
   'panel'     => 'allure_news_panel',
) );
/*Site Layout settings*/
$wp_customize->add_setting( 'allure_news_options[allure-news-site-layout-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-site-layout-options'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-site-layout-options]', array(
   'choices' => array(
    'boxed'    => __('Boxed Layout','allure-news'),
    'full-width'    => __('Full Width','allure-news')
),
   'label'     => __( 'Site Layout Option', 'allure-news' ),
   'description' => __('You can make the overall site full width or boxed in nature.', 'allure-news'),
   'section'   => 'allure_news_site_layout_section',
   'settings'  => 'allure_news_options[allure-news-site-layout-options]',
   'type'      => 'select',
   'priority'  => 30,
) );

/*callback functions header section*/
if ( !function_exists('allure_news_boxed_layout_width') ) :
  function allure_news_boxed_layout_width(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $boxed_width = esc_attr($allure_news_theme_options['allure-news-site-layout-options']);
      if( 'boxed' == $boxed_width ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Site Layout width*/
$wp_customize->add_setting( 'allure_news_options[allure-news-boxed-width-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-boxed-width-options'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-boxed-width-options]', array(
   'label'     => __( 'Set Boxed Width Range', 'allure-news' ),
   'description' => __('Make the required width of your boxed layout. Select a custom width for the boxed layout. Minimim is 1200px and maximum is 1500px.', 'allure-news'),
   'section'   => 'allure_news_site_layout_section',
   'settings'  => 'allure_news_options[allure-news-boxed-width-options]',
   'type'      => 'range',
   'priority'  => 30,
   'input_attrs' => array(
          'min' => 1200,
          'max' => 1500,
        ),
   'active_callback' => 'allure_news_boxed_layout_width',
) );