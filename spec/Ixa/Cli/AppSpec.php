<?php

namespace spec\Ixa\Cli;

use Ixa\Cli\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AppSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ixa\Cli\App');
        $this->shouldImplement('Herrera\Cli\Application');

        $this['app.name']->shouldBe('ixa-cli');
        $this['app.version']->shouldBe(App::VERSION);
    }
}
