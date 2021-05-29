<?php

namespace Eddy\Coder;

use Symfony\Component\Filesystem\Filesystem;

class Creator
{
    public function __construct(
        private TemplateManager $templates,
        private Templator $templator
    ) {
        // TODO: write logic here
    }

    private function getPath(CoderResource $resource)
    {
        $ns = explode('\\', $resource->getNamespace());

        if (count($ns) > 0) {
            array_shift($ns);
        }

        $ns = count($ns) > 0 ? implode(DIRECTORY_SEPARATOR, $ns) : '';

        $parts = array_map(
            function ($part) {
                if (($l = strlen($part)) > 0
                    && strrpos($part, DIRECTORY_SEPARATOR) !== $l - 1
                ) {
                    return $part . DIRECTORY_SEPARATOR;
                }
                return $part;
            },
            [
                $resource->getSrcDir(),
                $ns
            ]
        );

        return $parts[0] . $parts[1] . $resource->getFilename();
    }

    public function create(
        CoderResource $resource,
        string $templateName = 'class'
    ) {
        $fullPath = $this->getPath($resource);

        $contents = $this->templator->format(
            $resource,
            $this->templates->get($templateName)
        );

        // dd($contents);
        $gc = new GeneratedCode($fullPath, $contents);


        return $gc;
    }
}
