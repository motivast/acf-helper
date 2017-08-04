<?php
/**
 * Class Acf_Helper_Layout_Test
 *
 * @package Acf_Helper
 */

/**
 * Test case provided for testing layout ACF helper methods.
 */
class Acf_Helper_Layout_Test extends WP_UnitTestCase {

	/**
	 * Testing get_acf_message_field
	 */

	/**
	 * Test if getting acf message field return expected results
	 */
	function test_get_acf_message_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'message',
			'instructions' => 'Message instruction',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'message',
				'id' => 'bar_message',
			),
			'message' => 'This is message',
			'new_lines' => 'br',
			'esc_html' => 1,
		);

		$field 		  = $plugin['acf-helper/layout']->get_acf_message_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/layout']->get_acf_message_field( 'bar', 'Bar', array(
			'instructions' => 'Message instruction',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'message',
				'id' => 'bar_message',
			),
			'message' => 'This is message',
			'new_lines' => 'br',
			'esc_html' => 1,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf message with null as $name value throw expected exception
	 */
	function test_get_acf_message_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_message_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf message with integer as $name value throw expected exception
	 */
	function test_get_acf_message_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/layout']->get_acf_message_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf message with null as $label value throw expected exception
	 */
	function test_get_acf_message_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_message_field( 'bar', null );
	}

	/**
	 * Test if getting acf message with integer as $label value throw expected exception
	 */
	function test_get_acf_message_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/layout']->get_acf_message_field( 'bar', 1.10 );
	}

	/**
	 * Testing get_acf_tab_field
	 */

	/**
	 * Test if getting acf tab field return expected results
	 */
	function test_get_acf_tab_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'tab',
			'instructions' => 'Tab instructions',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'tab',
				'id' => 'bar_tab',
			),
			'placement' => 'left',
			'endpoint' => 1,
		);

		$field 		  = $plugin['acf-helper/layout']->get_acf_tab_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/layout']->get_acf_tab_field( 'bar', 'Bar', array(
			'instructions' => 'Tab instructions',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'tab',
				'id' => 'bar_tab',
			),
			'placement' => 'left',
			'endpoint' => 1,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf tab with null as $name value throw expected exception
	 */
	function test_get_acf_tab_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_tab_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf tab with integer as $name value throw expected exception
	 */
	function test_get_acf_tab_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/layout']->get_acf_tab_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf tab with null as $label value throw expected exception
	 */
	function test_get_acf_tab_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_tab_field( 'bar', null );
	}

	/**
	 * Test if getting acf tab with integer as $label value throw expected exception
	 */
	function test_get_acf_tab_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/layout']->get_acf_tab_field( 'bar', 1.10 );
	}
}
