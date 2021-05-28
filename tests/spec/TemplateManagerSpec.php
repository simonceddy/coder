<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\TemplateManager;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class TemplateManagerSpec extends ObjectBehavior
{
    function let(Filesystem $fs)
    {
        $this->beConstructedWith($fs);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TemplateManager::class);
    }

    function it_returns_the_requested_template_as_a_string(Filesystem $fs)
    {
        $path = dirname(__DIR__, 2) . '/src/templates/class.template';
        $fs->exists($path)->willReturn(true);
        $this->get('class')->shouldBeString();
    }
}
