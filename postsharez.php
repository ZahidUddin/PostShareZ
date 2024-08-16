<?php
/*
Plugin Name: PostShareZ
Plugin URI: https://zahiduddin.com/postsharez
Description: A simple plugin to add social share buttons to pages, posts, and products.
Version: 1.0.0
Author: Your Name
Author URI: https://zahiduddin.com
Text Domain: postsharez
Domain Path: /languages
License: GPL2
*/

defined('ABSPATH') || exit;

// Include the main class file.
require_once plugin_dir_path(__FILE__) . 'includes/class-wp-social-share.php';

// Initialize the plugin.
function wp_social_share_init() {
    $plugin = new WP_Social_Share();
    $plugin->run();
}
add_action('plugins_loaded', 'wp_social_share_init');
