<?php
namespace Eddy\Coder;

class PhpResource implements CoderResource
{
    private string $filename;

    public function __construct(
        private string $name,
        private string $namespace
    ) {
        $this->filename = $name . '.php';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getExtension(): string
    {
        return 'php';
    }
}
