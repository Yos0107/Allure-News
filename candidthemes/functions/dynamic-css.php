<?php
/**
 * Dynamic CSS elements.
 *
 * @package Allure News
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('allure_news_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function allure_news_dynamic_css()
    {

        global $allure_news_theme_options;

        $allure_news_header_color = get_header_textcolor();
        $allure_news_custom_css = '';

        if (!empty($allure_news_header_color)) {
            $allure_news_custom_css .= ".site-branding h1, .site-branding p.site-title,.ct-dark-mode .site-title a, .site-title, .site-title a, .site-title a:hover, .site-title a:visited:hover { color: #{$allure_news_header_color}; }";
        }

        if (!empty($allure_news_theme_options['allure-news-site-title-hover'])) {
            $allure_news_site_title_hover_color = esc_attr($allure_news_theme_options['allure-news-site-title-hover']);
            $allure_news_custom_css .= ".ct-dark-mode .site-title a:hover,.site-title a:hover, .site-title a:visited:hover, .ct-dark-mode .site-title a:visited:hover { color: {$allure_news_site_title_hover_color}; }";
        }


        if (!empty($allure_news_theme_options['allure-news-site-tagline'])) {
            $allure_news_site_desc_color = esc_attr($allure_news_theme_options['allure-news-site-tagline']);
            $allure_news_custom_css .= ".ct-dark-mode .site-branding  .site-description, .site-branding  .site-description { color: {$allure_news_site_desc_color}; }";
        }

        /* Primary Color Section */
        if (!empty($allure_news_theme_options['allure-news-primary-color'])) {
            $allure_news_primary_color = esc_attr($allure_news_theme_options['allure-news-primary-color']);

            //font-color
            $allure_news_custom_css .= ".entry-content a, .entry-title a:hover, .related-title a:hover, .posts-navigation .nav-previous a:hover, .post-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .post-navigation .nav-next a:hover, #comments .comment-content a:hover, #comments .comment-author a:hover, .offcanvas-menu nav ul.top-menu li a:hover, .offcanvas-menu nav ul.top-menu li.current-menu-item > a, .error-404-title, #allure-news-breadcrumbs a:hover, .entry-content a.read-more-text:hover, a:hover, a:visited:hover, .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a, #fg-load, .ct-post-carousel .slick-next:before,
            .ct-post-carousel .slick-prev:before, .cate-tabs-nav li.ui-state-active a, .ct-menu-search .search-icon-box:hover, .allure-news-social-top .allure-news-menu-social li a:hover:before, .ct-post-overlay .post-content a:hover, .ct-post-overlay .post-content a:visited:hover { color : {$allure_news_primary_color}; }";

            //background-color
            $allure_news_custom_css .= ".candid-allure-post-format, #toTop:hover, .menu-social-menu-container .social-menu a:hover, .allure_news_widget_author ul.menu a:hover, .cat-links a, .allure-news-featured-block .allure-news-col-2 .candid-allure-post-format, .top-bar, .trending-title, input[type=\"submit\"], ::selection, .breadcrumbs span.breadcrumb, article.sticky .allure-news-content-container, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover, .ct-title-head, .widget-title:before, .widget ul.ct-nav-tabs:before, .widget ul.ct-nav-tabs li.ct-title-head:hover, .widget ul.ct-nav-tabs li.ct-title-head.ui-tabs-active, .main-navigation ul li a:before, .main-navigation ul li.current-menu-item a:before, .search-form input[type='submit']:hover { background-color : {$allure_news_primary_color}; }";


            //border-color
            $allure_news_custom_css .= ".candid-allure-post-format, .allure-news-featured-block .allure-news-col-2 .candid-allure-post-format, blockquote, .candid-pagination .page-numbers { border-color : {$allure_news_primary_color}; }";

            $allure_news_custom_css .= ".cat-links a:focus{ outline : 1px dashed {$allure_news_primary_color}; }";
        }

        $allure_news_custom_css .= ".ct-post-overlay .post-content, .ct-post-overlay .post-content a, .widget .ct-post-overlay .post-content a, .widget .ct-post-overlay .post-content a:visited, .slide-details:hover .cat-links a { color: #fff; }";

        if(!empty($allure_news_theme_options['allure-news-category-line-color'])){
            $category_line_color = esc_attr( $allure_news_theme_options['allure-news-category-line-color'] );
            $allure_news_custom_css .= ".cat-links a {background-image: linear-gradient($category_line_color, $category_line_color)!important; }";
        }

        if(!empty($allure_news_theme_options['allure-news-enable-category-color'])){
            $enable_category_color = $allure_news_theme_options['allure-news-enable-category-color'];
            if ($enable_category_color == 1) {
                $args = array(
                    'orderby' => 'id',
                    'hide_empty' => 0
                );
                $categories = get_categories($args);
                $wp_category_list = array();
                $i = 1;
                foreach ($categories as $category_list) {
                    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

                    $cat_color = 'cat-' . esc_attr(get_cat_id($wp_category_list[$category_list->cat_ID]));


                    if (array_key_exists($cat_color, $allure_news_theme_options)) {
                        $cat_color_code = $allure_news_theme_options[$cat_color];
                        $allure_news_custom_css .= "
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .ct-cat-item-{$category_list->cat_ID}{
                    background: {$cat_color_code}!important; }";
                    $allure_news_custom_css .= " 
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .ct-cat-item-{$category_list->cat_ID}{
                        color: #fff!important;
                        background-size: 6% 100%!important;
                        background-image: linear-gradient($category_line_color, $category_line_color)!important;
                        background-repeat: no-repeat!important;
                        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform var(--e-transform-transition-duration, 0.4s)!important;

                    }";
                    $allure_news_custom_css .="
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .ct-cat-item-{$category_list->cat_ID}:hover{
                        background-image: linear-gradient($category_line_color, $category_line_color)!important;
                        background-size: 100% 100% !important;
                    }";
                    $allure_news_custom_css .= "
                    .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a.ct-tab-{$category_list->cat_ID} {
                    color: {$cat_color_code}!important;
                    }
                    ";
                    }


                    $i++;
                }
            }
        }
     

        if(!empty($allure_news_theme_options['allure-news-logo-section-background'])){
            $logo_section_color = esc_attr( $allure_news_theme_options['allure-news-logo-section-background'] );
            $allure_news_custom_css .= ".logo-wrapper-block{background-color : {$logo_section_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-boxed-width-options'])){
            $box_width = absint($allure_news_theme_options['allure-news-boxed-width-options']);
            $allure_news_custom_css .= "@media (min-width: 1600px){.ct-boxed #page{max-width : {$box_width}px; }}";

            if($box_width < 1370){
                $allure_news_custom_css .= "@media (min-width: 1450px){.ct-boxed #page{max-width : {$box_width}px; }}";
            }
        }

        /* Paragraph Font Options */
        $allure_news_google_fonts = allure_news_google_fonts();
        if (!empty($allure_news_theme_options['allure-news-font-family-url'])) {
            $allure_news_body_fonts = $allure_news_theme_options['allure-news-font-family-url'];
            $allure_news_font_family = esc_attr($allure_news_google_fonts[$allure_news_body_fonts]);
            if (!empty($allure_news_font_family)) {
            $allure_news_custom_css .= "body, button, input, select, optgroup, textarea, .site-description, .load-inner #load h2 { font-family: '{$allure_news_font_family}'; }";
            }
        }

        /* Heading H1 Font Option */
        if (!empty($allure_news_theme_options['allure-news-font-heading-family-url'])) {
            $allure_news_heading_fonts = esc_attr($allure_news_theme_options['allure-news-font-heading-family-url']);
            $allure_news_heading_font_family = $allure_news_google_fonts[$allure_news_heading_fonts];
            if (!empty($allure_news_heading_font_family)) {
                $allure_news_custom_css .= "h1, h2, h3, h4, h5, h6, .entry-content h1, .site-title a { font-family: '{$allure_news_heading_font_family}'; }";
            }
        }

        wp_add_inline_style('allure-news-style', $allure_news_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'allure_news_dynamic_css', 99);