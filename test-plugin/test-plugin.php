<?php
/*
Plugin Name: Test plugin
Description: Test plugin to demonstrate the Settings Page class
*/


Test_Plugin::init();



class Test_Plugin
{
	static $saved_options;

	static function init()
	{
		add_action( 'init', array(__CLASS__, 'add_settings_page') );
	}



	static function add_settings_page()
	{
		require_once __DIR__ . '/includes/class-settings-page.php';

		$settings_page = Settings_Page::get_instance();

		$settings_page
		->add_page(
			'My plugin settings', // title
			'my-plugin-settings', // basename
			'options-general.php', // page_path
			'Update your settings here' // page_description
		)
		->add_fieldset(
				'first-section', // id
				'Some Settings', // title
				'Update these settings first' // description
		)
		->add_field(
			'checkbox', // type
			'first-section', // section_title
			'checkbox-first', // id
			'Do you want to check?', // title
			'1' // value
		)
		->add_field(
			'checkboxgroup', // type
			'first-section', // section_title
			'checkboxgroup-first', // id
			'Select a few', // title
			array( // value
				'1' => 'one',
				'2' => 'two'
			)
		)
		->render();
	}



} // class



