# FirePHP 1.1 ()
Replacing the original FirePHP to the new based on ChromePhp

===========

## Overview
FirePHP is a PHP library for the Chrome Logger Google Chrome extension and  Firebug console logger Firefox 51+.

This library allows you to log variables to console.

## Requirements
- PHP 5 or late

## Installation

[Instalation FirePHP](https://raw.githubusercontent.com/urands/urands.github.io/master/resource/test.gif)

### Instalation from composer (RECOMMENDED)
1. Add FirePHP package to your project using [composer](https://getcomposer.org/)

    ```
    composer require urands/firephp
    ```

2. If you didn't use composer yet, put somewhere autoload class in your project

	```php
	require __DIR__ . '/vendor/autoload.php';
	```

### Instalation from source

1. Download [FirePhp sources](https://github.com)

2. Put fb.php somewhere in your PHP include path

	```php
		require_once fb.php
	```


## Usage

1. Put function 'fb' somewhere in your code

	```php
		require 'fb.php'

		FB::log('This FirePHP for Firefox 51+');
		.....
		FB::info($_SERVER);

	```

2. Open console in your browser



## Support & Feedback
==================

See [Support](http://firephp.bel-tech.ru)



## Author
This project is authored and maintained by [Iurii Bell](http://firephp.bel-tech.ru/).
