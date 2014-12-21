<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImagesController
{
	private $app;

	public function __construct($app)
	{

		$this->app = $app;
	}

	public function createThumb($request){
		$template = $request->files->get('template');
		$nest     = $request->files->get('nest');

		$templateNewName = md5(time()).'.jpg';
		$nestNewName = md5(time().'nest').'.jpg';
		$resultName = md5(time().'result').'.jpg';

		$template->move('../images/templates',$templateNewName);
		$nest->move('../images/nests',$nestNewName);

		$imageMatcher = $this->app['ImageMatcher'];

		$imageMatcher->setHolmesBinDir($this->app['config']['settings']['holmes-binaries']);
		$imageMatcher->setTemplateDir(self::defaultImagesDir().'\templates\\'.$templateNewName);
		$imageMatcher->setNestDir(self::defaultImagesDir().'\nests\\'.$nestNewName);
		$imageMatcher->setResultDir(self::defaultImagesDir().'\matches\\'.$resultName);
		$imageMatcher->setWidth($request->get('width'));
		$imageMatcher->setHeight($request->get('height'));
		$imageMatcher->showPreview($request->get('preview'));

		$imageMatcher->makeMatch();
		$this->unlinkOldFiles($imageMatcher);

		return $this->checkIfFileCreated($imageMatcher,$resultName);

	}

	protected function unlinkOldFiles($imageMatcher)
	{
		unlink($imageMatcher->getTemplateDir());
		unlink($imageMatcher->getNestDir());		
	}

	protected function checkIfFileCreated($imageMatcher,$resultName)
	{
		if(file_exists($imageMatcher->getResultDir())) {

			return "http://localhost/holmes-web/images/matches/".$resultName;
		}

		return false;
	}

	private static function defaultImagesDir()
	{

		return __DIR__.'\..\..\images';
	}
}