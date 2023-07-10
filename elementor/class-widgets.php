<?php

// We check if the Elementor plugin has been installed / activated.
if (!in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	return;
}

/**
 * Include the widgets and create a custom category.
 *
 * @package PEElementor
 *
 * @since 1.9.2
 */
class PE_Elementor_Widget
{

	private static $instance = null;

	/**
	 * @since 1.9.2
	 */
	public static function get_instance()
	{
		if (!self::$instance) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * @since 1.9.2
	 */
	public function init()
	{
		add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));

		add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);

		add_action('elementor/frontend/after_register_styles', array($this, 'register_frontend_styles'), 10);

		add_action('elementor/elements/categories_registered', array($this, 'elementor_widget_categories'));
	}

	/**
	 * Register the widgets.
	 *
	 * @since 1.9.2
	 */
	public function widgets_registered()
	{
		//Require all PHP files in the /elementor/widgets directory
		foreach (glob(PE_PLUGIN_PATH . "elementor/widgets/*.php") as $file) {
			require $file;
		}
	}

	/**
	 * Register the scripts.
	 *
	 * @since 1.9.2
	 */
	public function register_frontend_scripts()
	{
		wp_enqueue_script('owl-js', PE_PLUGIN_URL . 'elementor/assets/js/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_script('projects-engine', PE_PLUGIN_URL . 'elementor/assets/js/projects-engine.js', array('jquery', 'owl-js'), time(), true);
	}

	/**
	 * Register the styles.
	 *
	 * @since 1.9.2
	 */
	public function register_frontend_styles()
	{
		wp_enqueue_style('owl-css', PE_PLUGIN_URL . 'elementor/assets/css/owl.carousel.min.css', null, 1.9);
		wp_enqueue_style('owl-default-css', PE_PLUGIN_URL . 'elementor/assets/css/owl.theme.default.css', null, 1.9);
		wp_enqueue_style('projects-engine', PE_PLUGIN_URL . 'elementor/assets/css/projects-engine.css', null, time());
	}


	/**
	 * Custom elementor dashboard widgets category.
	 * The widgets will be visible here.
	 *
	 * @since 1.9.2
	 *
	 * @param $elements_manager
	 */
	public function elementor_widget_categories($elements_manager)
	{

		$elements_manager->add_category(
			'pe-category',
			[
				'title' => esc_html__('Projects Engine', PE_PLUGIN_DOMAIN),
				'icon'  => 'fa fa-plug',
			]
		);
	}
}

PE_Elementor_Widget::get_instance()->init();
