<?php
namespace Services;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ImageMatcher
{
	private $holmesBinDir;
	private $templateDir;
	private $nestDir;
	private $resultDir;
	private $width = 0;
	private $height = 0;
	private $showPreview = false;

	public function __construct(){

		return $this;
	}


	public function makeMatch()
	{

	 	exec($this->holmesBinDir." ".$this->templateDir." ".$this->nestDir." ".$this->resultDir." ".$this->width." ".$this->height." ".$this->showPreview);
	}



    /**
     * Sets the value of holmesBinDir.
     *
     * @param mixed $holmesBinDir the holmes bin dir
     *
     * @return self
     */
    public function setHolmesBinDir($holmesBinDir)
    {
        $this->holmesBinDir = $holmesBinDir;

        return $this;
    }

    /**
     * Sets the value of templateDir.
     *
     * @param mixed $templateDir the template dir
     *
     * @return self
     */
    public function setTemplateDir($templateDir)
    {
        $this->templateDir = $templateDir;

        return $this;
    }

    /**
     * Sets the value of nestDir.
     *
     * @param mixed $nestDir the nest dir
     *
     * @return self
     */
    public function setNestDir($nestDir)
    {
        $this->nestDir = $nestDir;

        return $this;
    }

    /**
     * Sets the value of resultDir.
     *
     * @param mixed $resultDir the result dir
     *
     * @return self
     */
    public function setResultDir($resultDir)
    {
        $this->resultDir = $resultDir;

        return $this;
    }

    /**
     * Sets the value of width.
     *
     * @param mixed $width the width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Sets the value of height.
     *
     * @param mixed $height the height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Sets the value of showPreview.
     *
     * @param mixed $showPreview the show preview
     *
     * @return self
     */
    public function showPreview($showPreview)
    {
        $this->showPreview = $showPreview;

        return $this;
    }



    /**
     * Gets the value of holmesBinDir.
     *
     * @return mixed
     */
    public function getHolmesBinDir()
    {
        return $this->holmesBinDir;
    }

    /**
     * Gets the value of templateDir.
     *
     * @return mixed
     */
    public function getTemplateDir()
    {
        return $this->templateDir;
    }

    /**
     * Gets the value of nestDir.
     *
     * @return mixed
     */
    public function getNestDir()
    {
        return $this->nestDir;
    }

    /**
     * Gets the value of resultDir.
     *
     * @return mixed
     */
    public function getResultDir()
    {
        return $this->resultDir;
    }

    /**
     * Gets the value of width.
     *
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Gets the value of height.
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Gets the value of showPreview.
     *
     * @return mixed
     */
    public function getShowPreview()
    {
        return $this->showPreview;
    }
}