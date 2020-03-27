<?php
/**
 * We USE CMB2 - Make sure it installed and activated
 */
require_once( get_template_directory() .'/inc/plugins/cmb2-radio-images.php' );

function register_main_options_metabox() {
	
	$prefix = 'lmd_';
	
	// General (Parent) TAB
	$args = array(
		'id'           => $prefix.'main_options_page',
		'title'        => 'LombokMedia',
		'object_types' => array( 'options-page' ),
		'parent_slug'  => 'themes.php',
		'option_key'   => $prefix.'main',
	);

	$general_options = new_cmb2_box( $args );

	$general_options->add_field( array(
		'name'    => 'General Theme Options',
		'id'      => 'title1',
		'type'    => 'title',
	) );

	$general_options->add_field( array(
		'name'    => 'Custom Logo',
		'desc'    => 'upload or type your image url. Ex: <b>https://cdn.domain.com/image.png</b>',
		'id'      => 'logo',
		'type'    => 'file',
	) );

	$general_options->add_field( array(
		'name'    => 'Custom Favicon',
		'desc'    => 'upload or type your image url. Ex: <b>https://cdn.domain.com/image.png</b>',
		'id'      => 'favicon',
		'type'    => 'file',
		'default' => get_template_directory_uri().'/favicon.ico',
	) );

	$general_options->add_field( array(
		'name'    => 'Website Layout',
		'desc'    => 'Your website layout',
		'id'      => 'layout',
		'type'    => 'radio_image',
		'default' => 'rightsidebar',
		'options' => array(
			'rightsidebar'	=> '2 Columns - Right Sidebar',
			'leftsidebar'	=> '2 Columns - Left Sidebar',
			'onecolumn'		=> 'Full (No Sidebar)',
		),
		'images_path'      => get_template_directory_uri().'/inc/img/',
		'images'           => array(
			'rightsidebar' => 'sidebar-right.png',
			'leftsidebar'  => 'sidebar-left.png',
			'onecolumn'		=> 'no-sidebar.png',
		)
	) );

	$general_options->add_field( array(
		'name'    => 'Blog & Post Options',
		'id'      => 'title2',
		'type'    => 'title',
	) );

	$general_options->add_field( array(
		'name'    => 'Blog Style',
		'desc'    => 'Your blogs style',
		'id'      => 'blog_style',
		'type'    => 'radio_inline',
		'default' => 1,
		'options' => array(
			1		=> '1 Column (Standard)',
			2		=> '2 Columns (Grid)',
		),
	) );

}

add_action( 'cmb2_admin_init', 'register_main_options_metabox' );
