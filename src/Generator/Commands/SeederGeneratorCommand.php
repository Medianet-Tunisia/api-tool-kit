<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;

class SeederGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::SEEDER;

    protected function getStubName(): string
    {
        return 'DummySeeder';
    }
}
