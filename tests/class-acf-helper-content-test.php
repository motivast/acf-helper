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

	/**
	 * Testing get_acf_oembed_field
	 */

	/**
	 * Test if getting acf oembed field return expected results
	 */
	function test_get_acf_oembed_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'oembed',
			'instructions' => 'Type some url',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'oembed',
				'id' => 'bar_oembed',
			),
			'width' => '640',
			'height' => '480',
		);

		$field 		  = $plugin['acf-helper/content']->get_acf_oembed_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/content']->get_acf_oembed_field( 'bar', 'Bar', array(
			'instructions' => 'Type some url',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'oembed',
				'id' => 'bar_oembed',
			),
			'width' => '640',
			'height' => '480',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf oembed with null as $name value throw expected exception
	 */
	function test_get_acf_oembed_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_oembed_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf oembed with integer as $name value throw expected exception
	 */
	function test_get_acf_oembed_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_oembed_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf oembed with null as $label value throw expected exception
	 */
	function test_get_acf_oembed_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_oembed_field( 'bar', null );
	}

	/**
	 * Test if getting acf oembed with integer as $label value throw expected exception
	 */
	function test_get_acf_oembed_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_oembed_field( 'bar', 1 );
	}

	/**
	 * Testing get_acf_image_field
	 */

	/**
	 * Test if getting acf image field return expected results
	 */
	function test_get_acf_image_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'image',
			'instructions' => 'Upload some image',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'image',
				'id' => 'bar_image',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'uploadedTo',
			'min_width' => '640',
			'min_height' => '480',
			'min_size' => '1',
			'max_width' => '1280',
			'max_height' => '960',
			'max_size' => '10',
			'mime_types' => 'image/jpeg',
		);

		$field 		  = $plugin['acf-helper/content']->get_acf_image_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/content']->get_acf_image_field( 'bar', 'Bar', array(
			'instructions' => 'Upload some image',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'image',
				'id' => 'bar_image',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'uploadedTo',
			'min_width' => '640',
			'min_height' => '480',
			'min_size' => '1',
			'max_width' => '1280',
			'max_height' => '960',
			'max_size' => '10',
			'mime_types' => 'image/jpeg',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf image with null as $name value throw expected exception
	 */
	function test_get_acf_image_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_image_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf image with integer as $name value throw expected exception
	 */
	function test_get_acf_image_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_image_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf image with null as $label value throw expected exception
	 */
	function test_get_acf_image_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_image_field( 'bar', null );
	}

	/**
	 * Test if getting acf image with integer as $label value throw expected exception
	 */
	function test_get_acf_image_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_image_field( 'bar', 1 );
	}

	/**
	 * Testing get_acf_file_field
	 */

	/**
	 * Test if getting acf file field return expected results
	 */
	function test_get_acf_file_field() {

		$plugin = acf_helper();

		$expected = array(
			'key' => 'field_foo',
			'label' => 'Foo',
			'name' => 'foo',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		);

		$expected_filled = array(
			'key' => 'field_bar',
			'label' => 'Bar',
			'name' => 'bar',
			'type' => 'file',
			'instructions' => 'Upload some file',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'file',
				'id' => 'bar_file',
			),
			'return_format' => 'id',
			'library' => 'all',
			'min_size' => '1',
			'max_size' => '10',
			'mime_types' => 'application/pdf',
		);

		$field 		  = $plugin['acf-helper/content']->get_acf_file_field( 'foo', 'Foo' );
		$field_filled = $plugin['acf-helper/content']->get_acf_file_field( 'bar', 'Bar', array(
			'instructions' => 'Upload some file',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50%',
				'class' => 'file',
				'id' => 'bar_file',
			),
			'return_format' => 'id',
			'library' => 'all',
			'min_size' => '1',
			'max_size' => '10',
			'mime_types' => 'application/pdf',
		) );

		$this->assertEquals( $field, $expected );
		$this->assertEquals( $field_filled, $expected_filled );
	}

	/**
	 * Test if getting acf file with null as $name value throw expected exception
	 */
	function test_get_acf_file_field_throwing_exception_when_name_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_file_field( null, 'Foo' );
	}

	/**
	 * Test if getting acf file with integer as $name value throw expected exception
	 */
	function test_get_acf_file_field_throwing_exception_when_name_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $name parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_file_field( 1, 'Foo' );
	}

	/**
	 * Test if getting acf file with null as $label value throw expected exception
	 */
	function test_get_acf_file_field_throwing_exception_when_label_is_null() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "NULL".' );

		$plugin['acf-helper/content']->get_acf_file_field( 'bar', null );
	}

	/**
	 * Test if getting acf file with integer as $label value throw expected exception
	 */
	function test_get_acf_file_field_throwing_exception_when_label_is_integer() {

		$plugin = acf_helper();

		$this->expectException( \InvalidArgumentException::class );
		$this->expectExceptionMessage( 'It looks like $label parameter is not a type of string but "integer".' );

		$plugin['acf-helper/content']->get_acf_file_field( 'bar', 1 );
	}
}
