<?php
/**
 * ACF helper relational fields methods
 *
 * This file provide relational ACF helper methods to add programmatically ACF
 * relational fields.
 *
 * @link       http://viewone.pl
 * @since      1.0.0
 *
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 */

/**
 * ACF helper relational fields methods
 *
 * This file provide relational ACF helper methods to add programmatically ACF
 * relational fields.
 *
 * @since      1.0.0
 * @package    Acf_Helper
 * @subpackage Acf_Helper/inc
 * @author     ViewOne <support@viewone.pl>
 */
class Acf_Helper_Relational {

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
	 * Get acf post object field
	 *
	 * Helper function for retrieving acf post object field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf post object field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_post_object_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(),
			'taxonomy' => array(),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
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
	 * Get acf page link field
	 *
	 * Helper function for retrieving acf page link field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf page link field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_page_link_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(),
			'taxonomy' => array(),
			'allow_null' => 0,
			'allow_archives' => 1,
			'multiple' => 0,
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
	 * Get acf relationship field
	 *
	 * Helper function for retrieving acf relationship field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf relationship field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_relationship_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(),
			'taxonomy' => array(),
			'filters' => array(
				0 => 'search',
				1 => 'post_type',
				2 => 'taxonomy',
			),
			'elements' => '',
			'min' => '',
			'max' => '',
			'return_format' => 'object',
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
	 * Get acf taxonomy field
	 *
	 * Helper function for retrieving acf taxonomy field.
	 *
	 * @param string $name Field name used as key and name.
	 * @param string $label Field label displayed at the admin.
	 * @param array  $args Additional arguments which extend defaults.
	 *
	 * @return array Acf taxonomy field
	 *
	 * @throws \InvalidArgumentException Throw exception if $name or $label are
	 * 									 not string.
	 */
	public function get_acf_taxonomy_field( $name, $label, $args = array() ) {

		$field_defaults = array(
			'key' => '',
			'label' => '',
			'name' => '',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'checkbox',
			'allow_null' => 0,
			'add_term' => 1,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'id',
			'multiple' => 0,
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
