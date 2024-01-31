<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\FactoryColumnsParser;

class FactoryGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::FACTORY;

    public function getContent(): array
    {
        return [
            '{{factoryContent}}' => (new FactoryColumnsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyFactory';
    }
}
