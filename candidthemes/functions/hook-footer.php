<?php
/**
 * Header Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_footer_start')) {
    /**
     * Add footer start tag.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_start()
    {
        ?>
        <footer id="colophon" class="site-footer">
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_start', 5);

if (!function_exists('allure_news_footer_widget')) {
    /**
     * Add footer top widget blocks
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_widget()
    {
        //Check if there are widgets on any footer sidebar
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
            ?>

            <div class="top-footer">
                <div class="container-inner clearfix">
                    <?php
                    $count = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            $count++;
                        }
                    }
                    $column = $count;
                    $column_class = 'widget-column footer-active-' . absint($count);
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            ?>
                            <div class="ct-col-<?php echo esc_attr($column); ?>">
                                <?php dynamic_sidebar('footer-' . $i); ?>
                            </div>
                            <?php
                        }
                    }

                    ?>
                </div> <!-- .container-inner -->
            </div> <!-- .top-footer -->
            <?php
        }
    }
}
add_action('allure_news_footer', 'allure_news_footer_widget', 15);


if (!function_exists('allure_news_footer_siteinfo')) {
    /**
     * Add footer site info block
     *
     * @param none
     * @return void
     * @since 1.0.0
     *
     */
    function allure_news_footer_siteinfo()
    {
        ?>

        <div class="site-info" <?php allure_news_do_microdata('footer'); ?>>
            <div class="container-inner">
                <?php
                global $allure_news_theme_options;
                $allure_news_copyright = wp_kses_post($allure_news_theme_options['allure-news-footer-copyright']);
                if (!empty($allure_news_copyright)):
                    ?>
                    <span class="copy-right-text"><?php echo $allure_news_copyright; ?></span><br>
                <?php
                endif; //$allure_news_copyright
                ?>

                <a href="<?php echo esc_url(__('https://wordpress.org/', 'allure-news')); ?>" target="_blank">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf(esc_html__('Proudly powered by %s', 'allure-news'), 'WordPress');
                    ?>
                </a>
                <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'allure-news'), 'Allure News', '<a href="https://www.candidthemes.com/" target="_blank">Candid Themes</a>');
                ?>
            </div> <!-- .container-inner -->
        </div><!-- .site-info -->
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_siteinfo', 20);


if (!function_exists('allure_news_footer_end')) {
    /**
     * Add footer end tag.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_end()
    {
        ?>
        </footer><!-- #colophon -->
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_end', 25);

if (!function_exists('allure_news_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_construct_gototop()
    {
        global $allure_news_theme_options;
        if ($allure_news_theme_options['allure-news-go-to-top'] == 1):
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'allure-news'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
        <?php
        endif;

    }
}
add_action('allure_news_gototop', 'allure_news_construct_gototop', 10);