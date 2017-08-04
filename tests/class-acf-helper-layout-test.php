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

	/**
	 * Testing get_acf_repeater_field
	 */

	/**
	 * Test if getting acf repeater field return expected results
	 */
	function test_get_acf_repeater_field() {

		$plugin = acf_helper();

		$sub_fields = array(
			$plugin['acf-helper/basic']->get_acf_text_field( 'first_name', 'First name' ),
			$plugin['acf-helper/basic']->get_acf_text_field( 'last_name', 'Last name' ),
		);

		$expected_sub_fields = array(
			array(
				'key' => 'field_foo_first_name',
				'label' => 'First name',
				'name' => 'foo_first_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',

				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_foo_last_name',
				'label' => 'Last name',
				'name' => 'foo_last_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',

				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		);

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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
			'sub_fields' => $expected_sub_fields,
		);

		$expected_filled = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'repeater',
			'instructions' => 'Add persons to list',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'repeater',
				'id' => 'bar_repeater',
			),
			'collapsed' => 'field_first_name',
			'min' => 5,
			'max' => 10,
			'layout' => 'table',
			'button_label' => 'Add person',
			'sub_fields' => $expected_sub_fields,
		);

		$field 		  = $plugin['acf-helper/layout']->get_acf_repeater_field( 'foo', 'Foo', $sub_fields );
		$field_filled = $plugin['acf-helper/layout']->get_acf_repeater_field( 'foo', 'Foo', $sub_fields, array(
			'instructions' => 'Add persons to list',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'repeater',
				'id' => 'bar_repeater',
			),
			'collapsed' => 'field_first_name',
			'min' => 5,
			'max' => 10,
			'layout' => 'table',
			'button_label' => 'Add person',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf repeater with null as $name value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$sub_fields = array(
			$plugin['acf-helper/basic']->get_acf_text_field( 'first_name', 'First name' ),
			$plugin['acf-helper/basic']->get_acf_text_field( 'last_name', 'Last name' ),
		);

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( null, 'Foo', $sub_fields );
	}

	/**
	 * Test if getting acf repeater with integer as $name value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$sub_fields = array(
			$plugin['acf-helper/basic']->get_acf_text_field( 'first_name', 'First name' ),
			$plugin['acf-helper/basic']->get_acf_text_field( 'last_name', 'Last name' ),
		);

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( 1, 'Foo', $sub_fields );
	}

	/**
	 * Test if getting acf repeater with null as $label value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$sub_fields = array(
			$plugin['acf-helper/basic']->get_acf_text_field( 'first_name', 'First name' ),
			$plugin['acf-helper/basic']->get_acf_text_field( 'last_name', 'Last name' ),
		);

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( 'bar', null, $sub_fields );
	}

	/**
	 * Test if getting acf repeater with integer as $label value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$sub_fields = array(
			$plugin['acf-helper/basic']->get_acf_text_field( 'first_name', 'First name' ),
			$plugin['acf-helper/basic']->get_acf_text_field( 'last_name', 'Last name' ),
		);

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( 'bar', 1.10, $sub_fields );
	}

	/**
	 * Test if getting acf repeater with null as $sub_fields value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_sub_fields_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $sub_fields parameter is not a type of array or is empty.' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( 'foo', 'Foo', null );
	}

	/**
	 * Test if getting acf repeater with empty array as $sub_fields value throw expected exception
	 */
	function test_get_acf_repeater_field_throwing_exception_when_sub_fields_is_empty_array() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $sub_fields parameter is not a type of array or is empty.' );

		$plugin['acf-helper/layout']->get_acf_repeater_field( 'bar', 'Bar', array() );
	}
}
