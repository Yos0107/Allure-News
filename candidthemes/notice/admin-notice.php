<?php
/**
 * Display notice on admin page after theme installed before 10 days
 *
 * @package Allure_News
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class to display the `Upgrade to Pro` admin notice.
 *
 * Class Allure_News_Theme_Notice
 */
class Allure_News_Theme_Notice {

	/**
	 * Currently active theme in the site.
	 *
	 * @var \WP_Theme
	 */
	protected $active_theme;

	/**
	 * Current user id.
	 *
	 * @var int Current user id.
	 */
	protected $current_user_data;

	/**
	 * Constructor function for `Upgrade To Pro` admin notice.
	 *
	 * Allure_News_Theme_Notice constructor.
	 */
	public function __construct() {

		add_action( 'after_setup_theme', array( $this, 'allure_news_pro_theme_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}

	/**
	 * Function to hold the available themes, which have pro version available.
	 *
	 * @return array Theme lists.
	 */
	public static function get_theme() {

		$theme_name = array(
			'allure news'      => 'https://www.candidthemes.com/themes/allure-news-pro/',
		);

		return $theme_name;

	}
	public function allure_news_pro_theme_notice() {

		global $current_user;
		$this->current_user_data = $current_user;
		$this->active_theme      = wp_get_theme();

		if ( is_child_theme() ) {
			$this->active_theme = wp_get_theme()->parent()->get( 'Name' );
		}

		$option = get_option( 'allure_news_theme_activate_start_time' );

		if ( ! $option ) {
			update_option( 'allure_news_theme_activate_start_time', time() );
		}

		add_action( 'admin_notices', array( $this, 'allure_news_pro_theme_notice_markup' ), 0 );
		add_action( 'admin_init', array( $this, 'allure_news_pro_theme_notice_partial_ignore' ), 0 );
		add_action( 'admin_init', array( $this, 'allure_news_pro_theme_notice_ignore' ), 0 );

	}
	public function enqueue_scripts() {

		wp_enqueue_style( 'allure-notice', get_template_directory_uri() . '/candidthemes/notice/admin-notice.css', array(), '4.5.0' );
	}
	public function allure_news_pro_theme_notice_markup() {

		$theme_name             = self::get_theme();
		$current_theme           = strtolower( $this->active_theme );

		$theme_notice_start_time = get_option( 'allure_news_theme_activate_start_time' );
		$buy_before_questions    = ( 'allure news' !== $current_theme ) ? "https://www.candidthemes.com/contact/" : "https://www.candidthemes.com/contact/";
		$ignore_notice_permanent = get_user_meta( $this->current_user_data->ID, 'allure_news_nag_allure_news_pro_theme_notice_ignore', true );
		$ignore_notice_partially = get_user_meta( $this->current_user_data->ID, 'allure_news_nag_allure_news_pro_theme_notice_partial_ignore', true );

		if ( ! array_key_exists( $current_theme, $theme_name ) ) {
			return;
		}
		if ( ( $theme_notice_start_time > strtotime( '-10 days' ) ) || ( $ignore_notice_partially > strtotime( '-5 days' ) ) || ( $ignore_notice_permanent ) ) {
			return;
		}
		?>
		<div class="allure-admin-notice updated allure-pro-admin-notice">
			<p>
				<?php
				$pro_link = '<a target="_blank" href=" ' . esc_url( $theme_name[ $current_theme ] ) . ' ">' . esc_html__( 'unlock more features with pro theme', 'allure-news' ) . '</a>';

				printf(
					esc_html__(
						/* Translators: %1$s current user display name., %2$s Currently activated theme., %3$s Pro theme link., %4$s Coupon code. */
						'Howdy, %1$s! You\'ve been using %2$s theme for a while now, and we hope you\'re happy with it. If you are looking for the premium features, you can %3$s. Moreover, you can use the coupon code %4$s to get 20 percent discount. Enjoy!', 'allure-news'
					),
					'<strong>' . esc_html( $this->current_user_data->display_name ) . '</strong>',
					$this->active_theme,
					$pro_link,
					'<code>offer20</code>'
				);
				?>
			</p>

			<div class="links">
				<a href="<?php echo esc_url( $theme_name[ $current_theme ] ); ?>" class="btn button-primary"
				   target="_blank">
					<span class="dashicons dashicons-cart"></span>
					<span><?php esc_html_e( 'Unlock More Features', 'allure-news' ); ?></span>
				</a>

				<a href="?allure_news_nag_allure_news_pro_theme_notice_partial_ignore=1" class="btn button-secondary">
					<span class="dashicons dashicons-calendar-alt"></span>
					<span><?php esc_html_e( 'Remind later', 'allure-news' ); ?></span>
				</a>

				<a href="<?php echo esc_url( $buy_before_questions ); ?>"
				   class="btn button-secondary" target="_blank">
					<span class="dashicons dashicons-email-alt"></span>
					<span><?php esc_html_e( 'Contact Us', 'allure-news' ); ?></span>
				</a>
			</div>

			<a class="allure-pro-admin-notice-dismiss" href="?allure_news_nag_allure_news_pro_theme_notice_ignore=1"></a>
		</div>

		<?php
	}
	public function allure_news_pro_theme_notice_partial_ignore() {

		$user_id = $this->current_user_data->ID;

		if ( isset( $_GET['allure_news_nag_allure_news_pro_theme_notice_partial_ignore'] ) && '1' == $_GET['allure_news_nag_allure_news_pro_theme_notice_partial_ignore'] ) {
			update_user_meta( $user_id, 'allure_news_nag_allure_news_pro_theme_notice_partial_ignore', time() );
		}

	}
	public function allure_news_pro_theme_notice_ignore() {

		$user_id = $this->current_user_data->ID;

		if ( isset( $_GET['allure_news_nag_allure_news_pro_theme_notice_ignore'] ) && '1' == $_GET['allure_news_nag_allure_news_pro_theme_notice_ignore'] ) {
			update_user_meta( $user_id, 'allure_news_nag_allure_news_pro_theme_notice_ignore', time() );
		}

	}
}
new Allure_News_Theme_Notice();
