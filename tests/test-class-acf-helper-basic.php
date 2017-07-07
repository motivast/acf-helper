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
	 * A single example test.
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

		$field = $plugin['acf-helper/basic']->get_acf_text_field( 'foo', 'Foo' );

		$this->assertEquals( $field, $expected );
	}
}
