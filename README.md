# Timpress

A wordpress starter theme that uses timber for back-end and twig template engine for front-end

<img src="https://raw.githubusercontent.com/abdlhaklalouche/timpress/master/screenshot.png" with="340" height="230" alt="Screenshot">


## Requirements

* [Wordpress](https://wordpress.org/) any verion.
* [NPM](https://nodejs.org/).
* [Composer](https://getcomposer.org/).

## Installation

Move the theme to your themes location and open terminal from that location and excute these two commands to install packages:

* ```composer install```
* ```npm install```

## Usage

### stylesheet and javascript

* Creating files

  To start making custom stylesheet and javascript just navigate to ```assets/sass``` to create new sass file or to ```assets/js``` to create javascript file with ```ES6 syntax```

* Compiling assets

  * Edit the ```webpack.mix.js``` in the root directory of your theme to set your localhost URL and customize your assets.
  * ```npm run watch``` to start compile the assets in each save and change you do.
  * ```npm run dev``` to compile the assets without watching.
  * ```npm run prod``` to compile the release assets minified for production.

### Wordpress hooks and filters

All the wordpress stuffs hooks and filters, etc.. are managed not inside ```functions.php``` they are inside providers has ```register``` method get called automatically.

For example to enqueue a new script or style just navigate to ```app/Providers/Enqueue.php``` and add content inside ```enqueue_scripts()``` and this last method will be called inside ```register``` method.

To create a new provider you have to navigate to ```app/Providers``` and make new file and name it as you want the add this content:

```php
<?php

namespace Timpress\Providers;

class YouProviderName extends Provider {
  public function register()
  {
    // call wordpress action, hooks, filters, etc..
  }
}
```
then open ```app/config.php``` and register your provider by adding this line to ```setup/providers``` array:
```php
'setup' => [
  'providers' => [
    ...,
    Timpress\Providers\YourProviderName::class,
  ]
]
```

### MVC structure

* Models

  Acctualy the models all handled by ```Timber``` you can check anything from the [documentation](https://timber.github.io/docs/).

* Adding new controller

  To add new controller navigate to ```app/Controllers``` and make new file and name it as you want the add this content:
  ```php
  <?php

  namespace Timpress\Controllers;

  class YourController extends Controller {
    // here content of the controller
  }
  ```
* Create and render a view

  To add new view file navigate to ```assets/views``` and make new file and name it as you want with ```.twig``` extention and add content by extending existing files like:

  * extending the base twig file
    ```twig
    {% extends "partials/base.twig" %}

    {% block content %}
    
    {% endblock content %}
    ```
  * extending the main twig file
    ```twig
    {% extends "partials/main.twig" %}

    {% block content %}
    
    {% endblock content %}
    ```
    [Lean more](https://twig.symfony.com/doc/2.x/) about twig templating

  To render the file you've created you need to add ```method``` to your controller that do this like this example:
  ```php
  <?php

  namespace Timpress\Controllers;

  use Timber\Timber;

  class YourController extends Controller {
    public function render()
    {
      return $this->view('your-file.twig', [
        'posts' => Timber::get_posts(), // this for timber posts
        'foo' => 'bar' // extra variables
      ]);
    }
  }
  ```
  and then call this function in the php file like this:
  ```php
  <?php
  (new \Timpress\Controllers\YourController)->render()
  ```
## Features

* ```OOP``` and ```MVC structure``` with specifiec ```PSR-4``` namespace.
* Easy ```composer``` packages integrations.
* ```Timber``` support for avoid core wordpress classic structure.
* Clean and fast development using ```twig template  engine``` and ```webpack```.
* ```ES6 Javascript``` syntax. 

## Copyright and license

Copyright 2019 [Timpress Contributers](https://github.com/abdlhaklalouche/timpress/graphs/contributors) under the [GPL-3 license](https://opensource.org/licenses/GPL-3.0).
