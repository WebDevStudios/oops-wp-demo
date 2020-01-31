# OOPS-WP Demo
This is a companion repository to the [OOPS-WP](https://github.com/webdevstudios/oops-wp) project.
It provides code examples for the various structures and utilities provided by the OOPS-WP
library.

## Requirements
This example requires that you have [Composer](https://getcomposer.org)
and [Git](https://git-scm.org) installed on your computer, and that you
are also familiar with how to set up a local WordPress installation.

## Installation
Ideally, your project would require this plugin via Composer:
`composer require webdevstudios/oops-wp-demo`

Depending on where your vendor directory is configured to install, you
would then require the Composer autoloader. One approach we like to take
is to [configure Composer to install the vendor directory inside the mu-plugins
directory](https://getcomposer.org/doc/06-config.md#vendor-dir), and create
an `autoloader.php` mu-plugin, so you wind up with the following directory
structure:

/mu-plugins/
- /vendor/
- autoloader.php

Inside autoloader.php, you would include your require statement:

```
<?php
// autoloader.php
require_once __DIR__ . '/vendor/autoload.php';
```

Alternately, you can simply clone this repo into your plugins directory,
change into the directory, then run `composer install` there:

```
git clone https://github.com/webdevstudios/oops-wp-demo
cd oops-wp-demo && composer install
```

Once complete, you should be able to activate this plugin from the
WordPress dashboard!
