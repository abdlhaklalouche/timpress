<?php

namespace PBST\Controllers;

class SingleController extends Controller {
  public function render($post)
  {
    return $this->view([
      'posts/' . $post->post_type . '/' . $post->post_name . '.twig',
      'posts/' . $post->post_type . '/default.twig',
      'posts/default.twig'
    ]);
  }
}