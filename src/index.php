<?php

use Peluqueria\Core\App;

// Cargar el autoloader de composer
if ($_ENV['APP_ENV'] != 'dev')
  require_once '../vendor/autoload.php';
else
  require_once('/var/www/vendor/autoload.php');

$app = new App();
