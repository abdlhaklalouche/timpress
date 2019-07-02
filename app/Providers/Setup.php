<?php

namespace Timpress\Providers;

use Timber\Timber;

class Setup extends Provider {
  public function register()
  {
    $this->startTimber();
  }

  private function startTimber()
  {
    return Timber::$locations = get_template_directory() . '/assets/views/'; 
  }
}