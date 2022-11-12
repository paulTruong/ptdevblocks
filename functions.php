<?php

if (!function_exists('ptdevblocks_support')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function ptdevblocks_support()
    {

        // Enqueue editor styles.
        add_editor_style('style.css');
    }

endif;

add_action('after_setup_theme', 'ptdevblocks_support');

if (!function_exists('ptdevblocks_styles')) {

    /**
     * Enqueue styles.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function ptdevblocks_styles()
    {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get('Version');

        $version_string = is_string($theme_version) ? $theme_version : false;
        wp_register_style(
            'ptdevblocks-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style('ptdevblocks-style');
    }
}
add_action('wp_enqueue_scripts', 'ptdevblocks_styles');

if (!function_exists('ptdevblocks_load_prismjs')) {

    function ptdevblocks_load_prismjs()
    {

        if (has_block('core/code')) {

            // Register prism.css
            wp_register_style(
                'prismcss',
                get_template_directory_uri() . '/src/prism.css',
            );

            // Register prism.js
            wp_register_script(
                'prismjs', // handle name for the script
                get_template_directory_uri() . '/src/prism.js' // location of the prism.js file
            );

            // Enqueue theme stylesheet.
            wp_enqueue_style('prismcss');
            wp_enqueue_script('prismjs');
        }
    }
}
add_action('wp_enqueue_scripts', 'ptdevblocks_load_prismjs');
