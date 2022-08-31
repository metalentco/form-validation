<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Ultimate_Member_Frontend_Validations_Setup')):
    class Ultimate_Member_Frontend_Validations_Setup
    {
        public function __construct()
        {
            $this->hooks();
        }

        /**
         * Hook in to actions & filters
         *
         * @since 1.0.0
         */
        public function hooks()
        {
            /**
             * @see styles
             */
            add_action('wp_enqueue_scripts', array($this, 'public_styles'));
            /**
             * @see scripts
             */
            add_action('init', array($this, 'public_scripts'), 10);
        }

        public function public_scripts()
        {
            $v = ULTIMATE_MEMBER_FRONTEND_VALIDATIONS_VERSION;
            $url = ULTIMATE_MEMBER_FRONTEND_VALIDATIONS_URL;
            $scripts = [
                'umfv-public' => [
                    'src' => $url . 'assets/js/public.js',
                    'deps' => ['jquery'],
                    'version' => $v,
                ],
                'umfv-lib-jquery-validator' => [
                    'src' => $url . 'assets/js/lib/jquery.validate.min.js',
                    'deps' => ['jquery'],
                    'version' => $v,
                ],
            ];
            foreach ($scripts as $name => $props) {
                wp_register_script($name, $props['src'], $props['deps'], $props['version']);
            }
        }

        public function public_styles()
        {
            $v = ULTIMATE_MEMBER_FRONTEND_VALIDATIONS_VERSION;
            $url = ULTIMATE_MEMBER_FRONTEND_VALIDATIONS_URL;
            wp_enqueue_style('umfv', $url . 'assets/css/public.css', $v);
        }
    }

    return new Ultimate_Member_Frontend_Validations_Setup();
endif;









