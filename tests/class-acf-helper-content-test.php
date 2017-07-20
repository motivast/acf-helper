<?php
/**
 * Class Acf_Helper_Content_Test
 *
 * @package Acf_Helper
 */

/**
 * Test case provided for testing content ACF helper methods.
 */
class Acf_Helper_Content_Test extends WP_UnitTestCase {

	/**
	 * Testing get_acf_wysiwyg_field
	 */

	/**
	 * Test if getting acf wysiwyg field return expected results
	 */
	function test_get_acf_wysiwyg_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'wysiwyg',
			'instructions' => 'Type some text',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'wysiwyg',
				'id' => 'bar_wysiwyg',
			),
			'default_value' => 'Default text',
			'tabs' => 'visual',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 1,
		);

		$field 		  = $plugin['acf-helper/content']->get_acf_wysiwyg_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/content']->get_acf_wysiwyg_field( 'bar', 'Bar', array(
			'instructions' => 'Type some text',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'wysiwyg',
				'id' => 'bar_wysiwyg',
			),
			'default_value' => 'Default text',
			'tabs' => 'visual',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 1,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf wysiwyg with null as $name value throw expected exception
	 */
	function test_get_acf_wysiwyg_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_wysiwyg_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf wysiwyg with integer as $name value throw expected exception
	 */
	function test_get_acf_wysiwyg_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_wysiwyg_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf wysiwyg with null as $label value throw expected exception
	 */
	function test_get_acf_wysiwyg_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_wysiwyg_field( 'bar', null );
	}

	/**
	 * Test if getting acf wysiwyg with integer as $label value throw expected exception
	 */
	function test_get_acf_wysiwyg_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/content']->get_acf_wysiwyg_field( 'bar', 1.10 );
	}
}
