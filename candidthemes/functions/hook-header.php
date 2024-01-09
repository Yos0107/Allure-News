<?php
/**
 * Header Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('allure_news_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function allure_news_do_skip_to_content_link()
    {
        ?>
        <a class="skip-link screen-reader-text"
           href="#content"><?php esc_html_e('Skip to content', 'allure-news'); ?></a>
        <?php
    }
}
add_action('allure_news_before_header', 'allure_news_do_skip_to_content_link', 10);

if (!function_exists('allure_news_preloader')) {
    /**
     * Add preloader to website
     *
     * @since 1.0.0
     */
    function allure_news_preloader()
    {
        global $allure_news_theme_options;


        //Check if preloader is enabled from customizer
        if ($allure_news_theme_options['allure-news-preloader'] == 1) :
            ?>
            <?php if($allure_news_theme_options['allure-news-preloader-type'] == 'spinning'){ ?>
            <!-- Preloader -->
            <div id="loader-wrapper">
                <div id="loader"></div>

                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>

            </div>
            <?php }else{ ?>
                <div id="preloader">
                    <div class="load-inner">
                        <div id="load">
                            <h2 id="bg-load">....<span>.</span></h2>
                            <h2 id="fg-load">....<span>.</span></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php
        endif;

    }
}
add_action('allure_news_before_header', 'allure_news_preloader', 20);

if (!function_exists('allure_news_header_start_container')) {
    /**
     * Add header html open tag
     *
     * @since 1.0.0
     */
    function allure_news_header_start_container()
    {
        ?>
        <header id="masthead" class="site-header" <?php allure_news_do_microdata('header'); ?>>
        <?php

    }
}
add_action('allure_news_header_start', 'allure_news_header_start_container', 10);


if (!function_exists('allure_news_construct_header')) {
    /**
     * Add header block.
     *
     * @since 1.0.0
     */
    function allure_news_construct_header()
    {
        /**
         * allure_news_after_header_open hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_after_header_open');
        ?>
        <div class="overlay"></div>
        <?php
        global $allure_news_theme_options;

        //Check if top header is enabled from customizer
        if ($allure_news_theme_options['allure-news-enable-top-header'] == 1):

            /**
             * allure_news_top_bar hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_before_top_bar - 5
             * @hooked allure_news_trending_news - 10
             * @hooked allure_news_top_header_right_start - 15
             * @hooked allure_news_top_social_menu - 20
             * @hooked allure_news_top_menu - 25
             * @hooked allure_news_top_search - 30
             * @hooked allure_news_top_header_right_end - 35
             * @hooked allure_news_after_top_bar - 40
             */
            do_action('allure_news_top_bar');
        endif; // $allure_news_theme_options['allure-news-enable-top-header']


        /**
         * allure_news_main_header hook.
         *
         * @since 1.0.0
         *
         * @hooked allure_news_construct_main_header - 10
         *
         */
        do_action('allure_news_main_header');


        /**
         * allure_news_main_navigation hook.
         *
         * @since 1.0.0
         *
         * @hooked allure_news_construct_main_navigation - 10
         *
         */
        do_action('allure_news_main_navigation');


        /**
         * allure_news_before_header_close hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_before_header_close');

    }
}
add_action('allure_news_header', 'allure_news_construct_header', 10);


if (!function_exists('allure_news_header_end_container')) {
    /**
     * Add header html close tag
     *
     * @since 1.0.0
     */
    function allure_news_header_end_container()
    {
        ?>
        </header><!-- #masthead -->
        <?php

    }
}
add_action('allure_news_header_end', 'allure_news_header_end_container', 10);

if (!function_exists('allure_news_header_ads')) {
    /**
     * Add header ads
     *
     * @since 1.0.0
     */
    function allure_news_header_ads()
    {
        global $allure_news_theme_options;
        $logo_position = $allure_news_theme_options['allure-news-custom-logo-position'];
        if ($logo_position == 'center') {
            $logo_class = 'full-wrapper text-center';
            $logo_right_class = 'full-wrapper';
        } else {
            $logo_class = 'float-left';
            $logo_right_class = 'float-right';
        }
        $allure_news_header_ad_image = esc_url($allure_news_theme_options['allure-news-header-ads-image']);
        $allure_news_header_ad_url = esc_url($allure_news_theme_options['allure-news-header-ads-image-link']);
        if (!empty($allure_news_header_ad_image)):
            ?>
            <div class="logo-right-wrapper clearfix  <?php echo $logo_class ?>">
                <?php
                if (!empty($allure_news_header_ad_image) && (!empty($allure_news_header_ad_url))) {
                    ?>
                    <a href="<?php echo esc_url($allure_news_header_ad_url); ?>" target="_blank">
                        <img src="<?php echo esc_url($allure_news_header_ad_image); ?>"
                             class="<?php echo esc_attr($logo_right_class); ?>">
                    </a>
                    <?php
                } else if (!empty($allure_news_header_ad_image)) {
                    ?>
                    <img src="<?php echo esc_url($allure_news_header_ad_image); ?>"
                         class="<?php echo esc_attr($logo_right_class); ?>">
                    <?php
                }
                ?>
            </div> <!-- .logo-right-wrapper -->
        <?php
        endif; // !empty $allure_news_header_ad_image


    }
}
add_action('allure_news_header_ads', 'allure_news_header_ads', 10);


if (!function_exists('allure_news_trending_news_item')) {
    /**
     * Add trending news section
     *
     * @since 1.0.0
     */
    function allure_news_trending_news_item()
    {
        global $allure_news_theme_options;
        $trending_cat = absint($allure_news_theme_options['allure-news-trending-news-category']);
        $trending_title = esc_html($allure_news_theme_options['allure-news-enable-trending-news-text']);
        $speed_controller = $allure_news_theme_options[ 'allure-news-post-speed'];

        if (is_rtl()) {
            $marquee_class = 'trending-right';
        } else {
            $marquee_class = 'trending-left';
        }
        ?>
        <?php
        $query_args = array(
            'post_type' => 'post',
            'ignore_sticky_posts' => true,
            'posts_per_page' => 10,
            'cat' => $trending_cat
        );

        $query = new WP_Query($query_args);
        if ($query->have_posts()) :
            ?>

            <div class="trending-wrapper">
                <?php
                if ($trending_title):
                    ?>
                    <strong class="trending-title">
                        <?php echo $trending_title; ?>
                    </strong>
                <?php
                endif;
                ?>
                <div class="trending-content <?php echo $marquee_class; ?>" data-speed="<?php echo absint( $speed_controller ); ?>">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>">
                                <span class="img-marq">
                                     <?php the_post_thumbnail('thumbnail'); ?>
                                </span>
                            <?php the_title(); ?>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div> <!-- .top-right-col -->
        <?php
        endif;
        ?>
        <?php


    }
}
add_action('allure_news_trending_news', 'allure_news_trending_news_item', 10);