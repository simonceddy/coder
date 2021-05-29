<?php

namespace Eddy\Coder;

use Symfony\Component\Filesystem\Filesystem;

class Creator
{
    public function __construct(
        private Filesystem $fs,
        private TemplateManager $templates,
        private Templator $templator
    ) {
        // TODO: write logic here
    }

    private function getPath(CoderResource $resource)
    {
        $parts = array_map(
            function ($part) {
                if (strrpos($part, DIRECTORY_SEPARATOR) === strlen($part) - 1) {
                    $part .= DIRECTORY_SEPARATOR;
                }
                return $part;
            },
            [
                $resource->getSrcDir(),
                str_replace('\\', '/', $resource->getNamespace())
            ]
        );

        return $parts[0] . $parts[1] . $resource->getFilename();
    }

    public function create(
        CoderResource $resource,
        string $templateName = 'class'
    ) {
        $fullPath = $this->getPath($resource);
        
        if ($this->fs->exists($fullPath)) {
            dump('file exists');
            return 0;
        }

        $contents = $this->templator->format(
            $resource,
            $this->templates->get($templateName)
        );

        $this->fs->dumpFile($fullPath, $contents);

        return 1;
    }
}
