<?php

namespace Timpress\Providers;

use Timber\Timber;

class Setup extends Provider {
  public function register()
  {
    $this->startTimber();
    add_action('after_setup_theme', [$this, 'add_theme_supports']);
  }

  private function startTimber()
  {
    return Timber::$locations = get_template_directory() . '/assets/views/'; 
  }

  public function add_theme_supports()
  {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-header', [
      'default-image'          => '',
      'random-default'         => false,
      'width'                  => 0,
      'height'                 => 0,
      'flex-height'            => false,
      'flex-width'             => false,
      'default-text-color'     => '',
      'header-text'            => true,
      'uploads'                => true,
      'wp-head-callback'       => '',
      'admin-head-callback'    => '',
      'admin-preview-callback' => '',
      'video'                  => false,
      'video-active-callback'  => 'is_front_page',
    ]);

    add_theme_support('custom-logo', [
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => ['site-title', 'site-description'],
    ]);


    add_theme_support('html5', array(
      'comment-list', 
      'comment-form',
      'search-form',
      'gallery',
      'caption',
    ));

    add_theme_support('post-formats', array( 
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
    ));
  }
}