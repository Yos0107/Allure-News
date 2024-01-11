<?php
/**
 * Single Post Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Display sidebar
 *
 * @param none
 * @return void
 *
 * @since Allure News 1.0.0
 *
 */
if (!function_exists('allure_news_construct_sidebar')) :

    function allure_news_construct_sidebar()
    {
        /*  * Adds sidebar based on customizer option
      *
           * @since Allure News 1.0.0
      */
        global $allure_news_theme_options;
        $sidebar = $allure_news_theme_options['allure-news-sidebar-archive-page'] ? $allure_news_theme_options['allure-news-sidebar-archive-page'] : 'right-sidebar';
        if (is_singular()) {
            $sidebar = $allure_news_theme_options['allure-news-sidebar-blog-page'] ? $allure_news_theme_options['allure-news-sidebar-blog-page'] : 'right-sidebar';
            global $post;
            $single_sidebar = get_post_meta($post->ID, 'allure_news_sidebar_layout', true);
            if (('default-sidebar' != $single_sidebar) && (!empty($single_sidebar))) {
                $sidebar = $single_sidebar;
            }
        }
        if (is_front_page()) {
            $sidebar = $allure_news_theme_options['allure-news-sidebar-front-page'] ? $allure_news_theme_options['allure-news-sidebar-front-page'] : 'right-sidebar';
        }
        if (($sidebar == 'right-sidebar') || ($sidebar == 'left-sidebar')) {
            get_sidebar();
        }
    }
endif;
add_action('allure_news_sidebar', 'allure_news_construct_sidebar', 10);

/**
 * Display Breadcrumb
 *
 * @param none
 * @return void
 *
 * @since Allure News 1.0.0
 *
 */
if (!function_exists('allure_news_construct_breadcrumb')) :

    function allure_news_construct_breadcrumb()
    {
        global $allure_news_theme_options;
        //Check if breadcrumb is enabled from customizer
        if ($allure_news_theme_options['allure-news-extra-breadcrumb'] == 1):
            /**
             * Adds Breadcrumb based on customizer option
             *
             * @since Allure News 1.0.0
             */
            $breadcrumb_type = $allure_news_theme_options['allure-news-breadcrumb-display-from-option'];
            if ($breadcrumb_type == 'plugin-breadcrumb') {
                $breadcrumb_plugin = $allure_news_theme_options['allure-news-breadcrumb-display-from-plugins'];


                ?>
                <div class="breadcrumbs">
                    <?php
                    if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_plugin == 'yoast')) {
                        yoast_breadcrumb();
                    } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($breadcrumb_plugin == 'rank-math')) {
                        rank_math_the_breadcrumbs();
                    } elseif ((function_exists('bcn_display')) && ($breadcrumb_plugin == 'navxt')) {
                        bcn_display();
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="breadcrumbs">
                    <?php
                    $breadcrumb_args = array(
                        'container' => 'div',
                        'show_browse' => false
                    );

                    $allure_news_you_are_here_text = esc_html($allure_news_theme_options['allure-news-breadcrumb-text']);
                    if (!empty($allure_news_you_are_here_text)) {
                        $allure_news_you_are_here_text = "<span class='breadcrumb'>" . $allure_news_you_are_here_text . "</span>";
                    }
                    echo "<div class='breadcrumbs init-animate clearfix'>" . $allure_news_you_are_here_text . "<div id='allure-news-breadcrumbs' class='clearfix'>";
                    breadcrumb_trail($breadcrumb_args);
                    echo "</div></div>";
                    ?>
                </div>
                <?php
            }
        endif;
    }
endif;
add_action('allure_news_breadcrumb', 'allure_news_construct_breadcrumb', 10);


/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if (!function_exists('allure_news_alter_excerpt')) :
    function allure_news_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $allure_news_theme_options;
        $allure_news_excerpt_length = $allure_news_theme_options['allure-news-excerpt-length'];
        if (!empty($allure_news_excerpt_length)) {
            return $allure_news_excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'allure_news_alter_excerpt');


/**
 * Post Navigation Function
 *
 * @param null
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_posts_navigation')) :
    function allure_news_posts_navigation()
    {
        global $allure_news_theme_options;
        $allure_news_pagination_option = $allure_news_theme_options['allure-news-pagination-options'];
        if ($allure_news_pagination_option == 'default') {
            the_posts_navigation();
        } else {
            echo "<div class='candid-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'allure-news'),
                'next_text' => __('Next &raquo;', 'allure-news'),
            ));
            echo "</div>";
        }
    }
endif;
add_action('allure_news_action_navigation', 'allure_news_posts_navigation', 10);


/**
 * Social Sharing Hook *
 * @param int $post_id
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_constuct_social_sharing')) :
    function allure_news_constuct_social_sharing($post_id)
    {
        global $allure_news_theme_options;
        $allure_news_enable_blog_sharing = $allure_news_theme_options['allure-news-enable-blog-sharing'];
        $allure_news_enable_single_sharing = $allure_news_theme_options['allure-news-enable-single-sharing'];
        $allure_news_enable_front_sharing = $allure_news_theme_options['allure-news-enable-static-page-sharing'];
        if (($allure_news_enable_blog_sharing != 1) && (!is_singular())) {
            return;
        }
        if (($allure_news_enable_single_sharing != 1) && (is_singular())) {
            return;
        }
        if (($allure_news_enable_front_sharing != 1) && (is_front_page()) && ('page' == get_option('show_on_front'))) {
            return;
        }
        $allure_news_url = get_the_permalink($post_id);
        $allure_news_title = get_the_title($post_id);
        $allure_news_image = get_the_post_thumbnail_url($post_id);

        //sharing url
        $allure_news_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $allure_news_title . '&url=' . $allure_news_url);
        $allure_news_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $allure_news_url);
        $allure_news_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $allure_news_url . '&media=' . $allure_news_image . '&description=' . $allure_news_title);
        $allure_news_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $allure_news_title . '&url=' . $allure_news_url);

        ?>
        <div class="meta_bottom">
            <div class="text_share header-text"><?php _e('Share', 'allure-news'); ?></div>
            <div class="post-share">
                    <a target="_blank" href="<?php echo $allure_news_facebook_sharing_url; ?>">
                        <i class="fab fa-facebook"></i>
                        <?php esc_html_e('Facebook', 'allure-news'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $allure_news_twitter_sharing_url; ?>">
                        <i class="fab fa-x-twitter"></i>                        
                        <?php esc_html_e('Twitter', 'allure-news'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $allure_news_pinterest_sharing_url; ?>">
                        <i class="fab fa-pinterest"></i>
                        
                        <?php esc_html_e('Pinterest', 'allure-news'); ?>
                    </a>
                    <a target="_blank" href="<?php echo $allure_news_linkedin_sharing_url; ?>">
                        <i class="fab fa-linkedin"></i>
                        <?php esc_html_e('Linkedin', 'allure-news'); ?>
                        
                    </a>
            </div>
        </div>
        <?php
    }
endif;
add_action('allure_news_social_sharing', 'allure_news_constuct_social_sharing', 10);

if (!function_exists('allure_news_excerpt_words')) :
    function allure_news_excerpt_words($post_id, $word_count = 25, $read_more = '')
    {
        $content = get_the_content($post_id);
        $trimmed_content = wp_trim_words($content, $word_count, $read_more);
        return $trimmed_content;

    }
endif;


if (!function_exists('allure_news_main_carousel')) :
    function allure_news_main_carousel($cat_id = '')
    {
        global $allure_news_theme_options;
        $allure_news_site_layout = $allure_news_theme_options['allure-news-site-layout-options'];

        $allure_news_enable_date = $allure_news_theme_options['allure-news-slider-post-date'];
        $allure_news_enable_author = $allure_news_theme_options['allure-news-slider-post-author'];

        $allure_news_slider_args = array();
        if(is_rtl()){
            $allure_news_slider_args['rtl']      = true;
        }
        $allure_news_slider_args_encoded = wp_json_encode( $allure_news_slider_args );

        $query_args = array(
            'post_type' => 'post',
            'ignore_sticky_posts' => true,
            'posts_per_page' => 4,
            'cat' => $cat_id
        );

        $query = new WP_Query($query_args);
        $count = $query->post_count;
        if ($query->have_posts()) :
            ?>

                        <div class="allure-news-col">
                <ul class="ct-post-carousel slider hover-prev-next" data-slick='<?php echo $allure_news_slider_args_encoded; ?>'>
                <?php
            while ($query->have_posts()) :
                $query->the_post();
                ?>
                    <li>
                            <div class="featured-section-inner ct-post-overlay">
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="post-thumb">
                                        <?php
                                        allure_news_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if ($allure_news_site_layout == 'boxed') {
                                                the_post_thumbnail('allure-news-carousel-img');
                                            } else {
                                                the_post_thumbnail('allure-news-carousel-large-img');
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="post-thumb">
                                        <?php
                                        allure_news_post_formats(get_the_ID());
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if ($allure_news_site_layout == 'boxed') {
                                                ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/allure-new-carousel.jpg' ?>" alt="<?php the_title(); ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()).'/candidthemes/assets/images/allure-new-carousel-large.jpg' ?>" alt="<?php the_title_attribute(); ?>">
                                                <?php
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="featured-section-details post-content">
                                    <div class="post-meta">
                                        <?php
                                        allure_news_featured_list_category(get_the_ID());
                                        ?>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                        <div class="post-meta">
                                            <?php
                                            if ($allure_news_enable_date) {
                                                allure_news_widget_posted_on();
                                            }
                                            allure_news_read_time_slider(get_the_ID());
                                            if ($allure_news_enable_author) {
                                                allure_news_widget_posted_by();
                                            }
                                            ?>
                                        </div>
                                </div>
                            </div> <!-- .featured-section-inner -->
                    </li>
                <?php
            endwhile;
            wp_reset_postdata();
                ?>
                </ul>
                        </div><!--.allure-news-col-->
        <?php
        endif;

    }
endif;

if (!function_exists('allure_news_is_blog')) :
function allure_news_is_blog () {
    global  $post;
    $posttype = get_post_type($post );
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

endif;