<?php

function rns_directory_type_init() {
	register_taxonomy( 'rns_directory_type', array( 'rns_directory' ), array(
		'hierarchical'            => true,
		'public'                  => true,
		'show_in_nav_menus'       => true,
		'show_ui'                 => true,
		'query_var'               => 'directory-type',
		'rewrite'                 => array( 'slug' => 'directory-type' ),
		'capabilities'            => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'                  => array(
			'name'                       =>  __( 'Types', 'rns-directory' ),
			'singular_name'              =>  __( 'Type', 'rns-directory' ),
			'search_items'               =>  __( 'Search Types', 'rns-directory' ),
			'popular_items'              =>  __( 'Popular Types', 'rns-directory' ),
			'all_items'                  =>  __( 'All Types', 'rns-directory' ),
			'parent_item'                =>  __( 'Parent Type', 'rns-directory' ),
			'parent_item_colon'          =>  __( 'Parent Type:', 'rns-directory' ),
			'edit_item'                  =>  __( 'Edit Type', 'rns-directory' ),
			'update_item'                =>  __( 'Update Type', 'rns-directory' ),
			'add_new_item'               =>  __( 'New Type', 'rns-directory' ),
			'new_item_name'              =>  __( 'New Type', 'rns-directory' ),
			'separate_items_with_commas' =>  __( 'Types separated by comma', 'rns-directory' ),
			'add_or_remove_items'        =>  __( 'Add or remove Types', 'rns-directory' ),
			'choose_from_most_used'      =>  __( 'Choose from the most used Types', 'rns-directory' ),
			'menu_name'                  =>  __( 'Types', 'rns-directory' ),
		),
	) );

}
add_action( 'init', 'rns_directory_type_init' );
