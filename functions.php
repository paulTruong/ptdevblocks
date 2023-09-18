<?php
if (!function_exists('ptdevblocks_theme_setup')) {

    function ptdevblocks_theme_setup()
    {
        // Enqueue editor styles.
        add_editor_style('style.css');
    }
}
add_action('after_setup_theme', 'ptdevblocks_theme_setup');


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

if (!function_exists('ptdevblocks_enqueue_scripts')) {

    function ptdevblocks_enqueue_scripts()
    {
        wp_register_style('ptdevblocks-style', get_stylesheet_uri());

        // Enqueue theme stylesheet.
        wp_enqueue_style('ptdevblocks-style');
    }
}
add_action('wp_enqueue_scripts', 'ptdevblocks_enqueue_scripts');

// //remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
