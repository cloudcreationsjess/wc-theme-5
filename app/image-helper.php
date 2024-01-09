<?php
    /**
     * Function to return Image src data-set
     *
     * @param $image Image array
     * @param string $class custom class name
     * @param string $size small size for mobile devices, large size for larger screens
     * @param string $large_size large size for screens above a certain breakpoint
     * @param string $alt alt-tag value
     * @param bool $is_echo true/false
     *
     * @return string echo to the page if is_echo is true, otherwise return string
     *
     * USAGE: {!! the_image(get_field('my-image'), 'my-class', 'thumbnail', 'full', 'Alt text') !!}
     */
    function the_image($image, $class = '', $size = 'thumbnail', $large_size = 'full', $alt = '', $is_echo = true) {
        $sizes = [
            'thumbnail'    => '(max-width: 300px) 100vw, (max-width: 940px) 30vw, 150px',
            'small'        => '(max-width: 400px) 100vw, 300px',
            'medium'       => '(max-width: 500px) 33vw, 500px',
            'medium_large' => '(max-width: 1500px) 50vw, 768px',
            'large'        => '(max-width: 1024px) 100vw, 1024px',
            'full'         => '(max-width: 100%) 100vw',
        ];

        $srcset = '';
        $sizes_attr = '';

// Check if the device is mobile using CSS media query
        if ( wp_is_mobile() ) {
            $size = $size; // Use the requested size for mobile devices
            $srcset = wp_get_attachment_image_srcset($image['ID'], $size);
            $sizes_attr = $sizes[$size];
        } else {
            $size = $large_size; // Use the requested large size for larger screens
            $srcset = wp_get_attachment_image_srcset($image['ID'], $large_size);
            $sizes_attr = $sizes[$large_size];
        }

        $image_url = wp_get_attachment_image_url($image['ID'], $size);

        $image_dimensions = getimagesize($image_url);

// Check if getimagesize() was successful before accessing its elements
        if ( $image_dimensions !== false && is_array($image_dimensions) ) {
            $width_attr = ' width="' . esc_attr($image_dimensions[0]) . '"';
            $height_attr = ' height="' . esc_attr($image_dimensions[1]) . '"';
        } else {
            $width_attr = $height_attr = ''; // Set default values or handle the error as needed
        }

        $html = '<img loading="lazy" src="' . esc_url($image_url) . '" srcset="' . esc_attr($srcset) . '" sizes="' . esc_attr($sizes_attr) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '"' . $width_attr . $height_attr . '>';

        if ( $is_echo ) {
            echo $html;
        } else {
            return $html;
        }
    }

    /**
     * Function to return Image src data-set by post ID
     *
     * @param int $post_id Post ID
     * @param string $class custom class name
     * @param string $size small size for mobile devices, large size for larger screens
     * @param string $large_size large size for screens above a certain breakpoint
     * @param string $alt alt-tag value
     * @param bool $is_echo true/false
     *
     * @return string echo to the page if is_echo is true, otherwise return string
     *
     * USAGE: {!! the_image_by_post_id(get_the_ID(), 'my-class', 'thumbnail', 'full', 'Alt text') !!}
     */
    function the_image_by_post_id($post_id, $class = '', $size = 'thumbnail', $large_size = 'full', $alt = '', $is_echo = true) {
        $image_id = get_post_thumbnail_id($post_id); // Get the featured image ID

        if ( $image_id ) {
            $sizes = [
                'thumbnail'    => '(max-width: 300px) 100vw, (max-width: 940px) 30vw, 150px',
                'small'        => '(max-width: 400px) 100vw, 300px',
                'medium'       => '(max-width: 500px) 33vw, 500px',
                'medium_large' => '(max-width: 1500px) 50vw, 768px',
                'large'        => '(max-width: 1024px) 100vw, 1024px',
                'full'         => '(max-width: 100%) 100vw',
            ];

            $srcset = '';
            $sizes_attr = '';

// Check if the device is mobile using CSS media query
            if ( wp_is_mobile() ) {
                $size = $size; // Use the requested size for mobile devices
                $srcset = wp_get_attachment_image_srcset($image_id, $size);
                $sizes_attr = $sizes[$size];
            } else {
                $size = $large_size; // Use the requested large size for larger screens
                $srcset = wp_get_attachment_image_srcset($image_id, $large_size);
                $sizes_attr = $sizes[$large_size];
            }

            $image_url = wp_get_attachment_image_url($image_id, $size);
            $image_dimensions = getimagesize($image_url); // Get image dimensions

            $image_dimensions = getimagesize($image_url);

// Check if getimagesize() was successful before accessing its elements
            if ( $image_dimensions !== false && is_array($image_dimensions) ) {
                $width_attr = ' width="' . esc_attr($image_dimensions[0]) . '"';
                $height_attr = ' height="' . esc_attr($image_dimensions[1]) . '"';
            } else {
                $width_attr = $height_attr = ''; // Set default values or handle the error as needed
            }

            $html = '<img loading="lazy" src="' . esc_url($image_url) . '" srcset="' . esc_attr($srcset) . '" sizes="' . esc_attr($sizes_attr) . '" alt="' . esc_attr($alt) . '" class="' . esc_attr($class) . '"' . $width_attr . $height_attr . '>';

            if ( $is_echo ) {
                echo $html;
            } else {
                return $html;
            }
        } else {
            return false;
        }
    }
