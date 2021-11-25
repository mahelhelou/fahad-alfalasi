<?php // Fahad Al Falasi Functions

function fahad_assets() {
  // Load styles
  wp_enqueue_style( 'fahad-styles', get_template_directory_uri() . '/app/dist/styles.css', NULL, '1.0' );

  // Load scripts
  wp_enqueue_script( 'fahad-scripts', get_template_directory_uri() . '/app/dist/bundle.js', NULL, '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'fahad_assets' );

function fahad_post_types() {
  // Store post type
  register_post_type( 'store', [
    'supports'        => [ 'title' ],
    'public'          => true,
    'labels'          => [
      'name'          => __( 'Stores' ),
      'add_new_item'  => __( 'Add New Store' ),
      'all_items'     => __( 'All Stores' ),
      'singular_name' => __( 'Store' ),
    ],
   'menu_icon'         => 'dashicons-amazon'
  ] );

  // Screenshot post type
  register_post_type('screenshot', [
    'supports' => [ 'title', 'editor' ],
    'public' => true,
    'labels' => [
        'name'          => 'Screenshot & Quotes',
        'add_new_item'  => 'Add New Screenshot',
        'all_items'     => 'All Screenshot',
        'singular_name' => 'Screenshot'
      ],
       'menu_icon' => 'dashicons-format-image'
  ]);

  // Testimonial post type
  register_post_type( 'testimonial', [
    'supports'        => [ 'title', 'editor' ],
    'public'          => true,
    'labels'          => [
      'name'          => __( 'Testimonials' ),
      'add_new_item'  => __( 'Add New Testimonial' ),
      'all_items'     => __( 'All Testimonials' ),
      'singular_name' => __( 'Testimonial' ),
  ],
  'menu_icon'         => 'dashicons-format-quote'
  ] );
}

add_action( 'init', 'fahad_post_types' );

function fahad_features() {
  add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'fahad_features' );