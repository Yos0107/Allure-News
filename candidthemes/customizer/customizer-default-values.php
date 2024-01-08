<?php
/**
 * Allure News Theme Customizer default values
 *
 * @package Allure News
 */
if ( !function_exists('allure_news_default_theme_options_values') ) :
    function allure_news_default_theme_options_values() {
        $default_theme_options = array(

            /*General Colors*/
            'allure-news-primary-color' => '#F63A3A',
            'allure-news-site-title-hover'=> '',
            'allure-news-site-tagline'=> '',
            
            /**
             * Font Options
             */
            'allure-news-font-family-url'=> 'Poppins:400,500,600,700',
            'allure-news-font-heading-family-url'=> 'Roboto:400,500,300,700,400italic',

            /*Logo Section Colors*/
            'allure-news-logo-section-background' => '#333333',

            /*logo position*/
            'allure-news-custom-logo-position'=> 'center',

            /*Site Layout Options*/
            'allure-news-site-layout-options'=>'boxed',
            'allure-news-boxed-width-options'=> 1500,

            /*Top Header Section Default Value*/
            'allure-news-enable-top-header'=> true,
            'allure-news-enable-top-header-social'=> true,
            'allure-news-enable-top-header-menu'=> true,
            'allure-news-enable-top-header-date' => true,
            'allure-news-top-header-date-format'=>'default-date',
            
            /*Treding News*/
            'allure-news-enable-trending-news' => true,
            'allure-news-enable-trending-news-text'=> esc_html__('Breaking News','allure-news'),
            'allure-news-trending-news-category'=> 0,
            'allure-news-post-speed' => 10,

            /*Menu Section*/
            'allure-news-enable-menu-section-search'=> true,
            'allure-news-enable-sticky-primary-menu'=> true,
            'allure-news-enable-menu-home-icon' => true,

            /*Header Ads Default Value*/
            'allure-news-enable-ads-header'=> false,
            'allure-news-header-ads-image'=> '',
            'allure-news-header-ads-image-link'=> 'https://www.candidthemes.com/themes/allure-news-pro/',

            /*Slider Section Default Value*/
            'allure-news-enable-slider' => true,
            'allure-news-select-category'=> 0,
            'allure-news-select-category-featured-right' => 0,
            'allure-news-slider-post-date'=> true,
            'allure-news-slider-post-author'=> false,
            'allure-news-slider-post-category'=> true,
            'allure-news-slider-post-read-time'=> true,
            

            /*Sidebars Default Value*/
            'allure-news-sidebar-blog-page'=>'right-sidebar',
            'allure-news-sidebar-front-page' => 'right-sidebar',
            'allure-news-sidebar-archive-page'=> 'right-sidebar',

            /*Blog Page Default Value*/
            'allure-news-content-show-from'=>'excerpt',
            'allure-news-excerpt-length'=>25,
            'allure-news-pagination-options'=>'numeric',
            'allure-news-read-more-text'=> esc_html__('Read More','allure-news'),
            'allure-news-enable-blog-author'=> false,
            'allure-news-enable-blog-category'=> true,
            'allure-news-enable-blog-date'=> true,
            'allure-news-enable-blog-comment'=> false,
            'allure-news-enable-blog-tags'=> false,

            /*Single Page Default Value*/
            'allure-news-single-page-featured-image'=> true,
            'allure-news-single-page-related-posts'=> true,
            'allure-news-single-page-related-posts-title'=> esc_html__('Related Posts','allure-news'),
            'allure-news-enable-single-category' => true,
            'allure-news-enable-single-date' => true,
            'allure-news-enable-single-author' => true,
            

            /*Sticky Sidebar Options*/
            'allure-news-enable-sticky-sidebar'=> true,

            /*Social Share Options*/
            'allure-news-enable-single-sharing'=> true,
            'allure-news-enable-blog-sharing'=> false,
            'allure-news-enable-static-page-sharing' => false,

            /*Footer Section*/
            'allure-news-footer-copyright' =>  esc_html__('All Rights Reserved 2023.','allure-news'),
            'allure-news-go-to-top'=> true,
            
            
            /*Extra Options*/
            'allure-news-extra-breadcrumb'=> true,
            'allure-news-breadcrumb-text'=>  esc_html__('You are Here','allure-news'),
            'allure-news-extra-preloader'=> true,
            'allure-news-front-page-content' => false,
            'allure-news-extra-hide-read-time' => false,
            'allure-news-extra-post-formats-icons'=> true,
            'allure-news-enable-category-color' => false,
            'allure-news-breadcrumb-display-from-option'=> 'theme-default',
            'allure-news-breadcrumb-display-from-plugins'=> 'yoast',

        );
        return apply_filters( 'allure_news_default_theme_options_values', $default_theme_options );
    }
endif;

/**
 *  Allure News Theme Options and Settings
 *
 * @since Allure News 1.0.0
 *
 * @param null
 * @return array allure_news_get_options_value
 *
 */
if ( !function_exists('allure_news_get_options_value') ) :
    function allure_news_get_options_value() {
        $allure_news_default_theme_options_values = allure_news_default_theme_options_values();
        $allure_news_get_options_value = get_theme_mod( 'allure_news_options');
        if( is_array( $allure_news_get_options_value )){
            return array_merge( $allure_news_default_theme_options_values, $allure_news_get_options_value );
        }
        else{
            return $allure_news_default_theme_options_values;
        }
    }
endif;
