<?php

namespace Timpress\Controllers;

class IndexController extends Controller {
  public function render()
  {
    return $this->view('index.twig');
  }
}