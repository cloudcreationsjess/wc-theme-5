<?php
    /* Clean up what shows on dashboard */

    function remove_dashboard_meta() {
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
        remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
        remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    }

    add_action('admin_init', 'remove_dashboard_meta');

    /* Disable WordPress Admin Bar for all users */

    add_filter('show_admin_bar', '__return_false');

    /* Hide notices from dashboard */

    add_action('admin_head', 'bc_disable_notice');
    function bc_disable_notice() { ?>
        <style> .notice {
                display: none;
            } </style> <?php }
