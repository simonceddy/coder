<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\Creator;
use Eddy\Coder\CoderResource as R;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreatorSpec extends ObjectBehavior
{
    function let(Filesystem $fs)
    {
        $this->beConstructedWith($fs);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Creator::class);
    }

    function it_creates_a_file_from_the_given_resource(
        R $resource
    ) {
        $resource->getFilename()->willReturn('TestClass.php');
        $resource->getNamespace()->willReturn('Testing\\');

        $this->create($resource, dirname(__DIR__, 2) . '/tests/storage')->shouldReturn(1);
        dump(file_exists(dirname(__DIR__, 2) . '/tests/storage/Testing/TestClass.php'));
    }
}
