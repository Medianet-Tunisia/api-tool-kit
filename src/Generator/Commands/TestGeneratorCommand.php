<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;

class TestGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::TEST;

    protected function getStubName(): string
    {
        return 'DummyTest';
    }
}
