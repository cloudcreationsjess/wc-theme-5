<?php
// Register Custom Post Type
    function custom_post_type_services() {

        $labels = [
            'name'                  => _x('Services', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Service', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Services', 'text_domain'),
            'name_admin_bar'        => __('Service', 'text_domain'),
            'archives'              => __('Service Archives', 'text_domain'),
            'attributes'            => __('Service Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Service:', 'text_domain'),
            'all_items'             => __('All Services', 'text_domain'),
            'add_new_item'          => __('Add New Service', 'text_domain'),
            'add_new'               => __('Add New', 'text_domain'),
            'new_item'              => __('New Service', 'text_domain'),
            'edit_item'             => __('Edit Service', 'text_domain'),
            'update_item'           => __('Update Service', 'text_domain'),
            'view_item'             => __('View Service', 'text_domain'),
            'view_items'            => __('View Services', 'text_domain'),
            'search_items'          => __('Search Service', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into Service', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this Service', 'text_domain'),
            'items_list'            => __('Services list', 'text_domain'),
            'items_list_navigation' => __('Services list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter Services list', 'text_domain'),
        ];
        $args = [
            'label'               => __('Service', 'text_domain'),
            'description'         => __('Services offered by your site', 'text_domain'),
            'labels'              => $labels,
            'supports'            => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'taxonomies'          => [],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => true, // Enable Gutenberg
            'editor'              => 'block',
            'menu_icon'           => 'dashicons-star-filled',
        ];
        register_post_type('service', $args);
    }

    add_action('init', 'custom_post_type_services', 0);

    ///PROJECT POST TYPE
    ///
    ///
    ///
    /// // Register Custom Post Type for Projects
    function custom_post_type_projects() {

        $labels = [
            'name'              => _x('Projects', 'Post Type General Name', 'text_domain'),
            'singular_name'     => _x('Project', 'Post Type Singular Name', 'text_domain'),
            'menu_name'         => __('Projects', 'text_domain'),
            'name_admin_bar'    => __('Project', 'text_domain'),
            'archives'          => __('Project Archives', 'text_domain'),
            'attributes'        => __('Project Attributes', 'text_domain'),
            'parent_item_colon' => __('Parent Project:', 'text_domain'),
            'all_items'         => __('All Projects', 'text_domain'),
            'add_new_item'      => __('Add New Project', 'text_domain'),
            'add_new'           => __('Add New', 'text_domain'),
            'new_item'          => __('New Project', 'text_domain'),
            'edit_item'         => __('Edit Project', 'text_domain'),
            'update_item'       => __('Update Project', 'text_domain'),
            'view_item'         => __('View Project', 'text_domain'),
            'view_items'        => __('View Projects', 'text_domain'),
            'search_items'      => __('Search Project', 'text_domain'),
        ];
        $args = [
            'label'               => __('Project', 'text_domain'),
            'description'         => __('Projects for your site', 'text_domain'),
            'labels'              => $labels,
            'supports'            => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'taxonomies'          => ['post_tag'],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 6,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => true,
            'editor'              => 'block',
            'menu_icon'           => 'dashicons-star-filled', // Change Dashicon
        ];
        register_post_type('project', $args);
    }

    add_action('init', 'custom_post_type_projects', 0);

    ///TEAM POST TYPE
    ///
    ///
    /// */
    ///
    ///
    function custom_post_type_team_members() {

        $labels = [
            'name'                  => _x('Team Members', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Team', 'text_domain'),
            'name_admin_bar'        => __('Team Member', 'text_domain'),
            'archives'              => __('Team Member Archives', 'text_domain'),
            'attributes'            => __('Team Member Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Team Member:', 'text_domain'),
            'all_items'             => __('All Team Members', 'text_domain'),
            'add_new_item'          => __('Add New Team Member', 'text_domain'),
            'add_new'               => __('Add New', 'text_domain'),
            'new_item'              => __('New Team Member', 'text_domain'),
            'edit_item'             => __('Edit Team Member', 'text_domain'),
            'update_item'           => __('Update Team Member', 'text_domain'),
            'view_item'             => __('View Team Member', 'text_domain'),
            'view_items'            => __('View Team Members', 'text_domain'),
            'search_items'          => __('Search Team Member', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into Team Member', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this Team Member', 'text_domain'),
            'items_list'            => __('Team Members list', 'text_domain'),
            'items_list_navigation' => __('Team Members list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter Team Members list', 'text_domain'),
        ];
        $args = [
            'label'               => __('Team Member', 'text_domain'),
            'description'         => __('Team Members for your site', 'text_domain'),
            'labels'              => $labels,
            'supports'            => ['custom-fields'],
            'taxonomies'          => [],
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 6,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => false,
            'editor'              => 'block',
            'menu_icon'           => 'dashicons-star-filled', // Change Dashicon
        ];
        register_post_type('team_member', $args);
    }

    add_action('init', 'custom_post_type_team_members', 0);

