<?php 
// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Services\ImageMatcher;
use App\App;

//require __DIR__.'/../src/app.php';
$app = new App();
$app->post('/match_images',function (Request $request) use ($app){

	return $app['images.repository']->createThumb($request);
});

$app->run();