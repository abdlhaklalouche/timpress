<?php

if(!function_exists('starts_with')) {
  /**
   * Determine if a given string starts with a given substring.
   *
   * @param  string  $haystack
   * @param  string|array  $needles
   * @return bool
   */
  function starts_with($haystack, $needles)
  {
      foreach ((array) $needles as $needle) {
          if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
              return true;
          }
      }
      return false;
  }
}

if(!function_exists('public_path')) {
  /**
   * Get the path to the folder named public.
   * 
   * @param string $concat - Optional string can be concatinated to the path string
   * @return string
   */
  function public_path($concat = '') {
    if($concat && !starts_with($concat, '/')) {
      $concat = "/{$concat}";
    }
    return get_template_directory() . '/public' . $concat;
  }
}

if(!function_exists('assets_path')) {
  /**
   * Get the path to the folder named public.
   * 
   * @param string $concat - Optional string can be concatinated to the path string
   * @return string
   */
  function assets_path($concat = '') {
    if($concat && !starts_with($concat, '/')) {
      $concat = "/{$concat}";
    }
    return get_template_directory() . '/assets' . $concat;
  }
}


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

if (!function_exists('mix')) {
	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param  string  $path
	 * @param  string  $manifestDirectory
	 * @return string
	 *
	 * @throws \Exception
	 */
	function mix($path, $manifestDirectory = 'public/')
	{
    static $manifest;
    
		if (!starts_with($path, '/')) {
			$path = "/{$path}";
		}
		if ($manifestDirectory && !starts_with($manifestDirectory, '/')) {
			$manifestDirectory = "/{$manifestDirectory}";
    }
		$rootDir = dirname(__FILE__, 2);
		if (file_exists($rootDir . '/' . $manifestDirectory.'/hot')) {
			return get_site_url() . ":8080" . $path;
		}
		if (!$manifest) {
			$manifestPath =  $rootDir . $manifestDirectory . 'mix-manifest.json';
			if (!file_exists($manifestPath)) {
				throw new Exception('The Mix manifest does not exist.');
			}
			$manifest = json_decode(file_get_contents($manifestPath), true);
		}
    if(!isset($manifest[$path])) {
      $path = ltrim($path, '/');
      if(!isset($manifest[$path])) {
				throw new Exception('Mix file does not exist.');
      }
    }
    $path = $manifestDirectory . $manifest[$path];
		return get_template_directory_uri() . $path;
	}
}

if (!function_exists('asset')) {
	/**
	 * Get the path an asset file.
	 *
	 * @param  string  $path
   * @return string|null
	 */
	function asset($path)
	{
    if(!starts_with($path, '/')) {
      $path = "/{$path}";
    }
		return ($path) ? get_template_directory_uri() . '/public' . $path : null;
	}
}