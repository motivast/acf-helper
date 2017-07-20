<?php
/**
 * ACF helper choice fields methods
 *
 * This file provide choice ACF helper methods to add programmatically ACF
 * choice fields.
 *
 * @link       http://viewone.pl
 * @since      1.0.0
 *
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 */

/**
 * ACF helper choice fields methods
 *
 * This file provide choice ACF helper methods to add programmatically ACF
 * choice fields.
 *
 * @since      1.0.0
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 * @author     ViewOne <support@viewone.pl>
 */
class Acf_Helper_Choice {

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
	 * Get acf select field
	 *
	 * Helper function for retrieving acf select field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf select field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_select_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(),
			'default_value' => array(),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
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

	/**
	 * Get acf checkbox field
	 *
	 * Helper function for retrieving acf checkbox field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf checkbox field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_checkbox_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(),
			'allow_custom' => 0,
			'save_custom' => 0,
			'default_value' => array(),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
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
