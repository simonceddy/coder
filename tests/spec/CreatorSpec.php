<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\Creator;
use Eddy\Coder\CoderResource as R;
use Eddy\Coder\Templator as T;
use Eddy\Coder\TemplateManager as TM;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreatorSpec extends ObjectBehavior
{
    function let(Filesystem $fs, TM $manager, T $templator)
    {
        $this->beConstructedWith($fs, $manager, $templator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Creator::class);
    }

    function it_creates_a_file_from_the_given_resource(
        R $resource,
        TM $manager
    ) {
        $resource->getFilename()->willReturn('TestClass.php');
        $resource->getNamespace()->willReturn('Testing\\');
        $resource->getSrcDir()->willReturn(dirname(__DIR__, 2) . '/tests/storage');

        $manager->get('class')->willReturn('%name%');

        $this->create($resource, 'class')->shouldReturn(1);
        // dump(file_exists(dirname(__DIR__, 2) . '/tests/storage/Testing/TestClass.php'));
    }
}
