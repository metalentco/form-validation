<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Ultimate_Member_Frontend_Validations_Worker')):
    class Ultimate_Member_Frontend_Validations_Worker
    {
        public function __construct()
        {
            add_action('um_after_register_fields', array($this, 'hooks'));
            add_filter('um_extend_field_classes', array($this, 'add_classes'), 10, 3);
        }

        function add_classes($classes, $key, $data)
        {
            if ($data['required']) {
                $classes .= ' um-required';
            }
            return $classes;
        }

        /**
         * Hook in to actions & filters
         *
         * @since 1.0.0
         */
        public function hooks()
        {
            /**
             * @see enqueue_scripts
             */
            add_action('wp_footer', [$this, 'enqueue_scripts']);

        }

        public function enqueue_scripts()
        {
            wp_enqueue_script('umfv-lib-jquery-validator');
            wp_enqueue_script('umfv-public');
        }


    }

    return new Ultimate_Member_Frontend_Validations_Worker();
endif;









