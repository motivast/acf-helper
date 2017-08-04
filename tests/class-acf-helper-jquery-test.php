<?php
/**
 * Class Acf_Helper_JQuery_Test
 *
 * @package Acf_Helper
 */

/**
 * Test case provided for testing jquery ACF helper methods.
 */
class Acf_Helper_JQuery_Test extends WP_UnitTestCase {

	/**
	 * Testing get_acf_google_map_field
	 */

	/**
	 * Test if getting acf google map field return expected results
	 */
	function test_get_acf_google_map_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'google_map',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'google_map',
			'instructions' => 'Choose location',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'google_map',
				'id' => 'bar_google_map',
			),
			'center_lat' => '-36.81411',
			'center_lng' => '143.96328',
			'zoom' => '13',
			'height' => '450',
		);

		$field 		  = $plugin['acf-helper/jquery']->get_acf_google_map_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/jquery']->get_acf_google_map_field( 'bar', 'Bar', array(
			'instructions' => 'Choose location',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'google_map',
				'id' => 'bar_google_map',
			),
			'center_lat' => '-36.81411',
			'center_lng' => '143.96328',
			'zoom' => '13',
			'height' => '450',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf google map with null as $name value throw expected exception
	 */
	function test_get_acf_google_map_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/jquery']->get_acf_google_map_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf google map with integer as $name value throw expected exception
	 */
	function test_get_acf_google_map_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/jquery']->get_acf_google_map_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf google map with null as $label value throw expected exception
	 */
	function test_get_acf_google_map_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/jquery']->get_acf_google_map_field( 'bar', null );
	}

	/**
	 * Test if getting acf google map with integer as $label value throw expected exception
	 */
	function test_get_acf_google_map_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/jquery']->get_acf_google_map_field( 'bar', 1.10 );
	}
}
