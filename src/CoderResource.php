<?php
namespace Eddy\Coder;

interface CoderResource
{
    public function getFilename(): string;

    public function getName(): string;

    public function getNamespace(): string;

    public function getExtension(): string;
}
