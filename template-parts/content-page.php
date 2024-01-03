<?php
/**
 * Template part for displaying page content in page.php
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
            the_post_thumbnail();
        endif;
        ?>
        <div class="allure-news-content-area">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title" '.allure_news_get_microdata("heading").'>', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'allure-news'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'allure-news'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
            <?php
            /**
             * allure_news_social_sharing hook
             * @since 1.0.0
             *
             * @hooked allure_news_constuct_social_sharing -  10
             */
            do_action( 'allure_news_social_sharing' ,get_the_ID() );
            ?>
        </div> <!-- .allure-news-content-area -->
    </div> <!-- .allure-news-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
