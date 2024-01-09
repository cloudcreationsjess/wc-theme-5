<?php
    function add_arrow_to_all_menus($output, $item, $depth, $args) {
        if ( $depth === 0 ) {
            $classes = empty($item->classes) ? [] : (array) $item->classes;
            $has_children = in_array('menu-item-has-children', $classes);

            if ( $has_children ) {
                $output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
';
            }
        }

        return $output;
    }

    add_filter('walker_nav_menu_start_el', 'add_arrow_to_all_menus', 10, 4);
