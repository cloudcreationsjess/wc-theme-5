<?php

    namespace App\Blocks;

    use Log1x\AcfComposer\Block;
    use StoutLogic\AcfBuilder\FieldsBuilder;

    class TeamProfiles extends Block
    {
        /**
         * The block name.
         *
         * @var string
         */
        public $name = 'Team Profiles';

        /**
         * The block description.
         *
         * @var string
         */
        public $description = 'A simple Team Profiles block.';

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
            ];
        }

        /**
         * The block field group.
         *
         * @return array
         */
        public function fields() {
            $teamProfiles = new FieldsBuilder('team_profiles');

            $teamProfiles
                ->addText('title', ['label' => 'Title'])
                ->addText('subtitle', ['label' => 'Subtitle'])
                ->addMessage('message', 'message', [
                    'label'   => 'Message',
                    'message' => 'Team Members are auto-populated, please visit the Team Members page to add or edit members.',
                ]);

            return $teamProfiles->build();
        }

        /**
         * Assets to be enqueued when rendering the block.
         *
         * @return void
         */
        public function enqueue() {
            wp_enqueue_style(
                'team-profiles',
                get_template_directory_uri() . '/resources/styles/blocks/team-profiles.scss', // Adjust the path to your compiled CSS file

            );
        }
    }
