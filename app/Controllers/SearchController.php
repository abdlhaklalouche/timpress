<?php

namespace Timpress\Controllers;

class SearchController extends Controller {
  public function render()
  {
    return $this->view('search.twig');
  }
}