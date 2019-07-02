<?php

namespace PBST\Controllers;

class ErrorController extends Controller {
  public function render()
  {
    return $this->view('404.twig');
  }
}