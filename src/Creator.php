<?php

namespace Eddy\Coder;

use Symfony\Component\Filesystem\Filesystem;

class Creator
{
    public function __construct(private Filesystem $fs)
    {
        // TODO: write logic here
    }

    public function create(CoderResource $resource, string $pathToSrc)
    {
        $dirs = str_replace('\\', '/', $resource->getNamespace());
        $fullPath = $pathToSrc . $dirs . $resource->getFilename(); 
        if ($this->fs->exists($fullPath)) {
            dump('file exists');
            return 0;
        }
        return 1;
    }
}
