<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Allure_News_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Allure_News_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Allure_News_Customize_Section_Pro(
				$manager,
				'allure-news',
				array(
					'title'    => esc_html__( 'Unlock More Features', 'allure-news' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'allure-news' ),
					'pro_url'  => 'https://www.candidthemes.com/themes/allure-news-pro/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/candidthemes/customizer-pro/section-pro.php';


		wp_enqueue_script( 'allure-news-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'allure-news-customize-controls', trailingslashit( get_template_directory_uri() ) . '/candidthemes/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Allure_News_Customize::get_instance();

if ( ! class_exists( 'Allure_News_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class Allure_News_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Allure News', 'allure-news')?></h2>
			<p><?php esc_html_e('Allure News is clean and minimal WordPress theme for blog website.', 'allure-news')?> </p>
			<p>
			<a href="<?php echo esc_url('https://allure.candidthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'Allure News Demos', 'allure-news' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'allure-news')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'allure-news')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.candidthemes.com/allure-news/'); ?>" target="_blank"><?php esc_html_e( 'Allure News Documentation', 'allure-news' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'allure-news')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'allure-news')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.candidthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'Allure News Support', 'allure-news' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'allure-news' ); ?></h3>
			<p><?php esc_html_e('If you like Allure News Kindly Rate this Theme', 'allure-news')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/allure-news/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'allure-news' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
