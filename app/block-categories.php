<?php
    // Include or require the file containing the white_canvas_custom_category function
// For example: require_once 'path/to/your/file.php';

    add_filter('block_categories_all', 'white_canvas_custom_category');

    /**
     * Add custom category to the block editor
     *
     * @param array $cats Array of block categories
     *
     * @return array
     */

    function white_canvas_custom_category($cats) {

        // create a new array element with anything as its index
        $new = [
            'white-canvas' => [

                'slug'  => 'white-canvas',
                'title' => 'Blocks by White Canvas',

            ],
        ];

        // what position your custom category should appear
        $position = 0; // 0 is first

        $cats = array_slice($cats, 0, $position, true) + $new + array_slice($cats, $position, null, true);

        // reset array indexes
        $cats = array_values($cats);

        return $cats;
    }




