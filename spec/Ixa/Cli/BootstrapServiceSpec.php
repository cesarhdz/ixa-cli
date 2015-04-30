<?php

namespace spec\Ixa\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use org\bovigo\vfs\vfsStream;

class BootstrapServiceSpec extends ObjectBehavior
{

	function let(){
    	// Setup
    	$env = "yaml: true";

    	$fs = $this->_mock_fs('wp-app', [
    		'wp-content' => [
    			'config' => [
    				'.env.yml' => $env
    			]
    		]
    	]);

    	$this->beConstructedWith($fs->dir);
	}


    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\BootstrapService');
    }

    function it_should_load_config()
    {
    	$this->loadConfig()->shouldReturn(['yaml' => true]);
    }


    function _mock_fs($base, array $tree){
        $stream = vfsStream::setup($base);
        vfsStream::create($tree, $stream);
        return (object) [
            'stream' => $stream,
            'dir'    => vfsStream::url($base)
        ];
    }
}
