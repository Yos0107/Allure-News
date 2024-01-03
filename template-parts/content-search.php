<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php allure_news_do_microdata('article'); ?>>
    <?php
    $allure_news_thumbnail = (has_post_thumbnail()) ? 'allure-news-has-thumbnail' : 'allure-news-no-thumbnail';
    ?>
    <div class="allure-news-content-container <?php echo $allure_news_thumbnail; ?>">
        <?php
        if (has_post_thumbnail()):
            allure_news_post_thumbnail();
        endif;
        ?>
        <div class="allure-news-content-area">
            <header class="entry-header">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        allure_news_list_category(get_the_ID());
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif;
                ?>
                <?php the_title(sprintf('<h2 class="entry-title" '.allure_news_get_microdata("heading").'><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        allure_news_posted_on();
                        allure_news_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php
                $allure_news_show_content = 'excerpt';
                if ( $allure_news_show_content == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php allure_news_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div> <!-- .allure-news-content-area -->
        <?php
        /**
         * allure_news_social_sharing hook
         * @since 1.0.0
         *
         * @hooked allure_news_constuct_social_sharing -  10
         */
        do_action( 'allure_news_social_sharing' ,get_the_ID() );
        ?>
    </div> <!-- .allure-news-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
