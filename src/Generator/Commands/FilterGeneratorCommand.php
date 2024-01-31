<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;

class FilterGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::FILTER;

    protected function getStubName(): string
    {
        return 'DummyFilters';
    }
}
