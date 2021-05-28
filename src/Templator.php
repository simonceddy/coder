<?php

namespace Eddy\Coder;

class Templator
{
    private function formatNamespace(string $namespace)
    {
        // Trim trailing backslashes if present
        if (($last = strrpos($namespace, '\\')) === strlen($namespace) - 1) {
            $namespace = substr($namespace, 0, $last);
        }
        return $namespace;
    }

    public function format(CoderResource $resource, string $template)
    {
        $vals = [
            '%name%' => $resource->getName(),
            '%namespace%' => $this->formatNamespace($resource->getNamespace())
        ];

        return strtr($template, $vals);
    }
}
