<?php

namespace spec\Eddy\Coder;

use Eddy\Coder\GeneratedCode;
use PhpSpec\ObjectBehavior;

class GeneratedCodeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('/path/to.file.php', 'Contents of file');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(GeneratedCode::class);
    }

    function it_has_a_full_filepath()
    {
        $this->getPath()->shouldBeString();
    }

    function it_contains_a_template_formatted_from_a_resource()
    {
        $this->getContents()->shouldBeString();
    }
}
