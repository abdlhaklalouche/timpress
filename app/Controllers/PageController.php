<?php

namespace Timpress\Controllers;

class PageController extends Controller {
  public function render($post)
  {
    return $this->view([
      'pages/' . $post->post_name . '.twig',
      'pages/' . $post->ID . '.twig',
      'pages/default.twig'
    ]);
  }
}