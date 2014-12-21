<?php
require_once __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/App.php';

use Symfony\Component\HttpFoundation\Request;
use Controllers\ImagesController;

$app['images.repository'] = $app->share(function($app){

	return new ImagesController($app);
});

$app->post('/match_images',function (Request $request) use ($app){

	return $app['images.repository']->createThumb($request);
});

$app->run();