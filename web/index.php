<?php
require_once __DIR__.'/../vendor/autoload.php';
require __DIR__ . '/../app/config/App.php';

use Symfony\Component\HttpFoundation\Request;
use Controllers\ImagesController;

$app['images.repository'] = $app->share(function($app){

	return new ImagesController($app);
});

$app->post('/match_images',function (Request $request) use ($app){

	$imageMatch = $app['images.repository']->createThumb($request);
	$jsonResponser = $app['JsonResponser'];

	if($imageMatch) {

		$jsonResponser->setData(['url'=>$imageMatch]);
		$jsonResponser->setStatus(201);
		return $jsonResponser->response($app);
	}

	$jsonResponser->setStatus(422);
	return $jsonResponser->response($app);
});

$app->run();