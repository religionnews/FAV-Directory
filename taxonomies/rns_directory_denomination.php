<?php

function rns_directory_denomination_init() {
	register_taxonomy( 'rns_directory_denomination', array( 'rns_directory' ), array(
		'hierarchical'            => true,
		'public'                  => true,
		'show_in_nav_menus'       => true,
		'show_ui'                 => true,
		'query_var'               => true,
		'rewrite'                 => true,
		'capabilities'            => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'                  => array(
			'name'                       =>  __( 'Denominations', 'rns-directory' ),
			'singular_name'              =>  __( 'Denomination', 'rns-directory' ),
			'search_items'               =>  __( 'Search Denominations', 'rns-directory' ),
			'popular_items'              =>  __( 'Popular Denominations', 'rns-directory' ),
			'all_items'                  =>  __( 'All Denominations', 'rns-directory' ),
			'parent_item'                =>  __( 'Parent Denomination', 'rns-directory' ),
			'parent_item_colon'          =>  __( 'Parent Denomination:', 'rns-directory' ),
			'edit_item'                  =>  __( 'Edit Denomination', 'rns-directory' ),
			'update_item'                =>  __( 'Update Denomination', 'rns-directory' ),
			'add_new_item'               =>  __( 'New Denomination', 'rns-directory' ),
			'new_item_name'              =>  __( 'New Denomination', 'rns-directory' ),
			'separate_items_with_commas' =>  __( 'Denominations separated by comma', 'rns-directory' ),
			'add_or_remove_items'        =>  __( 'Add or remove Denominations', 'rns-directory' ),
			'choose_from_most_used'      =>  __( 'Choose from the most used Denominations', 'rns-directory' ),
			'menu_name'                  =>  __( 'Denominations', 'rns-directory' ),
		),
	) );

}
add_action( 'init', 'rns_directory_denomination_init' );
