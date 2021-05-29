<?php

namespace Eddy\Coder;

use Symfony\Component\Filesystem\Filesystem;

class TemplateManager
{
    private array $locations = [];

    public function __construct(
        private Filesystem $fs,
        $paths = null
    ) {
        $this->locations[] = __DIR__ . '/templates';

        if ((($s = is_string($paths)) || is_iterable($paths))
            && $this->fs->exists($paths)
        ) {
            // dump($s);
            $s ? array_push($this->locations, $paths)
                : $this->locations = array_merge($this->locations, $paths);
        }
        // dump($this);
    }

    public function get(string $template)
    {
        $paths = array_map(
            fn($dir) => $dir . DIRECTORY_SEPARATOR . $template . '.template',
            $this->locations
        );
        // dd($paths);

        $i = 0;

        while (isset($paths[$i]) && !$this->fs->exists($paths[$i])) {
            $i++;
        }

        if (!isset($paths[$i])) {
            throw new \InvalidArgumentException(
                'Unknown template: ' . $template
            );
        }
        return file_get_contents($paths[$i]);
    }
}
