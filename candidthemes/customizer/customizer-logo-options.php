<?php
/**
 *  Allure News Logo Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Logo Options*/
$wp_customize->add_setting( 'allure_news_options[allure-news-custom-logo-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-custom-logo-position'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-custom-logo-position]', array(
   'choices' => array(
    'default'    => __('Left Align','allure-news'),
    'center'    => __('Center Logo','allure-news')
),
   'label'     => __( 'Logo Position Option', 'allure-news' ),
   'description' => __('Your logo will be in the center position.', 'allure-news'),
   'section'   => 'title_tagline',
   'settings'  => 'allure_news_options[allure-news-custom-logo-position]',
   'type'      => 'select',
   'priority'  => 30,
) );