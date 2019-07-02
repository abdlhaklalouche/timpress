<?php

if(!function_exists('config')) {
  /**
   * Get configurations from config file by keys.
   * 
   * @param string path  - The path of the keys in the config array.
   * @return string data - The value of the specifiec path.
   */
  function config(string $path)
  {
    $keys = explode('.', $path);
    $data = include_once('config.php');
    foreach($keys as $key) {
      if(!isset($data[$key])) {
        return;
      }
      $data = $data[$key];
    }
    return $data;
  }
}