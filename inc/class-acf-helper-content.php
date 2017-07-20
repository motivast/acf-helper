<?php
/**
 * ACF helper content fields methods
 *
 * This file provide content ACF helper methods to add programmatically ACF
 * content fields.
 *
 * @link       http://viewone.pl
 * @since      1.0.0
 *
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 */

/**
 * ACF helper content fields methods
 *
 * This file provide content ACF helper methods to add programmatically ACF
 * content fields.
 *
 * @since      1.0.0
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 * @author     ViewOne <support@viewone.pl>
 */
class Acf_Helper_Content {

	/**
	 * Plugin container.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object $theme ACF Helper plugin container
	 */
	private $plugin;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    object $plugin ACF Helper plugin container.
	 */
	public function __construct( $plugin ) {

		$this->plugin = $plugin;
	}

	/**
	 * Get acf wysiwyg field
	 *
	 * Helper function for retrieving acf wysiwyg field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf wysiwyg field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_wysiwyg_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		);

		$field = wp_parse_args( $args, $field_defaults );

		if ( ! is_string( $name ) ) {
			throw new \InvalidArgumentException( sprintf( 'It looks like $name parameter is not a type of string but "%s".', gettype( $name ) ) );
		}

		$field['key']  = 'field_' . $name;
		$field['name'] = $name;

		if ( ! is_string( $label ) ) {
			throw new \InvalidArgumentException( sprintf( 'It looks like $label parameter is not a type of string but "%s".', gettype( $label ) ) );
		}

		$field['label'] = $label;

		return $field;
	}
}
