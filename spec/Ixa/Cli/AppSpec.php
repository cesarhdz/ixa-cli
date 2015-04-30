<?php

namespace spec\Ixa\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AppSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\App');
        $this->shouldImplement('Herrera\Cli\Application');
    }
}
