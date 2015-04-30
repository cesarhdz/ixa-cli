<?php

namespace spec\Ixa\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DbExportCommandSpec extends ObjectBehavior
{

	function let(\Ixa\Cli\DbService $service){
		$this->beConstructedWith($service);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\DbExportCommand');
        $this->shouldImplement('Symfony\Component\Console\Command\Command');
    }
}
