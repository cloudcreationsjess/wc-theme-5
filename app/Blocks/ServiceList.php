<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ServiceList extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Service List';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Service List block.';

        /**
         * The block category.
         *
         * @var string
         */
        public $category = 'white-canvas';

        /**
         * The block icon.
         *
         * @var string|array
         */
        public $icon = 'star-filled';

        /**
         * The block keywords.
         *
         * @var array
         */
        public $keywords = [];

        /**
         * The block post type allow list.
         *
         * @var array
         */
        public $post_types = [];

        /**
         * The parent block type allow list.
         *
         * @var array
         */
        public $parent = [];

        /**
         * The default block mode.
         *
         * @var string
         */
        public $mode = 'edit';

        /**
         * The default block alignment.
         *
         * @var string
         */
        public $align = '';

        /**
         * The default block text alignment.
         *
         * @var string
         */
        public $align_text = '';

        /**
         * The default block content alignment.
         *
         * @var string
         */
        public $align_content = '';

        /**
         * The supported block features.
         *
         * @var array
         */
        public $supports = [
            'align'         => false,
            'align_text'    => false,
            'align_content' => false,
            'full_height'   => false,
            'anchor'        => false,
            'mode'          => true,
            'multiple'      => true,
            'jsx'           => true,
        ];

        /**
         * The block styles.
         *
         * @var array
         */
        public $styles = [

        ];

        /**
         * The block preview example data.
         *
         * @var array
         */
        public $example = [
            'is_preview' => true,
        ];

        /**
         * Data to be passed to the block before rendering.
         *
         * @return array
         */
        public function with() {
            return [
                'block_data' => $this->blockData(),
            ];
        }

        /**
         * Return the blockData().
         *
         * @return array
         */
        public function blockData() {
            return [
                'is_preview' => get_field('is_preview'),
                'services'   => $this->getServices(),
                'title'      => get_field('title'),
            ];
        }

        private function getServices() {

            $services = [];

            $args = [
                'post_type'      => 'service',
                'posts_per_page' => -1,
            ];

            $query = new \WP_Query($args);

            while ( $query->have_posts() ) {
                $query->the_post();

                $excerpt = get_field('excerpt');

                // Format and push project data to the $projects array
                $services[] = [
                    'name'           => get_the_title(),
                    'id'             => get_the_id(),
                    'excerpt'        => $excerpt,
                    'learn_more_url' => get_permalink(),
                ];
            }

            // Reset post data
            wp_reset_postdata();

            return $services;
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $serviceList = new FieldsBuilder('service_list');

            $serviceList
                ->addText('title', ['label' => 'Title'])
                ->addMessage('message', 'message', [
                    'label'   => 'Instructions',
                    'message' => 'This block will display all services. To add a service, go to Services > Add New.',

                ]);

            return $serviceList->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'service-list',
                get_template_directory_uri() . '/resources/styles/blocks/service-list.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
