<?php
namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Services\ImageMatcher;
use Services\JsonResponser;

$app = new \Silex\Application();

$app->register(new \DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../../app/config/config.yml'));
$app['debug'] = $app['config']['settings']['debug'];

$app['ImageMatcher'] = $app->share(function($app){
	return new ImageMatcher();
});

$app['JsonResponser'] = $app->share(function($app){
	return new JsonResponser();
});