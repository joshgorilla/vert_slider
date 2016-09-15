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

function vert_slider_load_scripts() {
    wp_enqueue_style( 'vert-slider', plugin_dir_url(__FILE__) . 'css/style.css' );
    wp_enqueue_script('vert_slider', plugin_dir_url(__FILE__) . 'js/vert_slider.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'vert_slider_load_scripts' );

function add_vert_slider() {
    $arr = [
        1 => [
            'background_image' => plugin_dir_url( __FILE__ ).'images/1.jpg',
            'heading' => 'Heading 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                      ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                      reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                       nulla pariatur',
            'link' => 'http://google.com'
        ],
        2 => [
            'background_image' => plugin_dir_url( __FILE__ ).'images/2.jpg',
            'heading' => 'Heading 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                      ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                      reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                       nulla pariatur',
            'link' => 'http://google.com'
        ],
        3 => [
            'background_image' => plugin_dir_url( __FILE__ ).'images/3.jpg',
            'heading' => 'Heading 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                      ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                      reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                       nulla pariatur',
            'link' => 'http://google.com'
        ],
        4 => [
            'background_image' => plugin_dir_url( __FILE__ ).'images/4.jpg',
            'heading' => 'Heading 4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                      ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                      reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                       nulla pariatur',
            'link' => 'http://google.com'
        ]
    ];
    ?>
    <ul class="vert-slider" id="vert-slider">
    <?php
    foreach($arr as $value) { ?>
       <li style="background-image:url(<?php echo $value['background_image'] ?>)">
          <div class="heading"><?php echo $value['heading']; ?></div>
            <div class="bgDescription"></div>
            <div class="description">
              <h2><?php echo $value['heading']; ?></h2>
              <p></p>
              <a href="<?php echo $value['link']; ?>">more &rarr;</a>
            </div>
       </li>
    <?php } ?>
    </ul>
<?php }

add_shortcode('vert_slider', 'add_vert_slider');