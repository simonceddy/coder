<?php

namespace Eddy\Coder;

use Symfony\Component\Filesystem\Filesystem;

class TemplateManager
{
    public function __construct(private Filesystem $fs)
    {}

    public function get(string $template)
    {
        $path = __DIR__ . '/templates/' . $template . '.template';
        // dump($this->fs);
        if (!$this->fs->exists($path)) {
            throw new \InvalidArgumentException(
                'Unknown template: ' . $template
            );
        }
        return file_get_contents($path);
    }
}
