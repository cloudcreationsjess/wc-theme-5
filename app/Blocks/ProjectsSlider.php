<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ProjectsSlider extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Projects Slider';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Projects Slider block.';

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
                'project_data' => $this->blockData(),
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
                'title'      => $this->getTitle(),
                'project'    => $this->getProjects(),

            ];
        }

        /**
         * Get the block title.
         *
         * @return string
         */
        private function getTitle() {
            return get_field('title');
        }

        public function getProjects() {
            // Add logic to retrieve and format your project data here
            // You can use WP_Query or any other method to get your project data
            $projects = [];

            // Example: Get project data using WP_Query
            $args = [
                'post_type'      => 'project', // Adjust the post type accordingly
                'posts_per_page' => -1,
                // Add any other query parameters as needed
            ];

            $query = new \WP_Query($args);

            while ( $query->have_posts() ) {
                $query->the_post();

                $services = function_exists('get_field') ? get_field('services_relationship') : '';

                // Format and push project data to the $projects array
                $projects[] = [
                    'name'           => get_the_title(),
                    'id'             => get_the_id(),
                    'locations'      => wp_get_post_terms(get_the_ID(), 'location'),
                    'services'       => $services,
                    'tags'           => wp_get_post_terms(get_the_ID(), 'post_tag', ['fields' => 'names']),
                    'learn_more_url' => get_permalink(),
                ];
            }

            // Reset post data
            wp_reset_postdata();

            return $projects;
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $projectsSlider = new FieldsBuilder('projects_slider');

            $projectsSlider
                ->addText('title', ['label' => 'Title'])
                ->addMessage('message', 'message', [
                    'label'   => '',
                    'message' => 'Projects are auto-populated, please edit order in dashboard > projects',
                ]);

            return $projectsSlider->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'projects-block',
                get_template_directory_uri() . '/resources/styles/blocks/projects-block.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
