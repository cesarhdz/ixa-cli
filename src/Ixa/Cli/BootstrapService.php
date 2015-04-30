<?php

namespace Ixa\Cli;

use Symfony\Component\Yaml\Parser;

class BootstrapService
{

	protected static $envFile = 'wp-content/config/.env.yml';

	protected $cwd;
	protected $parser;

	public function __construct($cwd){
		$this->cwd = $cwd;
		$this->parser = new Parser();
	}

	/**
	 * Simple config loader
	 * @return Array Config of Wordpress Site
	 */
    public function loadConfig()
    {
    	// Env config
    	$file = $this->readFile(static::$envFile);

    	return $this->parser->parse($file);
    }

    /**
     * Simple method to read file from current cwd
     * @param  String $file File to be read
     * @return String       file content
     */
    protected function readFile($file){
    	$path  = implode([$this->cwd, $file], DIRECTORY_SEPARATOR);
    	return file_get_contents($path);
    }


}
