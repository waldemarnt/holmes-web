<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Services\ImageMatcher;

$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new \DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../app/config.yml'));

$app['ImageMatcher'] = $app->share(function($app){
	return new ImageMatcher();
});
