<?php
/**
 * Allure News Grid Post Widget.
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Thumb_Posts')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Thumb_Posts extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title' => esc_html__('Thumbnail Posts', 'allure-news'),
                'cat' => 0,
                'post-number' => 6,
                'background_color'=> '#fff',

            );
            return $defaults;
        }

        public function __construct()
        {
            $opts = array(
                'classname' => 'allure-news-thumbnail-post',
                'description' => esc_html__('Help to display content in thumbnail image Layout.', 'allure-news'),
            );

            parent::__construct('allure-news-thumbnail-post', esc_html__('Allure News Thumbnail Post', 'allure-news'), $opts);
        }

        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];

            $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';
            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : 6;
            global $allure_news_theme_options;
            $hide_read_time = $allure_news_theme_options['allure-news-extra-hide-read-time'];

            if (!empty($title)) {
                $cat_class = 'cat-' . $cat_id;
                ?>
                <div class="title-wrapper <?php echo $cat_class; ?>">
                    <?php
                    echo $args['before_title'];
                    if (!empty($cat_id)) {
                        ?>
                        <a href="<?php echo esc_url(get_category_link($cat_id)); ?>"> <?php echo '<span>' .esc_html($title) .'</span>'; ?> </a>
                        <?php
                    } else {
                        echo '<span>' .esc_html($title) .'</span>';
                    }
                    echo $args['after_title'];
                    ?>
                </div>
                <?php
            }

            $query_args = array(
                'post_type' => 'post',
                'cat' => absint($cat_id),
                'posts_per_page' => absint($post_number),
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($query_args);

            if ($query->have_posts()) :

                ?>
                <div class="ct-grid-post clearfix">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="ct-two-cols">

                            <div class="list-post-block">
                                <div class="list-post">
                                    <div class="post-block-style">

                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                            <div class="post-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                            <?php
                                        } else { ?>
                                            <div class="post-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/images/allure-new-thumb.jpg' ?>"
                                                         alt="<?php the_title(); ?>">
                                                </a>
                                            </div><!-- Post thumb end -->
                                        <?php }
                                        ?>
                                        <div class="post-content">
                                            <div class="post-meta">
                                                <?php
                                                allure_news_list_category(get_the_ID());
                                                ?>
                                            </div>
                                            <div class="featured-post-title">
                                                <h3 class="post-title"><a
                                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>

                                            </div>
                                            <div class="post-meta">
                                                <?php
                                                allure_news_posted_on();
                                                allure_news_read_time_words_count(get_the_ID());

                                                ?>
                                            </div>
                                            <?php
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            endif;

            echo $args['after_widget'];

        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['cat'] = absint($new_instance['cat']);
            $instance['post-number'] = absint($new_instance['post-number']);
            return $instance;

        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());

            $title = esc_attr($instance['title']);
            $post_number = absint($instance['post-number']);
            ?>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'allure-news'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p class="custom-dropdown-posts">
                <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                    <strong><?php esc_html_e('Select Category: ', 'allure-news'); ?></strong>
                </label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 0,
                    'id' => $this->get_field_id('cat'),
                    'name' => $this->get_field_name('cat'),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'selected' => absint($instance['cat']),
                    'show_option_all' => esc_html__('Show Recent Posts', 'allure-news')
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>

            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'allure-news'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
                       value="<?php echo esc_attr($instance['post-number']); ?>"/>
            </p>
            <?php
        }
    }

endif;