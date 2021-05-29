<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\Creator;
use Eddy\Coder\CoderResource as R;
use Eddy\Coder\GeneratedCode as GC;
use Eddy\Coder\Templator as T;
use Eddy\Coder\TemplateManager as TM;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class CreatorSpec extends ObjectBehavior
{
    function let(TM $manager, T $templator)
    {
        $this->beConstructedWith($manager, $templator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Creator::class);
    }

    function it_creates_a_generated_code_object_from_the_given_resource(
        R $resource,
        T $templator,
        TM $manager
    ) {
        $template = '%name%';
        $resource->getFilename()->willReturn('TestClass.php');
        $resource->getNamespace()->willReturn('Testing\\');
        $resource->getSrcDir()->willReturn(dirname(__DIR__, 2) . '/tests/storage');

        $templator->format($resource, $template)->willReturn('TestClass');

        $manager->get('class')->willReturn($template);

        $this->create($resource, 'class')->shouldBeAnInstanceOf(GC::class);
    }
}
