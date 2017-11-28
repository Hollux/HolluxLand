<?php
use Symfony\Component\HttpFoundation\Request;

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
ini_set("session.name", 'holluxSession');
/**
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../private/app/autoload.php';
include_once __DIR__.'/../private/var/bootstrap.php.cache';
$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request  = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);