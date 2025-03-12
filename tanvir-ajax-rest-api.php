<?php 

/**
 * Plugin Name: Tanvir Ajax Rest API
 * Description: A simple plugin to demonstrate how to use AJAX in WordPress. and also how to use REST API in WordPress.
 * Plugin URI: hhttps://github.com/tanvirSajib
 */


  /**
  * Create an admin page to show the form submissions
  */
  function tanvir_ajax_rest_api_submenu(){
    add_menu_page(
        esc_html__('Tanvir Ajax Rest API', 'textdomain'), 
        esc_html__('Tanvir Ajax Rest API', 'textdomain'), 
        'manage_options', 
        'tanvir-ajax-rest-api', 
        'tanvir_ajax_rest_api_page',
        'dashicons-admin-tools'
    );
  }
  add_action('admin_menu', 'tanvir_ajax_rest_api_submenu');

  /**
 * Render the form submissions admin page
 */
function tanvir_ajax_rest_api_page(){
  ?>
  <div class="wrap" id="tanvir-learn-ajax-api">
      <h1>Admin</h1>
      <button id="tanvir-ajax-rest-api-ajax-button">Load post via admin ajax</button>
      <button id="tanvir-ajax-rest-api-api-button">Load post via rest api</button>
      <button id="tanvir-ajax-rest-api-clear-posts">Clear Posts</button>
      <h2>Posts</h2>
      <textarea clos="125" rows="15" id="tanvir-ajax-rest-api-posts"></textarea>
</div>
  <?php
}

  /**
   * Enqueue the main plugin script file
   */
  function tanvir_ajax_rest_api_enqueue_scripts(){
    wp_register_script(
        'tanvir-ajax-rest-api-script',
        plugin_dir_url( __FILE__ ) . 'tanvir-ajax-rest-api-script.js',
        array( 'jquery' ),
        time(),
        true
    );

    wp_enqueue_script( 'tanvir-ajax-rest-api-script' );

    /**
     * Localize the script with the Ajax url to handle ajax request
     */
    wp_localize_script(
        'tanvir-ajax-rest-api-script',
        'tanvir_learn_ajax_api_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );
  }
  add_action('admin_enqueue_scripts', 'tanvir_ajax_rest_api_enqueue_scripts');


  /**
 * Handle the ajax request to get posts
 */
function tanvir_ajax_rest_api_fetch_posts(){
    $posts = get_posts();
    wp_send_json( $posts );
    wp_die(); // all ajax handlers should die when finished
}
add_action( 'wp_ajax_tanvir_ajax_rest_api', 'tanvir_ajax_rest_api_fetch_posts' );
