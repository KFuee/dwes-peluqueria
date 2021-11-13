<?php
// Carga de clases composer
require_once '../vendor/autoload.php';

if (!session_id()) @session_start();

require "core/App.php";
$app = new App();
