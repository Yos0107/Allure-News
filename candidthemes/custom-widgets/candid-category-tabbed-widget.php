<?php
/**
 * Allure News Post Category Tabbed Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Category_Tabbed_Post')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Category_Tabbed_Post extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title' => esc_html__('Category Tabbed', 'allure-news'),
                'post-number' => 5,
            );
            return $defaults;
        }

        public function __construct()
        {
            $opts = array(
                'classname' => 'allure-news-category-tabbed',
                'description' => esc_html__('Category Tabbed Widget for multiple content.', 'allure-news'),
            );
            parent::__construct('allure-news-category-tabbed', esc_html__('Allure News Category Tabbed', 'allure-news'), $opts);
        }

        //Frontend Display
      public function widget( $args, $instance ) 
      {
        $instance = wp_parse_args( (array) $instance, $this->defaults() );
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];

        if (!empty($title)) {
          echo $args['before_title'] . esc_html($title) . $args['after_title']; }
        $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
        ?>
        <?php
          // Get all categories
          $categories = get_categories();

          // Check if there are any categories
          if (!empty($categories)) {
              echo '<div class="cate-tabs">';

              // Create tabs
              echo '<ul class="cate-tabs-nav">';
              foreach ($categories as $category) {
                $cateID = $category->cat_ID;
                  echo '<li><a href="#' . $category->slug . '">' . $category->name . '</a></li>';
              }
              echo '</ul>';

              // Create content for each tab
              foreach ($categories as $category) {
                $cateID = $category->cat_ID;            
              ?>
              <div id = "<?php echo $category->slug; ?>" >
              <section class="featured-posts-block">
                <div class="list-post-block">
                    <ul class="list-post">
                        <?php
                          $p_query_args = array(
                          'post_type' => 'post',
                          'posts_per_page' => $post_number,
                          'ignore_sticky_posts' => true,
                          'cat' => $cateID
                      );
                      $p_query = new WP_Query($p_query_args);

                        while ($p_query->have_posts()):
                            $p_query->the_post();  
                            ?>
                            <li>
                                <div class="post-block-style">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div><!-- Post thumb end -->
                                    <?php } ?>

                                    <div class="post-content">
                                        <div class="post-meta">
                                            <?php
                                            allure_news_list_category(get_the_ID());
                                            ?>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                            <div class="post-meta">
                                                <?php allure_news_posted_on(); ?>
                                            </div>
                                    </div>
                                </div>
                            </li>

                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </ul><!-- List post end -->
                </div><!-- List post block end -->
              </section>
              </div>
              <?php 
                }
            }
              echo '</div>';
          ?>

    <?php
    echo $args['after_widget']; 
      }

        //Data update
      public function update($new_instance, $old_instance)
      {
        $instance = $old_instance;
    
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post-number'] = absint($new_instance['post-number']);
    
        return $instance;
      }
    
      //Backend Display
      public function form($instance)
      {
        $instance  = wp_parse_args( (array )$instance, $this->defaults() );
        $title    = esc_attr($instance['title']);
        $post_number    = absint( $instance['post-number'] );
    
        ?>
        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'allure-news'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
            name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
            value="<?php echo esc_attr($instance['title']); ?>"/>
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