<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\Templator;
use Eddy\Coder\CoderResource as R;
use PhpSpec\ObjectBehavior;

class TemplatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Templator::class);
    }

    function it_formats_the_given_template_for_the_given_resource(R $resource)
    {
        $resource->getName()->willReturn('World');
        $this->format($resource, 'Hello %name%')->shouldReturn('Hello World');
    }
}
