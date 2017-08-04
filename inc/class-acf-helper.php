<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://viewone.pl
 * @since      1.0.0
 *
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 * @author     ViewOne <support@viewone.pl>
 */
class Acf_Helper extends ACF_Helper_Container {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Acf_Helper_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'acf-helper';
		$this->version = '1.0.0';

		$this->load_dependencies();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - ACF Helper functions.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * Require basic acf helper functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-acf-helper-basic.php';

		/**
		 * Require content acf helper functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-acf-helper-content.php';

		/**
		 * Require choice acf helper functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-acf-helper-choice.php';
        
        /**
         * Require relational acf helper functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-acf-helper-relational.php';
		
		/**
		 * Require jquery acf helper functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-acf-helper-jquery.php';

		$this['acf-helper/basic']       = new Acf_Helper_Basic( $this );
		$this['acf-helper/content']     = new Acf_Helper_Content( $this );
		$this['acf-helper/choice']      = new Acf_Helper_Choice( $this );
		$this['acf-helper/relational']  = new Acf_Helper_Relational( $this );
		$this['acf-helper/jquery']      = new Acf_Helper_JQuery( $this );

	}
}
