# FirePHP 1.0.5 
Replacing the original FirePHP to the new based on ChromePhp

## Overview
FirePHP is a PHP library for the Chrome Logger Google Chrome extension and Firebug console logger Firefox 51+.

This library allows you to log variables to console.

## Requirements
- PHP 5 or late

## Installation

<img src="https://github.com/urands/urands.github.io/blob/master/resource/firephp-install.gif?raw=true" />

### Installation from composer (RECOMMENDED)
1. Add FirePHP package to your project using [composer](https://getcomposer.org/)

    ```
    composer require urands/firephp
    ```

2. If you didn't use composer yet, put somewhere autoload class in your project

	```php
	require __DIR__ . '/vendor/autoload.php';
	```

### Installation from source

1. Download [FirePhp sources](https://github.com/urands/FirePHP/releases/download/1.0.4/FirePHP-1.0.4-stable.zip)

2. Put fb.php somewhere in your PHP include path

	```php
		require_once 'fb.php'
	```


## Usage

1. Put function 'fb' somewhere in your code

	```php
		require_once 'fb.php'

		FB::log('This FirePHP for Firefox 51+');
		.....
		FB::info($_SERVER);

	```

2. Open developer console (F12) in your browser

## Support & Feedback
See [Support](http://firephp.bel-tech.ru)

## Author
This project is authored and maintained by [Iurii Bell](http://firephp.bel-tech.ru/).
