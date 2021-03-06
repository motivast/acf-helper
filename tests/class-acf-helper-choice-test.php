<?php
/**
 * Class Acf_Helper_Choice_Test
 *
 * @package Acf_Helper
 */

/**
 * Test case provided for testing choice ACF helper methods.
 */
class Acf_Helper_Choice_Test extends WP_UnitTestCase {

	/**
	 * Testing get_acf_select_field
	 */

	/**
	 * Test if getting acf select field return expected results
	 */
	function test_get_acf_select_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'select',
			'instructions' => 'Choice some value',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'select',
				'id' => 'bar_select',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'default_value' => array(
				'red'
			),
			'allow_null' => 1,
			'multiple' => 1,
			'ui' => 1,
			'ajax' => 1,
			'return_format' => 'label',
			'placeholder' => 'Choose color',
		);

		$field 		  = $plugin['acf-helper/choice']->get_acf_select_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/choice']->get_acf_select_field( 'bar', 'Bar', array(
			'instructions' => 'Choice some value',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'select',
				'id' => 'bar_select',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'default_value' => array(
				'red'
			),
			'allow_null' => 1,
			'multiple' => 1,
			'ui' => 1,
			'ajax' => 1,
			'return_format' => 'label',
			'placeholder' => 'Choose color',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf select with null as $name value throw expected exception
	 */
	function test_get_acf_select_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_select_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf select with integer as $name value throw expected exception
	 */
	function test_get_acf_select_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_select_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf select with null as $label value throw expected exception
	 */
	function test_get_acf_select_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_select_field( 'bar', null );
	}

	/**
	 * Test if getting acf select with integer as $label value throw expected exception
	 */
	function test_get_acf_select_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/choice']->get_acf_select_field( 'bar', 1.10 );
	}

	/**
	 * Testing get_acf_checkbox_field
	 */

	/**
	 * Test if getting acf checkbox field return expected results
	 */
	function test_get_acf_checkbox_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'checkbox',
			'instructions' => 'Chose color',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'checkbox',
				'id' => 'bar_checkbox',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'allow_custom' => 1,
			'save_custom' => 1,
			'default_value' => array(
				'red'
			),
			'layout' => 'horizontal',
			'toggle' => 1,
			'return_format' => 'label',
		);

		$field 		  = $plugin['acf-helper/choice']->get_acf_checkbox_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/choice']->get_acf_checkbox_field( 'bar', 'Bar', array(
			'instructions' => 'Chose color',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'checkbox',
				'id' => 'bar_checkbox',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'allow_custom' => 1,
			'save_custom' => 1,
			'default_value' => array(
				'red'
			),
			'layout' => 'horizontal',
			'toggle' => 1,
			'return_format' => 'label',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf checkbox with null as $name value throw expected exception
	 */
	function test_get_acf_checkbox_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_checkbox_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf checkbox with integer as $name value throw expected exception
	 */
	function test_get_acf_checkbox_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_checkbox_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf checkbox with null as $label value throw expected exception
	 */
	function test_get_acf_checkbox_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_checkbox_field( 'bar', null );
	}

	/**
	 * Test if getting acf checkbox with integer as $label value throw expected exception
	 */
	function test_get_acf_checkbox_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/choice']->get_acf_checkbox_field( 'bar', 1.10 );
	}

	/**
	 * Testing get_acf_radio_field
	 */

	/**
	 * Test if getting acf radio field return expected results
	 */
	function test_get_acf_radio_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
			'return_format' => 'value',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'radio',
			'instructions' => 'Choice color',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'radio',
				'id' => 'bar_radio',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'allow_null' => 1,
			'other_choice' => 1,
			'save_other_choice' => 1,
			'default_value' => 'red',
			'layout' => 'horizontal',
			'return_format' => 'label',
		);

		$field 		  = $plugin['acf-helper/choice']->get_acf_radio_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/choice']->get_acf_radio_field( 'bar', 'Bar', array(
			'instructions' => 'Choice color',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'radio',
				'id' => 'bar_radio',
			),
			'choices' => array(
				'red' => 'Red',
				'green' => 'Green',
				'blue' => 'Blue',
			),
			'allow_null' => 1,
			'other_choice' => 1,
			'save_other_choice' => 1,
			'default_value' => 'red',
			'layout' => 'horizontal',
			'return_format' => 'label',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf radio with null as $name value throw expected exception
	 */
	function test_get_acf_radio_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_radio_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf radio with integer as $name value throw expected exception
	 */
	function test_get_acf_radio_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_radio_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf radio with null as $label value throw expected exception
	 */
	function test_get_acf_radio_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_radio_field( 'bar', null );
	}

	/**
	 * Test if getting acf radio with integer as $label value throw expected exception
	 */
	function test_get_acf_radio_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_radio_field( 'bar', 1 );
	}

	/**
	 * Testing get_acf_true_false_field
	 */

	/**
	 * Test if getting acf true_false field return expected results
	 */
	function test_get_acf_true_false_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'true_false',
			'instructions' => 'Check box if true',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'true_false',
				'id' => 'bar_true_false',
			),
			'message' => 'Check box if true',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		);

		$field 		  = $plugin['acf-helper/choice']->get_acf_true_false_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/choice']->get_acf_true_false_field( 'bar', 'Bar', array(
			'instructions' => 'Check box if true',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'true_false',
				'id' => 'bar_true_false',
			),
			'message' => 'Check box if true',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf true_false with null as $name value throw expected exception
	 */
	function test_get_acf_true_false_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_true_false_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf true_false with integer as $name value throw expected exception
	 */
	function test_get_acf_true_false_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_true_false_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf true_false with null as $label value throw expected exception
	 */
	function test_get_acf_true_false_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/choice']->get_acf_true_false_field( 'bar', null );
	}

	/**
	 * Test if getting acf true_false with integer as $label value throw expected exception
	 */
	function test_get_acf_true_false_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/choice']->get_acf_true_false_field( 'bar', 1 );
	}
}
