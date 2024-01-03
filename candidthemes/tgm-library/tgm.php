<?php
/**
 * Recommended plugins
 *
 * @package Prefer 1.0.0
 */

if ( ! function_exists( 'allure_news_recommended_plugins' ) ) :

    /**
     * Recommend plugin list.
     *
     * @since 1.0.0
     */
    function allure_news_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'allure-news' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => __( 'Candid Advanced Toolset', 'allure-news' ),
                'slug'     => 'candid-advanced-toolset',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'allure_news_recommended_plugins' );
