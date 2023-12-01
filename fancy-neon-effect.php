<?php
/*
Plugin Name: Fancy Neon Effect
Description: Adds a fancy neon effect to your WordPress site.[fancy_neon text="Welcome" size="2em" align="center"]

Version: 1.0
Author: Your Name
*/

// Enqueue scripts and styles
function fancy_neon_effect_scripts() {
    // Enqueue jQuery from a CDN

    // Enqueue custom script
    wp_enqueue_script('fancy-neon-effect-script', plugins_url('script.js', __FILE__), array('jquery'), '1.0', true);

    // Enqueue custom stylesheet
    wp_enqueue_style('fancy-neon-effect-style', plugins_url('style.css', __FILE__), array(), '1.0');
}

// Hook the function to the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'fancy_neon_effect_scripts');

function fancy_neon_shortcode($atts, $content = null) {
    // Generate a unique identifier based on the shortcode attributes
    $shortcode_id = 'neon-shortcode-' . substr(md5(serialize($atts)), 0, 8);

    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'text'  => 'Join Us',     // Default text
            'size'  => '7.5em',        // Default font size
            'align' => 'center',      // Default alignment
        ),
        $atts,
        'fancy_neon'
    );

    // Generate HTML with shortcode attributes and unique class
    $output = '
        <div class="clearfix booking-form">
            <div class="booking-form__heading no-print">
                <div>
                    <div class="neon-border neon-border--flush neon-border--blue neon-border--topgap-xxs neon-border--bottomgap-xxs">
                        <h2 class="h2 type-decorative neon-shortcode text-glow pink ' . esc_attr($shortcode_id) . '" style="font-size: ' . esc_attr($atts['size']) . '; text-align: ' . esc_attr($atts['align']) . ';">' . esc_html($atts['text']) . '</h2>
                    </div>
                </div>
            </div>
        </div>
    ';

    return $output;
}

// Register the shortcode
add_shortcode('fancy_neon', 'fancy_neon_shortcode');


