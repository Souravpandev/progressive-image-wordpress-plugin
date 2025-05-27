# Progressive Image Loader

A WordPress plugin that implements progressive image loading for post content images and featured images using progressive-image.js.

## Features

- Automatically applies progressive loading to all post content images
- Applies progressive loading to featured images (post thumbnails)
- Uses WordPress's built-in image sizes for optimal loading
- No configuration required - works out of the box

## Installation

1. Download the plugin files
2. Upload the `progressive-image-loader` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

## How It Works

The plugin uses the [progressive-image.js](https://github.com/craigbuckler/progressive-image.js) library to implement progressive image loading. It works by:

1. Loading a small preview image first
2. Loading the full-size image in the background
3. Smoothly transitioning from the preview to the full image once loaded

## Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher

## License

This plugin is licensed under the GPL v2 or later.

## Credits

- Uses [progressive-image.js](https://github.com/craigbuckler/progressive-image.js) by Craig Buckler 
