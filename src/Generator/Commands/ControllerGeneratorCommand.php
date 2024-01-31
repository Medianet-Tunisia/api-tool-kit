<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;

class ControllerGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::CONTROLLER;

    protected function getStubName(): string
    {
        return 'DummyController';
    }
}
