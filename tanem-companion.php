<?php 
/*
Plugin Name: Tanem Companion Plugin
Plugin URI:
Description: Companion Plugin fon Tanem Theme
Version: 1.0
Author: Tanem
Author URI:
License: GPLv2 or later
Text Domain: tanem-companion
Domain Path: /languages/
*/
function tanem_companion_load_textdomain(){
	load_plugin_textdomain('tanem-companion',false, dirname(__FILE__).'/languages');
}
add_action( "plugins_loaded", "tanem_companion_load_textdomain" );

function tanem_companion_register_my_cpts_section() {
	/**
	 * Post Type: Sections.
	 */
	$labels = array(
		"name" => __( "Sections", "tanem" ),
		"singular_name" => __( "Section", "tanem" ),
	);

	$args = array(
		"label" => __( "Sections", "tanem" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "section", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-layout",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "section", $args );

	/**
	 * Post Type: Portfolio.
	*/
	$labels = array(
		"name" => __( "Portfolios", "tanem" ),
		"singular_name" => __( "Portfolio ", "tanem" ),
	);

	$args = array(
		"label" => __( "Portfolios", "tanem" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "portfolio", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-portfolio",
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" =>array(),
	);

	register_post_type( "portfolio", $args );
}
add_action( 'init', 'tanem_companion_register_my_cpts_section' );

function tanem_companion_register_my_taxes_group() {
	/**
	 * Taxonomy: Groups.
	 */
	$labels = array(
		"name" => __( "Groups", "tanem" ),
		"singular_name" => __( "Group", "tanem" ),
	);
	$args = array(
		"label" => __( "Groups", "tanem" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'group', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "group",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "group", array( "portfolio" ), $args );
}
add_action( 'init', 'tanem_companion_register_my_taxes_group' );
