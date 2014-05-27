<?php

add_filter( 'cmb_meta_boxes', 'rns_directory_listing_metabox' );
/**
 * Define the metabox and field configurations.
 */
function rns_directory_listing_metabox( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_rns_directory_';

  $meta_boxes[] = array(
    'id'         => 'rns_directory_listing_metabox',
    'title'      => 'Directory Listing',
    'pages'      => array( 'rns_directory' ), // Post type
    'context'    => 'advanced',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Address',
        'desc' => '',
        'id'   => $prefix . 'address',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Phone Number',
        'desc' => '',
        'id' => $prefix . 'phone_number',
        'type' => 'text'
      ),
      array(
        'name' => 'Website URL',
        'desc' => '',
        'id' => $prefix . 'website',
        'type' => 'text'
      ),
      array(
        'name' => 'Branch/Body',
        'desc' => '',
        'id' => $prefix . 'branch',
        'type' => 'text'
      ),
      array(
        'name' => 'Size',
        'desc' => '',
        'id' => $prefix . 'size',
        'type' => 'text'
      ),
      array(
        'name' => 'Primary Contact Name',
        'desc' => '',
        'id' => $prefix . 'primary_contact_name',
        'type' => 'text'
      ),
      array(
        'name' => 'Primary Contact Title',
        'desc' => '',
        'id' => $prefix . 'primary_contact_title',
        'type' => 'text'
      ),
      array(
        'name' => 'Primary Contact Email',
        'desc' => '',
        'id' => $prefix . 'primary_contact_email',
        'type' => 'text'
      ),
      array(
        'name' => 'Secondary Contact Name',
        'desc' => '',
        'id' => $prefix . 'secondary_contact_name',
        'type' => 'text'
      ),
      array(
        'name' => 'Secondary Contact Title',
        'desc' => '',
        'id' => $prefix . 'secondary_contact_title',
        'type' => 'text'
      ),
      array(
        'name' => 'Secondary Contact Email',
        'desc' => '',
        'id' => $prefix . 'secondary_contact_email',
        'type' => 'text'
      ),
      array(
        'name' => 'Schedule',
        'desc' => '',
        'id' => $prefix . 'schedule',
        'type' => 'textarea'
      ),
      array(
        'name' => 'Programs, Groups, & Educational Information',
        'desc' => '',
        'id' => $prefix . 'programs',
        'type' => 'textarea'
      ),
      array(
        'name' => 'Photos',
        'desc' => 'Use the "Add Media" button to add an image or gallery',
        'id' => $prefix . 'photos',
        'type' => 'wysiwyg'
      ),
      array(
        'name' => 'Videos',
        'desc' => "Paste the URL to each video on a new line. YouTube and Vimeo are supported",
        'id' => $prefix . 'videos',
        'type' => 'textarea'
      ),
      array(
        'name' => 'Is Paid Listing?',
        'desc' => '',
        'id' => $prefix . 'paid',
        'type' => 'checkbox'
      )
    ),
  );

  return $meta_boxes;
}
