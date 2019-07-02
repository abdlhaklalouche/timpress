<?php

namespace PBST;

class init {

  private static $initialized = false;

  public function __construct()
  {
    if(!self::$initialized)
      return $this->register();
  }

  /**
   * Register all providers inside config array.
   * 
   * @return void
   */
  private function register()
  {
    self::$initialized = true;

    foreach(config('setup.providers') as $provider) {
      (new $provider)->register();
    }
  }
}