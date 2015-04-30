<?php

namespace Ixa\Cli;

use Herrera\Cli\Application;

class App extends Application
{

	const NAME = 'ixa-cli';
	const VERSION = '0.1';


	function __construct($args = []){

		$args['app.name'] = App::NAME;
		$args['app.version'] = App::VERSION;

		// Construct
		parent::__construct($args);


		// Register Dependencies
        $this['wp.bootstrap'] = new BootstrapService(getcwd());
	}
}
