<?php
/**
 *  Allure News Single Page Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'allure_news_single_page_section', array(
   'priority'       => 68,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );

/*Featured Image Option*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-featured-image'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'allure-news' ),
    'description' => __('You can hide or show featured image on single page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-category]', array(
    'label'     => __( 'Enable Category', 'allure-news' ),
    'description' => __('Checked to Enable Category In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-category]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-date]', array(
    'label'     => __( 'Enable Date', 'allure-news' ),
    'description' => __('Checked to Enable Date In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-date]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-author]', array(
    'label'     => __( 'Enable Author', 'allure-news' ),
    'description' => __('Checked to Enable Author In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-author]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'allure-news' ),
    'description' => __('3 Post from similar category will display at the end of the page. More Options is in Premium Version', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('allure_news_related_post_callback') ) :
    function allure_news_related_post_callback(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $related_posts = absint($allure_news_theme_options['allure-news-single-page-related-posts']);
        if( 1 == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'allure-news' ),
    'description' => __('Give the appropriate title for related posts', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );

