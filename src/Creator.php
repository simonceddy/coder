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

    public function create(
        CoderResource $resource,
        string $templateName = 'class'
    ) {
        $dirs = str_replace('\\', '/', $resource->getNamespace());
        $fullPath = $resource->getSrcDir() . $dirs . $resource->getFilename();
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
