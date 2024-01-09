<?php
/**
 *  Allure News Category Color Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Category Color Options*/
$wp_customize->add_section('allure_news_category_color_setting', array(
    'priority'      => 72,
    'title'         => __('Category Color', 'allure-news'),
    'description'   => __('You can select the different color for each category.', 'allure-news'),
    'panel'          => 'allure_news_panel'
));

/* Category Line Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-category-line-color]',
    array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['allure-news-category-line-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-category-line-color]',
        array(
            'label'       => esc_html__( 'Category First Line Color', 'allure-news' ),
            'description' => esc_html__( 'Will change the line color of category button.', 'allure-news' ),
            'section'     => 'allure_news_category_color_setting',
            'settings'  => 'allure_news_options[allure-news-category-line-color]',
            'priority'  => 1,
        )
    )
);

/*Customizer color*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-category-color]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-category-color'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-category-color]', array(
   'label'     => __( 'Enable Category Color', 'allure-news' ),
   'description' => __('Checked to enable the category color and select the required color for each category.', 'allure-news'),
   'section'   => 'allure_news_category_color_setting',
   'settings'  => 'allure_news_options[allure-news-enable-category-color]',
   'type'      => 'checkbox',
   'priority'  => 1,
) );

/*callback functions header section*/
if ( !function_exists('allure_news_colors_active_callback') ) :
  function allure_news_colors_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_color = absint($allure_news_theme_options['allure-news-enable-category-color']);
      if( 1 == $enable_color ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

$i = 1;
$args = array(
    'orderby' => 'id',
    'hide_empty' => 0
);
$categories = get_categories( $args );
$wp_category_list = array();
foreach ($categories as $category_list ) {
    $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

    $wp_customize->add_setting('allure_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']', array(
        'default'           => $default['allure-news-primary-color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
		    'allure_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
		    array(
		    	'label'     => sprintf(__('"%s" Color', 'allure-news'), $wp_category_list[$category_list->cat_ID] ),
			    'section'   => 'allure_news_category_color_setting',
			    'settings'  => 'allure_news_options[cat-'.get_cat_id($wp_category_list[$category_list->cat_ID]).']',
			    'priority'  => $i,
                'active_callback'   => 'allure_news_colors_active_callback'
		    )
	    )
    );
    $i++;
}

