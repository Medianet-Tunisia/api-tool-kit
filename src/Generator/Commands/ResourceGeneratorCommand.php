<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\ResourceAttributesParser;

class ResourceGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::RESOURCE;

    public function getContent(): array
    {
        return [
            '{{resourceContent}}' => (new ResourceAttributesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyResource';
    }
}
