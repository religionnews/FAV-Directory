<?php
/**
 * Register and configure the Directory post type
 *
 * @package rns-directory
 * @author David Herrera
 */
class RNS_Directory {

	/**
	 * Hooks to add on instantiation
	 *
	 * @return void
	 * @author David Herrera
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_filter( 'post_updated_messages', array( $this, 'updated_messages' ) );
		add_filter( 'pre_get_posts', array( $this, 'alphabetize_archives' ) );
	}

	/**
	 * Directory post type key
	 *
	 * @var string
	 */
	private $post_type = 'rns_directory';

	/**
	 * Getter for $post_type
	 *
	 * @return string
	 * @author David Herrera
	 */
	public function get_post_type() {
		return $this->post_type;
	}

	/**
	 * Initialize the Directory post type
	 *
	 * @return void
	 * @author David Herrera
	 */
	public function register_post_type() {
		register_post_type( $this->get_post_type(), array(
			'hierarchical'        => false,
			'public'              => true,
			'show_in_nav_menus'   => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'has_archive'         => true,
			'query_var'           => true,
			'rewrite'             => array( 'slug' => 'directory' ),
			'labels'              => array(
				'name'                => __( 'Directory Listings', 'rns-directory' ),
				'singular_name'       => __( 'Directory Listing', 'rns-directory' ),
				'add_new'             => __( 'Add New', 'rns-directory' ),
				'all_items'           => __( 'Directory Listings', 'rns-directory' ),
				'add_new_item'        => __( 'Add new Directory Listing', 'rns-directory' ),
				'edit_item'           => __( 'Edit Directory Listing', 'rns-directory' ),
				'new_item'            => __( 'New Directory Listing', 'rns-directory' ),
				'view_item'           => __( 'View Directory Listing', 'rns-directory' ),
				'search_items'        => __( 'Search Directory Listings', 'rns-directory' ),
				'not_found'           => __( 'No Directory Listings found', 'rns-directory' ),
				'not_found_in_trash'  => __( 'No Directory Listings found in trash', 'rns-directory' ),
				'parent_item_colon'   => __( 'Parent Directory Listing', 'rns-directory' ),
				'menu_name'           => __( 'Directory', 'rns-directory' ),
			),
		) );
	}

	/**
	 * Configure the admin messages to use with Directory posts
	 *
	 * @param array $messages The default messages to display
	 * @return array The tweaked messages
	 * @author David Herrera
	 */
	function updated_messages( $messages ) {
		global $post;

		$permalink = get_permalink( $post );

		$messages[$this->get_post_type()] = array(
		    0 => '', // Unused. Messages start at index 1.
		    1 => sprintf( __('Directory Listing updated. <a target="_blank" href="%s">View Directory Listing</a>', 'rns-directory'), esc_url( $permalink ) ),
		    2 => __('Custom field updated.', 'rns-directory'),
		    3 => __('Custom field deleted.', 'rns-directory'),
		    4 => __('Directory Listing updated.', 'rns-directory'),
		    /* translators: %s: date and time of the revision */
		    5 => isset($_GET['revision']) ? sprintf( __('Directory Listing restored to revision from %s', 'rns-directory'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		    6 => sprintf( __('Directory Listing published. <a href="%s">View Directory Listing</a>', 'rns-directory'), esc_url( $permalink ) ),
		    7 => __('Directory Listing saved.', 'rns-directory'),
		    8 => sprintf( __('Directory Listing submitted. <a target="_blank" href="%s">Preview Directory Listing</a>', 'rns-directory'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		    9 => sprintf( __('Directory Listing scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Directory Listing</a>', 'rns-directory'),
		    // translators: Publish box date format, see http://php.net/date
		    	date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		    10 => sprintf( __('Directory Listing draft updated. <a target="_blank" href="%s">Preview Directory Listing</a>', 'rns-directory'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	    );

		return $messages;
	}

	/**
	 * Alphabetize directory listings on archive pages
	 *
	 * @param WP_Query $query The query about to run
	 * @return WP_Query The object, modified if this is a frontend Directory archive
	 * @author David Herrera
	 */
	function alphabetize_archives( $query ) {
		if ( ! is_admin() && is_main_query() && is_post_type_archive( $this->get_post_type() ) ) {
			$query->set( 'orderby', 'title' );
			$query->set( 'order', 'ASC' );
		}

		return $query;
	}

} // END class RNS_Directory
