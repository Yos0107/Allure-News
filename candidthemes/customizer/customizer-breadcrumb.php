<?php
/**
 *  Allure News Breadcrumb Settings Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Breadcrumb Options*/
$wp_customize->add_section( 'allure_news_breadcrumb_options', array(
    'priority'       => 73,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'allure-news' ),
    'panel'          => 'allure_news_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-breadcrumb'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'allure-news' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page', 'allure-news' ),
    'section'   => 'allure_news_breadcrumb_options',
    'settings'  => 'allure_news_options[allure-news-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions breadcrumb enable*/
if ( !function_exists('allure_news_breadcrumb_selection_enable') ) :
  function allure_news_breadcrumb_selection_enable(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_bc = absint($allure_news_theme_options['allure-news-extra-breadcrumb']);
      if( $enable_bc == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Show Breadcrumb Types Selection*/
$wp_customize->add_setting( 'allure_news_options[allure-news-breadcrumb-display-from-option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-breadcrumb-display-from-option'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-breadcrumb-display-from-option]', array(
    'choices' => array(
        'theme-default'    => __('Theme Default Breadcrumb','allure-news'),
        'plugin-breadcrumb'    => __('Plugins Breadcrumb','allure-news')
    ),
    'label'     => __( 'Select the Breadcrumb Show Option', 'allure-news' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'allure-news'),
    'section'   => 'allure_news_breadcrumb_options',
    'settings'  => 'allure_news_options[allure-news-breadcrumb-display-from-option]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'allure_news_breadcrumb_selection_enable',
) );

/*callback functions breadcrumb*/
if ( !function_exists('allure_news_breadcrumb_selection_option') ) :
  function allure_news_breadcrumb_selection_option(){
    global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_breadcrumb = absint($allure_news_theme_options['allure-news-extra-breadcrumb']);
      $breadcrumb_selection = esc_attr($allure_news_theme_options['allure-news-breadcrumb-display-from-option']);
      if( 'theme-default' == $breadcrumb_selection && $enable_breadcrumb == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*callback functions breadcrumb*/
if ( !function_exists('allure_news_breadcrumb_selection_plugin') ) :
  function allure_news_breadcrumb_selection_plugin(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_breadcrumb_plugin = absint($allure_news_theme_options['allure-news-extra-breadcrumb']);
      $breadcrumb_selection_plugin = esc_attr($allure_news_theme_options['allure-news-breadcrumb-display-from-option']);
      if( 'plugin-breadcrumb' == $breadcrumb_selection_plugin && $enable_breadcrumb_plugin == 1){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Breadcrumb Text*/
$wp_customize->add_setting( 'allure_news_options[allure-news-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'allure-news' ),
    'description' => __( 'Write your own text in place of You are Here', 'allure-news' ),
    'section'   => 'allure_news_breadcrumb_options',
    'settings'  => 'allure_news_options[allure-news-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'allure_news_breadcrumb_selection_option',
) );


/*Show Breadcrumb From Plugins*/
$wp_customize->add_setting( 'allure_news_options[allure-news-breadcrumb-display-from-plugins]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-breadcrumb-display-from-plugins'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-breadcrumb-display-from-plugins]', array(
    'choices' => array(
        'yoast'    => __('Yoast SEO Breadcrumb','allure-news'),
        'rank-math'    => __('Rank Math Breadcrumb','allure-news'),
        'navxt'    => __('NavXT Breadcrumb','allure-news')
    ),
    'label'     => __( 'Select the Breadcrumb From Plugins', 'allure-news' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'allure-news'),
    'section'   => 'allure_news_breadcrumb_options',
    'settings'  => 'allure_news_options[allure-news-breadcrumb-display-from-plugins]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'allure_news_breadcrumb_selection_plugin',
) );