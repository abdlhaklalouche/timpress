<?php

namespace PBST\Controllers;

class IndexController extends Controller {
  public function render()
  {
    return $this->view('index.twig');
  }
}