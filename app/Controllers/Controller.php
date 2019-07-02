<?php

namespace Timpress\Controllers;

use Timber\Timber;

abstract class Controller {
  /**
   * Render the view from twig to regular php.
   * 
   * @param any path    - The path of the file we wanna render.
   * @param array data  - The data we wanna pass through this render operation.
   * @return context
   */
  protected function view($path, array $data = []) {
    $context  = Timber::context();
    $data     = array_merge($context, $data);
    return Timber::render($path, $data);
  }
}