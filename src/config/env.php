<?php
// En caso de que APP_ENV sea producción
if ($_ENV['APP_ENV'] !== 'dev') {
  define('PATH', '/app/src');
}

// En caso de que APP_ENV sea desarrollo
define('PATH', '/var/www/html/src');

// Path de root
define('ROOT', dirname(__DIR__));
