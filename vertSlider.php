<?php 
/**
* Plugin Name: Vert Slider
* Plugin URI: http://joshnykamp.com
* Description: Verticle jQuery Slider
* Version: 0.1
* Author: Josh Nykamp
* Author URI: http://joshnykamp.com
* License: GPL12
*/

global $vertSlider_version;
$vertSlider_version = '0.1';

function vertSlider_install() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'vertSlider';
    $sql = "CREATE TABLE $table_name(
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      background_image VARCHAR(122),
      heading VARCHAR(25),
      description TEXT,
      link VARCHAR(55),
      UNIQUE KEY id (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'vertSlider_install');

add_action('admin_menu', 'vertSlider_settings_menu');

function vertSlider_settings_menu() {
    add_menu_page('Vert Slider Settings', 'Vert Slider', 'manage_options', 'vert-slider-settings', 'vert_slider_settings_page', 'dashicons-image-flip-vertical');
}

function vert_slider_settings_page() {
    echo '<div class="wrap"><h2>Vert Slider Settings</h2></div>';
}