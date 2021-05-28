<?php

namespace Eddy\Coder;

class Templator
{
    public function format(CoderResource $resource, string $template)
    {
        $vals = [
            '%name%' => $resource->getName(),
        ];

        return strtr($template, $vals);
    }
}
