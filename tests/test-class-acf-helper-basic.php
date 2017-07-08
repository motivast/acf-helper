<?php
/**
 * Class SampleTest
 *
 * @package Acf_Helper
 */

/**
 * Sample test case.
 */
class Acf_Helper_BasicTest extends WP_UnitTestCase {

	/**
	 * Testing get_acf_text_field
	 */

	/**
	 * Test if getting acf text field return expected results
	 */
	function test_get_acf_text_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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
		);

		$expected_filled = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'text',
			'instructions' => 'Some instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'test',
				'id' => 'test',
			),
			'default_value' => 'bar',
			'placeholder' => 'Type text',
			'prepend' => '*',
			'append' => '$',
			'maxlength' => 100,
		);

		$field 		  = $plugin['acf-helper/basic']->get_acf_text_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/basic']->get_acf_text_field( 'foo', 'Foo', array(
			'instructions' => 'Some instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'test',
				'id' => 'test',
			),
			'default_value' => 'bar',
			'placeholder' => 'Type text',
			'prepend' => '*',
			'append' => '$',
			'maxlength' => 100,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf text with null as $name value throw expected exception
	 */
	function test_get_acf_text_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_text_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf text with integer as $name value throw expected exception
	 */
	function test_get_acf_text_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_text_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf text with null as $label value throw expected exception
	 */
	function test_get_acf_text_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_text_field( 'foo', null );
	}

	/**
	 * Test if getting acf text with integer as $label value throw expected exception
	 */
	function test_get_acf_text_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_text_field( 'foo', 1 );
	}

	/**
	 * Testing get_acf_textarea_field
	 */

	/**
	 * Test if getting acf text field return expected results
	 */
	function test_get_acf_textarea_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'textarea',
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

			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'textarea',
			'instructions' => 'Some instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'textarea',
				'id' => 'bar_textarea',
			),
			'default_value' => 'Default',
			'placeholder' => 'Type some text',

			'maxlength' => 100,
			'rows' => 80,
			'new_lines' => 'br',
		);

		$field 		  = $plugin['acf-helper/basic']->get_acf_textarea_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/basic']->get_acf_textarea_field( 'bar', 'Bar', array(
			'instructions' => 'Some instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'textarea',
				'id' => 'bar_textarea',
			),
			'default_value' => 'Default',
			'placeholder' => 'Type some text',

			'maxlength' => 100,
			'rows' => 80,
			'new_lines' => 'br',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf text with null as $name value throw expected exception
	 */
	function test_get_acf_textarea_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_textarea_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf text with integer as $name value throw expected exception
	 */
	function test_get_acf_textarea_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_textarea_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf text with null as $label value throw expected exception
	 */
	function test_get_acf_textarea_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_textarea_field( 'foo', null );
	}

	/**
	 * Test if getting acf text with integer as $label value throw expected exception
	 */
	function test_get_acf_textarea_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_textarea_field( 'foo', 1 );
	}

	/**
	 * Testing get_acf_number_field
	 */

	/**
	 * Test if getting acf number field return expected results
	 */
	function test_get_acf_number_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'number',
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
			'min' => '',
			'max' => '',
			'step' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'number',
			'instructions' => 'Some number instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'number',
				'id' => 'bar_number',
			),
			'default_value' => 'Default number',
			'placeholder' => 'Type some number',

			'prepend' => '$',
			'append' => 'EUR',
			'min' => 10,
			'max' => 20,
			'step' => 2,
		);

		$field		  = $plugin['acf-helper/basic']->get_acf_number_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/basic']->get_acf_number_field( 'bar', 'Bar', array(
			'instructions' => 'Some number instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'number',
				'id' => 'bar_number',
			),
			'default_value' => 'Default number',
			'placeholder' => 'Type some number',

			'prepend' => '$',
			'append' => 'EUR',
			'min' => 10,
			'max' => 20,
			'step' => 2,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf number with null as $name value throw expected exception
	 */
	function test_get_acf_number_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_number_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf number with integer as $name value throw expected exception
	 */
	function test_get_acf_number_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_number_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf number with null as $label value throw expected exception
	 */
	function test_get_acf_number_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_number_field( 'foo', null );
	}

	/**
	 * Test if getting acf number with integer as $label value throw expected exception
	 */
	function test_get_acf_number_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_number_field( 'foo', 1 );
	}

	/**
	 * Testing get_acf_email_field
	 */

	/**
	 * Test if getting acf email field return expected results
	 */
	function test_get_acf_email_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'email',
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
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'email',
			'instructions' => 'Some email instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'email',
				'id' => 'bar_email',
			),
			'default_value' => 'Default email',
			'placeholder' => 'Type some email',

			'prepend' => '*',
			'append' => '$',
		);

		$field		  = $plugin['acf-helper/basic']->get_acf_email_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/basic']->get_acf_email_field( 'bar', 'Bar', array(
			'instructions' => 'Some email instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'email',
				'id' => 'bar_email',
			),
			'default_value' => 'Default email',
			'placeholder' => 'Type some email',

			'prepend' => '*',
			'append' => '$',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf email with null as $name value throw expected exception
	 */
	function test_get_acf_email_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_email_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf email with integer as $name value throw expected exception
	 */
	function test_get_acf_email_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_email_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf email with null as $label value throw expected exception
	 */
	function test_get_acf_email_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_email_field( 'foo', null );
	}

	/**
	 * Test if getting acf email with integer as $label value throw expected exception
	 */
	function test_get_acf_email_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_email_field( 'foo', 1 );
	}

	/**
	 * Testing get_acf_url_field
	 */

	/**
	 * Test if getting acf url field return expected results
	 */
	function test_get_acf_url_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'url',
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
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'url',
			'instructions' => 'Some url instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'url',
				'id' => 'bar_url',
			),
			'default_value' => 'Default url',
			'placeholder' => 'Type some url',
		);

		$field		  = $plugin['acf-helper/basic']->get_acf_url_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/basic']->get_acf_url_field( 'bar', 'Bar', array(
			'instructions' => 'Some url instructions',
			'required' => 1,
			'conditional_logic' => 1,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'url',
				'id' => 'bar_url',
			),
			'default_value' => 'Default url',
			'placeholder' => 'Type some url',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf url with null as $name value throw expected exception
	 */
	function test_get_acf_url_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_url_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf url with integer as $name value throw expected exception
	 */
	function test_get_acf_url_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_url_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf url with null as $label value throw expected exception
	 */
	function test_get_acf_url_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/basic']->get_acf_url_field( 'foo', null );
	}

	/**
	 * Test if getting acf url with integer as $label value throw expected exception
	 */
	function test_get_acf_url_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/basic']->get_acf_url_field( 'foo', 1 );
	}
}
