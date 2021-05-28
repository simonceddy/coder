<?php
namespace spec\Eddy\Coder;

use Eddy\Coder\PhpResource;
use Eddy\Coder\CoderResource;
use PhpSpec\ObjectBehavior;

class PhpResourceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Testing', 'Eddy\\Coder\\Begenerated\\');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(PhpResource::class);
        $this->shouldHaveType(CoderResource::class);
    }

    function it_has_a_filename()
    {
        $this->getFilename()->shouldReturn('Testing.php');
    }

    function it_has_a_namespace()
    {
        $this->getNamespace()->shouldReturn('Eddy\\Coder\\Begenerated\\');
    }
}
