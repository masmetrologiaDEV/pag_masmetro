<?php

// Valid PHP Version?
$minPHPVersion = '7.2';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run CodeIgniter. Current version: " . phpversion());
}
unset($minPHPVersion);

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Location of the Paths config file.
$pathsPath = realpath(FCPATH . 'app/Config/Paths.php');

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
require $pathsPath;
$paths = new Config\Paths();

// ✅ Esta línea es indispensable cuando moviste el index fuera de public:
$paths->systemDirectory = FCPATH . 'system';

// Opcional: Forzar entorno a desarrollo
$_SERVER['CI_ENVIRONMENT'] = 'development';

// Location of the framework bootstrap file.
$app = require rtrim($paths->systemDirectory, '/ ') . '/bootstrap.php';

// LAUNCH THE APPLICATION
$app->run();
