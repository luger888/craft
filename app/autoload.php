<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add( 'simplelinkedin', __DIR__.'/../vendor/jojari/simplelinkedin' );
set_include_path(__DIR__.'/../vendor/jojari/simplelinkedin' .PATH_SEPARATOR.get_include_path());
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
