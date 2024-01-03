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
 * Display related posts from same category
 *
 * @param int $post_id
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_related_post')) :

    function allure_news_related_post($post_id)
    {

        global $allure_news_theme_options;
        if ($allure_news_theme_options['allure-news-single-page-related-posts'] == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-pots-block">
                    <?php
                    $allure_news_related_post_title = $allure_news_theme_options['allure-news-single-page-related-posts-title'];
                    if (!empty($allure_news_related_post_title)):
                        ?>
                        <h2 class="widget-title">
                            <?php echo $allure_news_related_post_title; ?>
                        </h2>
                    <?php
                    endif;
                    ?>
                    <ul class="related-post-entries clearfix">
                        <?php
                        $allure_news_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $allure_news_featured_query = new WP_Query($allure_news_cat_post_args);

                        while ($allure_news_featured_query->have_posts()) : $allure_news_featured_query->the_post();
                            ?>
                            <li>
                                <?php
                                if (has_post_thumbnail()):
                                    ?>
                                    <figure class="widget-image">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail('allure-news-small-thumb'); ?>
                                        </a>
                                    </figure>
                                <?php
                                endif;
                                ?>
                                <div class="featured-desc">
                                    <h2 class="related-title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <?php
                                        allure_news_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                </div>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('allure_news_related_posts', 'allure_news_related_post', 10, 1);