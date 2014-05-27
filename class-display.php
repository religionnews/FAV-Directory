<?php

class FAV_Directory_Display{
    public $listing_post_type = 'rns_directory';

    function __construct(){
        add_action('template_redirect', array($this, 'add_filters'));
    }

    function add_filters(){
        global $post;
        if(get_post_type() == $this->listing_post_type && is_single() ){
            //now do the magic sauce
            add_action('the_content', array($this, 'output_meta_display'));
            add_filter('rns_directory_before_content', array($this, 'before_content_directory_data'));
            add_filter('rns_directory_after_content', array($this, 'after_content_directory_data') );
        }
    }

    function output_meta_display($content){
        echo apply_filters('rns_directory_before_content', '');
        echo $content;
        echo apply_filters('rns_directory_after_content', '');
    }

    function before_content_directory_data($incoming){

        $meta = get_post_custom(get_the_id());
        $types = wp_get_post_terms( get_the_ID(), 'rns_directory_type' );
        $denominations = get_the_terms( get_the_ID(), 'rns_directory_denomination' );
        $paid = (isset($meta['_rns_directory_paid']) && $meta['_rns_directory_paid'][0] == 'on') ? true : false;

        $stuff = $incoming;
        $stuff .= sprintf('<h5>%s</h5>',  __('Information', 'rns_event'));
        $stuff .= (isset($meta['_rns_directory_address'])) ? sprintf('<p>%s</p>', $meta['_rns_directory_address'][0]) : '';
        $stuff .= (isset($meta['_rns_directory_website'])) ? sprintf('<a href="%s" target="_blank">%s</a>', $meta['_rns_directory_website'][0], __('Visit Website', 'rns_directory')) : '';

        if ( $types ){
            $stuff .= sprintf('<p><strong>%s</strong>: %s', __('Type', 'rns_directory'), $types[0]->name);
        }

        if ( $denominations ){
            $stuff .= sprintf('<p><strong>%s</strong>: ', __('Denomination', 'rns_directory'));
            foreach ($denominations as $denomination) {
                $stuff .= sprintf('<span>%s</span>', $denomination->name);
            }
        }

        $stuff .= (isset($meta['_rns_directory_branch'])) ? sprintf('<strong>%s</strong>: %s<br />', __('Branch/Body', 'rns_directory'), $meta['_rns_directory_branch'][0]) : '';
        $stuff .= (isset($meta['_rns_directory_size'])) ? sprintf('<strong>%s</strong>: %s<br />', __('Size', 'rns_directory'), $meta['_rns_directory_size'][0]) : '';
        $stuff .= (isset($meta['_rns_build_date'])) ? sprintf('<strong>%s</strong>: %s<br />', __('Build Date', 'rns_directory'), $meta['_rns_build_date'][0]) : '';
        $stuff .= (isset($meta['_rns_directory_zip'])) ? sprintf('%s ', $meta['_rns_directory_zip'][0]) : '';
        $stuff .= (isset($meta['_rns_directory_country'])) ? sprintf('<br />%s ', $meta['_rns_directory_country'][0]) : '';

        if ( $paid ){
            $stuff .= (isset($meta['_rns_directory_primary_contact_name'])) ? sprintf('<h4>%s</h4>', __('Primary Contact', 'rns_directory')) : '';
            $stuff .= (isset($meta['_rns_directory_primary_contact_name'])) ? sprintf('<p><strong>%s</strong>: %s', __('Name', 'rns_directory'), $meta['_rns_directory_primary_contact_name'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_primary_contact_title'])) ? sprintf('<br /><strong>%s</strong>: %s', __('Title', 'rns_directory'), $meta['_rns_directory_primary_contact_title'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_primary_contact_email'])) ? sprintf('<br /><strong>%s</strong>: %s', __('Email', 'rns_directory'), $meta['_rns_directory_primary_contact_email'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_primary_contact_phone'])) ? sprintf('<br /><strong>%s</strong>: %s', __('Phone', 'rns_directory'), $meta['_rns_directory_primary_contact_phone'][0]) : '';

            $stuff.= (isset($meta['_rns_directory_secondary_contact_name'])) ? sprintf('<h4>%s</h4>', __('Secondary Contact', 'rns_directory')) : '';
            $stuff .= (isset($meta['_rns_directory_secondary_contact_name'])) ? sprintf('<p><strong>%s</strong>: %s',  __('Name', 'rns_directory'), $meta['_rns_directory_secondary_contact_name'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_secondary_contact_title'])) ? sprintf('<br /><strong>%s</strong>: %s',  __('Title', 'rns_directory'), $meta['_rns_directory_secondary_contact_title'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_secondary_contact_email'])) ? sprintf('<br /><strong>%s</strong>: %s',  __('Email', 'rns_directory'),$meta['_rns_directory_secondary_contact_email'][0]) : '';
            $stuff .= (isset($meta['_rns_directory_secondary_contact_phone'])) ? sprintf('<br /><strong>%s</strong>: %s',  __('Phone', 'rns_directory'),$meta['_rns_directory_secondary_contact_phone'][0]) : '';
        }

        return $stuff;
    }

    function after_content_directory_data($incoming){

        $meta = get_post_custom(get_the_id());
        $types = wp_get_post_terms( get_the_ID(), 'rns_directory_type' );
        $denominations = get_the_terms( get_the_ID(), 'rns_directory_denomination' );
        $paid = (isset($meta['_rns_directory_paid']) && $meta['_rns_directory_paid'][0] == 'on') ? true : false;
        $stuff = $incoming;

        if($paid){
            $stuff .= (isset($meta['_rns_directory_schedule'])) ? sprintf('<h4>%s</h4><p>%s</p>', __('Schedule', 'rns_directory'), html_entity_decode($meta['_rns_directory_schedule'][0])) : '';
            $stuff .= (isset($meta['_rns_directory_programs'])) ? sprintf('<h4>%s</h4><p>%s</p>', __('Programs, Groups, & Educational Information', 'rns_directory'), html_entity_decode($meta['_rns_directory_programs'][0])) : '';
            $stuff .= (isset($meta['_rns_directory_photos'])) ? sprintf('<h4>%s</h4><p>%s</p>', __('Photos', 'rns_directory'), html_entity_decode($meta['_rns_directory_photos'][0])) : '';
            $stuff .= (isset($meta['_rns_directory_videos'])) ? sprintf('<h4>%s</h4><p>%s</p>', __('Videos, Groups, & Educational Information', 'rns_directory'), html_entity_decode($meta['_rns_directory_videos'][0])) : '';
        }
        return $stuff;
    }

}
new FAV_Directory_Display;
