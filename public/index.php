<?php

use Peluqueria\Core\App;

// Cargar las constantes de configuración en producción
if ($_ENV['APP_ENV'] !== 'dev') {
  require_once('/app/src/config/env.php');
}

// Cargar las constantes de configuración en desarrollo
require_once(__DIR__ . '/../src/config/env.php');

// Cargar el autoloader de composer
require_once(PATH . '/../vendor/autoload.php');

$app = new App();
