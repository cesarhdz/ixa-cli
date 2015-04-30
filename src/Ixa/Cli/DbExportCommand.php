<?php

namespace Ixa\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class DbExportCommand extends Command
{
    protected $dbService;

    function __construct(DbService $dbService){
        $this->dbService = $dbService;

        parent::__construct();
    }

	protected function configure()
    {
        $this->setName('db:export')
             ->setDescription('Export current database')
             ->addArgument(
                'file',
                InputArgument::OPTIONAL,
                'Location of the sql file'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$app = $this->getApp();

    	$config = $app['ixa.bootstrap']->loadConfig();
        $file = $input->getArgument('file') ?: 'backup.sql';

     	$output->writeln('Exporting Database ['. $config['parameters']['db_name'] .'] ...');

        try {
        
            $result = $this->dbService->export($config['parameters'], $file, '/tmp');
        
        } catch (\Exception $e) {
            $output->writeln('Export failed with message: ' . $e->getMessage());
            return;
        }
        
		$output->writeln('Exported successfully to [' . $file . ']');

        return $file;
    }


    protected function getApp(){
    	return  $this->getHelperSet()->get('app');
    }
}