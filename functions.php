<?php

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
