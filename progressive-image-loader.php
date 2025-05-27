<?php
/*
Plugin Name: Progressive Image Loader
Description: Adds progressive-image.js to all post images and post thumbnails for progressive loading.
Version: 1.1
Author: Sourav Pan
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Enqueue progressive-image.js assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('progressive-image', plugin_dir_url(__FILE__) . 'assets/css/progressive-image.css', [], '1.1');
    wp_enqueue_script('progressive-image', plugin_dir_url(__FILE__) . 'assets/js/progressive-image.js', [], '1.1', true);
});

// Filter post content images
add_filter('the_content', function($content) {
    if (is_admin()) return $content;

    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML('<?xml encoding="utf-8" ?>' . $content);

    $imgs = $doc->getElementsByTagName('img');
    $toReplace = [];

    foreach ($imgs as $img) {
        $src = $img->getAttribute('src');
        $alt = $img->getAttribute('alt');
        $class = $img->getAttribute('class');
        $large = $src; // fallback

        // Try to get a larger version if it's a WP attachment
        if (preg_match('/wp-image-(\d+)/', $class, $m)) {
            $id = intval($m[1]);
            $large_src = wp_get_attachment_image_src($id, 'large');
            if ($large_src) $large = $large_src[0];
        }

        // Build progressive markup
        $a = $doc->createElement('a');
        $a->setAttribute('href', $large);
        $a->setAttribute('class', 'progressive replace');

        $preview = $doc->createElement('img');
        $preview->setAttribute('src', $src);
        $preview->setAttribute('class', trim("preview $class"));
        $preview->setAttribute('alt', $alt);

        $a->appendChild($preview);
        $toReplace[] = [$img, $a];
    }

    foreach ($toReplace as [$img, $a]) {
        $img->parentNode->replaceChild($a, $img);
    }

    // Remove doctype and html/body tags
    $html = $doc->saveHTML();
    $html = preg_replace('~^.*<body>(.*)</body>.*$~s', '$1', $html);

    return $html;
});

// Filter post thumbnail (featured image)
add_filter('post_thumbnail_html', function($html, $post_id, $post_thumbnail_id, $size, $attr) {
    // Get URLs for preview and full image
    $thumb = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
    $large = wp_get_attachment_image_src($post_thumbnail_id, 'large');
    if (!$thumb || !$large) return $html;

    $alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
    $alt = esc_attr($alt ? $alt : get_the_title($post_id));

    // Use wp_get_attachment_image for the preview image
    $preview_img = wp_get_attachment_image($post_thumbnail_id, 'thumbnail', false, [
        'class' => 'preview',
        'alt'   => $alt
    ]);

    // Build progressive markup
    $out = '<a href="' . esc_url($large[0]) . '" class="progressive replace">';
    $out .= $preview_img;
    $out .= '</a>';

    return $out;
}, 10, 5); 