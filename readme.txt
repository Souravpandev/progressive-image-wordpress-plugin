=== Progressive Image Loader ===
Contributors: souravpan1998
Tags: images, progressive loading, lazy loading, performance, optimization
Requires at least: 5.0
Tested up to: 6.8
Stable tag: 1.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Enhance your WordPress site's performance with progressive image loading for post content and featured images.

== Description ==

Progressive Image Loader is a lightweight WordPress plugin that implements progressive image loading for your website's images. It uses the progressive-image.js library to create a smooth, professional loading experience for your visitors.

= Key Features =

* Automatically applies progressive loading to all post content images
* Implements progressive loading for featured images (post thumbnails)
* Uses WordPress's built-in image sizes for optimal loading
* No configuration required - works out of the box
* Smooth transition from preview to full image
* Mobile-friendly and responsive

= How It Works =

The plugin implements progressive image loading in three simple steps:

1. Loads a small preview image first
2. Loads the full-size image in the background
3. Smoothly transitions from the preview to the full image once loaded

This approach provides several benefits:

* Faster initial page load
* Better user experience
* Reduced bandwidth usage
* Improved perceived performance

== Frequently Asked Questions ==

= Does this plugin work with all WordPress themes? =

Yes, the plugin is designed to work with any WordPress theme. It automatically processes images in post content and featured images regardless of the theme being used.

= Will this plugin slow down my website? =

No, the plugin is lightweight and actually helps improve your website's performance by loading smaller images first and then progressively loading larger versions.

= Do I need to configure anything? =

No, the plugin works out of the box with no configuration required. Simply install and activate it.

== Screenshots ==

1. Example of progressive image loading in action
2. Before and after comparison of image loading

== Changelog ==

= 1.1 =
* Added support for featured images
* Improved error handling
* Enhanced compatibility with WordPress 6.4

= 1.0 =
* Initial release
* Basic progressive image loading for post content
* Integration with progressive-image.js library

== Upgrade Notice ==

= 1.1 =
This version adds support for featured images and improves overall stability. Recommended for all users.

== Installation ==

1. Upload the `progressive-image-loader` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it! The plugin will automatically start working on your images

== Credits ==

This plugin uses the [progressive-image.js](https://github.com/craigbuckler/progressive-image.js) library by Craig Buckler. 