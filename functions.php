<?php

/**
 * Load parent theme CSS
 */
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    $parenthandle = 'twentytwenty-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme        = wp_get_theme();
    wp_enqueue_style($parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style('child-style', get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

/**
 * Start the flagpole registers
 */
if (function_exists('flagpole_register_flag')) {

    flagpole_register_flag([
        [
            'title'       => 'Example Flag #1',
            'key'         => 'example-flag-1',
            'enforced'    => false,
            'description' => 'An example feature definition',
            'stable'      => false,
        ],
        [
            'title'       => 'Example Flag #2',
            'key'         => 'example-flag-2',
            'enforced'    => false,
            'description' => 'An example feature definition',
            'stable'      => false,
            'private'     => true,
        ],
        [
            'title'       => 'Example Flag #3',
            'key'         => 'example-flag-3',
            'enforced'    => false,
            'description' => 'An queryable feature flag',
            'stable'      => false,
            'private'     => true,
            `queryable`   => true
        ],
        [
            'title'       => 'Example Flag #4',
            'key'         => 'example-flag-4',
            'enforced'    => false,
            'description' => 'A published feature flag',
            'stable'      => true,
            'private'     => false
        ],
        [
            'title'       => 'Example Flag #5',
            'key'         => 'example-flag-5',
            'enforced'    => false,
            'description' => 'A previewed feature flag via group',
            'stable'      => true,
            'private'     => false
        ]
    ]);
}
