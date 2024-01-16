<?php
    add_filter('wpc_filter_post_meta_term_name', 'wpc_custom_term_name', 10, 2);

    function wpc_custom_term_name($term_name, $e_name) {
// 'related_post' is the meta key name for your relationship field.
        if ( $e_name === 'services_relationship' ) {
            $term_name = get_the_title($term_name);
        }

        return $term_name;
    }

    add_filter('wpc_dropdown_default_option', 'change_wpc_default_option');

    function change_wpc_default_option($default_option) {
        // Change the default option text to "Area of Service"
        return 'Area of Service';
    }

