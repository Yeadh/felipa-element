<?php

if ( ! function_exists('felipa_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function felipa_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'felipa' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'felipa' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'felipa' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'felipa' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'felipa' ),
                'add_new_item'       => __( 'Add New Portfolio', 'felipa' ),
                'new_item'           => __( 'New Portfolio', 'felipa' ),
                'edit_item'          => __( 'Edit Portfolio', 'felipa' ),
                'view_item'          => __( 'View Portfolio', 'felipa' ),
                'all_items'          => __( 'All Portfolio', 'felipa' ),
                'search_items'       => __( 'Search Portfolio', 'felipa' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'felipa' ),
                'not_found'          => __( 'No Portfolio found.', 'felipa' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'felipa' )
            ),

            'description'        => __( 'Description.', 'felipa' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'felipa' ),
                    'add_new_item'      => __( 'Add New Category', 'felipa' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'felipa_custom_post_type' );

}