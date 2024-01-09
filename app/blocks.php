<?php
    //
    // /**
    //  * Register ACF Blocks.
    //  */
    // function theme_blocks_init()
    // {
    //     // Directory containing the blocks, within the 'resources/views' directory.
    //     $directory = resource_path('views') . '/blocks/';
    //
    //     // Iterate over the directory provided and look for blocks.
    //     $block_directory = new DirectoryIterator($directory);
    //
    //     foreach ($block_directory as $block) {
    //         if ($block->isDir() && !$block->isDot()) {
    //             register_block_type($block->getRealpath());
    //         }
    //     }
    // }
    //
    // add_action('init', 'theme_blocks_init');
    //
    // /**
    //  * Callback for rendering Blade templates.
    //  * Name of the Blade template at resources/views/blocks/{title}.blade.php
    //  */
    // function blade_render_callback($block, string $content = '', bool $is_preview = false, int $post_id = 0)
    // {
    //     $slug                = str_replace('wc' . '/', '', $block['name']);
    //     $block['slug']       = $slug;
    //
    //     echo \Roots\view('blocks.' . $block['slug'] . '.' . $block['slug'], [ 'block' => $block ])->render();
    // }
    //


    /**
     * Load Blocks
     */
    function load_blocks() {
        $blocks = get_blocks();
        foreach( $blocks as $block ) {
            if ( file_exists( get_template_directory() . '/resources/views/blocks/' . $block . '/block.json' ) ) {
                register_block_type( get_template_directory() . '/resources/views/blocks/' . $block . '/block.json' );
                if ( file_exists( get_template_directory() . '/resources/views/blocks/' . $block . '/style.ccss' ) ) {
                    wp_register_style( 'block-' . $block, get_template_directory_uri() . '/resources/views/blocks/' . $block . '/style.css', array(), filemtime( get_template_directory() . '/resources/views/blocks/' . $block . '/style.css' ) );
                }
                if ( file_exists( get_template_directory() . '/resources/views/blocks/' . $block . '/init.php' ) ) {
                    include_once get_template_directory() . '/resources/views/blocks/' . $block . '/init.php';
                }
            }
        }
    }
    add_action( 'init', __NAMESPACE__ . '\\load_blocks', 5 );

    /**
     * Load ACF field groups for blocks
     */
    function load_acf_field_group( $paths ) {
        $blocks = get_blocks();
        foreach( $blocks as $block ) {
            $paths[] = get_template_directory() . '/resources/views/blocks/' . $block;
        }
        return $paths;
    }
    add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\\load_acf_field_group' );

    /**
     * Get Blocks
     */
    function get_blocks() {
        $blocks = scandir( get_template_directory() . '/resources/views/blocks/' );
        $blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );
        return $blocks;
    }
