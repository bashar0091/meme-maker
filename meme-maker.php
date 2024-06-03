<?php
/**
 * Plugin Name: Meme Maker
 * Description: 
 * Version:     1.0.0
 * Author:      Awal Bashar
 * Author URI:  
 * Text Domain: meme_maker
 */

// Prevent direct access to the plugin file
defined('ABSPATH') || exit;

 /**
 * 
 * enqueue css and js 
 * 
 */

 function etheme_enqueue_scripts() {

	// css file 
    wp_enqueue_style('meme-style', plugin_dir_url(__FILE__) . 'assets/css/meme.css', false, '1.0.0', '');

	// js add 
    wp_enqueue_script('meme-script', plugin_dir_url(__FILE__) . 'assets/js/meme.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'etheme_enqueue_scripts');

/**
 * 
 * require file
 * 
 */

 require_once('shortcode/meme-template.php');