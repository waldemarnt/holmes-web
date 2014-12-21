<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Services\ImageMatcher;
use Controllers\ImagesController;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../app/config.yml'));

$app['ImageMatcher'] = $app->share(function($app){
	return new ImageMatcher();
});

$app['images.repository'] = $app->share(function($app){

	return new ImagesController($app);
});

$app->post('/match_images',function (Request $request) use ($app){

	return $app['images.repository']->createThumb($request);
});

$app->run();