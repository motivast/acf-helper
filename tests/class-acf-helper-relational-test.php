<?php
/**
 * Class Acf_Helper_Relational_Test
 *
 * @package Acf_Helper
 */

/**
 * Test case provided for testing relational ACF helper methods.
 */
class Acf_Helper_Relational_Test extends WP_UnitTestCase {

	/**
	 * Testing get_acf_post_object_field
	 */

	/**
	 * Test if getting acf post object field return expected results
	 */
	function test_get_acf_post_object_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'post_object',
			'instructions' => 'Choice some value',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'post_object',
				'id' => 'bar_post_object',
			),
			'post_type' => array(
				'page'
			),
			'taxonomy' => array(
				'category'
			),
			'allow_null' => 1,
			'multiple' => 1,
			'return_format' => 'ID',
			'ui' => 1,
		);

		$field 		  = $plugin['acf-helper/relational']->get_acf_post_object_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/relational']->get_acf_post_object_field( 'bar', 'Bar', array(
			'instructions' => 'Choice some value',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'post_object',
				'id' => 'bar_post_object',
			),
			'post_type' => array(
				'page'
			),
			'taxonomy' => array(
				'category'
			),
			'allow_null' => 1,
			'multiple' => 1,
			'return_format' => 'ID',
			'ui' => 1,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf post_object with null as $name value throw expected exception
	 */
	function test_get_acf_post_object_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/relational']->get_acf_post_object_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf post_object with integer as $name value throw expected exception
	 */
	function test_get_acf_post_object_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/relational']->get_acf_post_object_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf post_object with null as $label value throw expected exception
	 */
	function test_get_acf_post_object_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/relational']->get_acf_post_object_field( 'bar', null );
	}

	/**
	 * Test if getting acf post_object with integer as $label value throw expected exception
	 */
	function test_get_acf_post_object_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/relational']->get_acf_post_object_field( 'bar', 1.10 );
	}

	/**
	 * Testing get_acf_page_link_field
	 */

	/**
	 * Test if getting acf page link field return expected results
	 */
	function test_get_acf_page_link_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
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

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'page_link',
			'instructions' => 'Choice some page link',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'page_link',
				'id' => 'bar_page_link',
			),
			'post_type' => array(
				'page'
			),
			'taxonomy' => array(
				'category'
			),
			'allow_null' => 1,
			'allow_archives' => 0,
			'multiple' => 1,
		);

		$field 		  = $plugin['acf-helper/relational']->get_acf_page_link_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/relational']->get_acf_page_link_field( 'bar', 'Bar', array(
			'instructions' => 'Choice some page link',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'page_link',
				'id' => 'bar_page_link',
			),
			'post_type' => array(
				'page'
			),
			'taxonomy' => array(
				'category'
			),
			'allow_null' => 1,
			'allow_archives' => 0,
			'multiple' => 1,
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf page_link with null as $name value throw expected exception
	 */
	function test_get_acf_page_link_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/relational']->get_acf_page_link_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf page_link with integer as $name value throw expected exception
	 */
	function test_get_acf_page_link_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/relational']->get_acf_page_link_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf page_link with null as $label value throw expected exception
	 */
	function test_get_acf_page_link_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/relational']->get_acf_page_link_field( 'bar', null );
	}

	/**
	 * Test if getting acf page_link with integer as $label value throw expected exception
	 */
	function test_get_acf_page_link_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "double".' );

		$plugin['acf-helper/relational']->get_acf_page_link_field( 'bar', 1.10 );
	}
}
