<?php
    function register_tertiary_button_style() {
        register_block_style(
            'core/button',
            [
                'name'         => 'tertiary',
                'label'        => __('Tertiary', 'sage'),
                'inline_style' => '.wp-block-button.is-style-tertiary .wp-block-button__link {
                color: #283329;
                background-color: transparent;
                border-color: transparent;
                border-radius: 0;
                padding: 0;
                margin: 0;
            }',
            ]
        );
    }

    add_action('init', 'register_tertiary_button_style');


