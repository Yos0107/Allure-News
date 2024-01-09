<?php 
/**
 *  Allure News Preloader Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'allure_news_preloader_options', array(
  'priority'       => 76,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => __( 'Preloader Options', 'allure-news' ),
  'panel'          => 'allure_news_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-preloader'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-preloader]', array(
    'label'     => __( 'Enable Preloader', 'allure-news' ),
    'description' => __( 'It will enable the preloader on the website.', 'allure-news' ),
    'section'   => 'allure_news_preloader_options',
    'settings'  => 'allure_news_options[allure-news-preloader]',
    'type'      => 'checkbox',
    'priority'  => 5,
) );

/*callback functions header section*/
if ( !function_exists('allure_news_preloader_active_callback') ) :
    function allure_news_preloader_active_callback(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $preloader_text = absint($allure_news_theme_options['allure-news-preloader']);
        if( 1 == $preloader_text   ){
            return true;
        }
        else{
            return false;
        }
    }
  endif;

/*Preloader type*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader-type]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-preloader-type'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-preloader-type]', array(
   'choices' => array(
    'spinning'    => __('Spinning Icon','allure-news'),
    'text'    => __('Text Loading','allure-news'),
    'dots'    => __('Dots Loading','allure-news')
),
  'label'     => __( 'Preloader Type', 'allure-news' ),
  'description' => __('Select the preloader type.', 'allure-news'),
  'section'   => 'allure_news_preloader_options',
  'settings'  => 'allure_news_options[allure-news-preloader-type]',
  'type'      => 'select',
  'priority'  => 10,
  'active_callback'=>'allure_news_preloader_active_callback'

) );

