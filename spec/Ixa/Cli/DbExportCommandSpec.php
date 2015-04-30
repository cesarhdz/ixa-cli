<?php

namespace spec\Ixa\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DbExportCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\DbExportCommand');
        $this->shouldImplement('Symfony\Component\Console\Command\Command');
    }
}
