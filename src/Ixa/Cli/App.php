<?php

namespace Ixa\Cli;

use Herrera\Cli\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

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


        // Register Commands
        $this['db:export'] = new DbExportCommand();
	}
}
