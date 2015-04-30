<?php

namespace spec\Ixa\Cli;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DbServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\DbService');
    }
}
