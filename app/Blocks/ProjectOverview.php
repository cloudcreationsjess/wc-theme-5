<?php

    namespace App\Blocks;

    use App\Fields\Partials\ListItems;
    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class ProjectOverview extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Project Overview';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Project Overview block.';

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
                'is_preview'       => get_field('is_preview'),
                'project_overview' => $this->getProjectOverview(),
                'project_details'  => $this->getProjectDetails(),
            ];
        }

        /**
         * Helper function to get project overview data.
         *
         * @return array
         */
        private function getProjectOverview() {
            return [
                'title'       => get_field('overview')['project_title'],
                'description' => get_field('overview')['project_description'],
            ];
        }

        /**
         * Helper function to get project details data.
         *
         * @return array
         */
        private function getProjectDetails() {
            return [
                'title'      => get_field('project_details')['title'],
                'list_items' => get_field('project_details')['items'],
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $projectOverview = new FieldsBuilder('project_overview');

            $projectOverview
                ->addGroup('overview', ['label' => 'Project Overview'])
                ->addText('project_title', ['label' => 'Title'])
                ->addWysiwyg('project_description', [
                    'label'        => 'Project Description',
                    'media_upload' => 0,
                ])
                ->endGroup()
                ->addGroup('project_details', ['label' => 'Project Details'])
                ->addText('title', ['label' => 'Title'])
                ->addFields($this->get(ListItems::class))
                ->endGroup();

            return $projectOverview->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'project-overview',
                get_template_directory_uri() . '/resources/styles/blocks/project-overview.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
