<?php

use Eddy\Coder\Creator;
use Eddy\Coder\PhpResource;
use Eddy\Coder\TemplateManager;
use Eddy\Coder\Templator;
use Symfony\Component\Filesystem\Filesystem;

require 'vendor/autoload.php';
$fs = new Filesystem();
$creator = new Creator(
    $fs,
    new TemplateManager($fs, [
        __DIR__ . '/tests'
    ]),
    new Templator()
);

$pathToStorage = 'tests/storage';

if ($fs->exists($pathToStorage)) {
    $fs->remove($pathToStorage);
}

$beef = new PhpResource('BigBeef', 'Roast\\Beef\\', $pathToStorage);

$creator->create($beef, 'class');
