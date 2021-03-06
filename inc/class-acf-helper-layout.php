<?php
/**
 * ACF helper layout fields methods
 *
 * This file provide layout ACF helper methods to add programmatically ACF
 * layout fields.
 *
 * @link       http://motivast.com
 * @since      1.0.0
 *
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 */

/**
 * ACF helper layout fields methods
 *
 * This file provide layout ACF helper methods to add programmatically ACF
 * layout fields.
 *
 * @since      1.0.0
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 * @author     Motivast <support@motivast.com>
 */
class Acf_Helper_Layout {

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
	 * Get acf message field
	 *
	 * Helper function for retrieving acf message field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf message field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_message_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
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
	 * Get acf tab field
	 *
	 * Helper function for retrieving acf tab field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf tab field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_tab_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
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
	 * Get acf repeater field
	 *
	 * Helper function for retrieving acf repeater field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $sub_fields Repeatable field sub fields.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf repeater field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_repeater_field( $name, $label, $sub_fields, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(),
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

		if ( ! is_array( $sub_fields ) || empty( $sub_fields ) ) {
			throw new \InvalidArgumentException( 'It looks like $sub_fields parameter is not a type of array or is empty.' );
		}

		foreach ( $sub_fields as $sub_field_key => $sub_field_value ) {

			$sub_fields[ $sub_field_key ]['key'] = sprintf( 'field_%s_%s', $name, $sub_fields[ $sub_field_key ]['name'] );
			$sub_fields[ $sub_field_key ]['name'] = sprintf( '%s_%s', $name, $sub_fields[ $sub_field_key ]['name'] );
		}

		$field['sub_fields'] = $sub_fields;

		return $field;
	}

	/**
	 * Get acf flexible content field
	 *
	 * Helper function for retrieving acf flexible content field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $layouts Repeatable field sub fields.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf flexible content field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_flexible_content_field( $name, $label, $layouts, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(),
			'button_label' => 'Add Row',
			'min' => '',
			'max' => '',
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

		if ( ! is_array( $layouts ) || empty( $layouts ) ) {
			throw new \InvalidArgumentException( 'It looks like $layouts parameter is not a type of array or is empty.' );
		}

		$field['layouts'] = $layouts;

		return $field;
	}

	/**
	 * Get acf flexible content layout
	 *
	 * Helper function for retrieving acf flexible content layout.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $sub_fields Repeatable field sub fields.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf flexible content layout
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_flexible_content_layout( $name, $label, $sub_fields, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'name' => '',
			'label' => '',
			'display' => 'block',
			'sub_fields' => array(),
			'min' => '',
			'max' => '',
		);

		$field = wp_parse_args( $args, $field_defaults );

		if ( ! is_string( $name ) ) {
			throw new \InvalidArgumentException( sprintf( 'It looks like $name parameter is not a type of string but "%s".', gettype( $name ) ) );
		}

		$field['key']  = 'layout_' . $name;
		$field['name'] = $name;

		if ( ! is_string( $label ) ) {
			throw new \InvalidArgumentException( sprintf( 'It looks like $label parameter is not a type of string but "%s".', gettype( $label ) ) );
		}

		$field['label'] = $label;

		if ( ! is_array( $sub_fields ) || empty( $sub_fields ) ) {
			throw new \InvalidArgumentException( 'It looks like $sub_fields parameter is not a type of array or is empty.' );
		}

		foreach ( $sub_fields as $sub_field_key => $sub_field_value ) {

			$sub_fields[ $sub_field_key ]['key'] = sprintf( 'field_%s_%s', $name, $sub_fields[ $sub_field_key ]['name'] );
			$sub_fields[ $sub_field_key ]['name'] = sprintf( '%s_%s', $name, $sub_fields[ $sub_field_key ]['name'] );
		}

		$field['sub_fields'] = $sub_fields;

		return $field;
	}

	/**
	 * Get acf clone field
	 *
	 * Helper function for retrieving acf clone field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf clone field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_clone_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'clone',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'clone' => '',
			'display' => 'seamless',
			'layout' => 'block',
			'prefix_label' => 0,
			'prefix_name' => 0,
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
