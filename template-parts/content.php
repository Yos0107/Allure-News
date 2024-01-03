<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure News
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php allure_news_do_microdata('article'); ?>>
    <?php
    global $allure_news_theme_options;
    $allure_news_show_image = 1;
    if(is_singular()) {
        $allure_news_show_image = $allure_news_theme_options['allure-news-single-page-featured-image'];
    }
    $allure_news_show_content = $allure_news_theme_options['allure-news-content-show-from'];
    $allure_news_thumbnail = (has_post_thumbnail() && ($allure_news_show_image == 1)) ? 'allure-news-has-thumbnail' : 'allure-news-no-thumbnail';

    ?>
    <div class="allure-news-content-container <?php echo $allure_news_thumbnail; ?>">
        <?php
        if ($allure_news_thumbnail == 'allure-news-has-thumbnail'):
            ?>
            <div class="post-thumb">
                <?php
                allure_news_post_formats(get_the_ID());
                allure_news_post_thumbnail();
                ?>
            </div>
        <?php
        endif;
        ?>
        <div class="allure-news-content-area">
            <header class="entry-header">

                <div class="post-meta">
                    <?php
                    allure_news_list_category(get_the_ID());
                    ?>
                </div>
                <?php

                if (is_singular()) :
                    the_title('<h1 class="entry-title" ' . allure_news_get_microdata("heading") . '>', '</h1>');
                else :
                    the_title('<h2 class="entry-title" ' . allure_news_get_microdata("heading") . '><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        allure_news_posted_on();
                        allure_news_read_time_words_count(get_the_ID());
                        allure_news_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->


            <div class="entry-content">
                <?php
                if (is_singular()) :
                    the_content();
                else :
                    if ($allure_news_show_content == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                endif;

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'allure-news'),
                    'after' => '</div>',
                ));
                ?>

                <?php
                $allure_news_read_more_text = $allure_news_theme_options['allure-news-read-more-text'];
                if ((!is_single()) && ($allure_news_show_content == 'excerpt')) {
                    if (!empty($allure_news_read_more_text)) { ?>
                        <p><a href="<?php the_permalink(); ?>" class="read-more-text">
                                <?php echo esc_html($allure_news_read_more_text); ?>

                            </a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- .entry-content -->

            <footer class="entry-footer">
                <?php allure_news_entry_footer(); ?>
            </footer><!-- .entry-footer -->

            <?php
            /**
             * allure_news_social_sharing hook
             * @since 1.0.0
             *
             * @hooked allure_news_constuct_social_sharing -  10
             */
            do_action('allure_news_social_sharing', get_the_ID());
            ?>
        </div> <!-- .allure-news-content-area -->
    </div> <!-- .allure-news-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
