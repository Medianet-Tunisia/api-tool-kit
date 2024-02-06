<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;

class PolicyGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::POLICY;

    protected function getStubName(): string
    {
        return 'DummyPolicy';
    }
}
