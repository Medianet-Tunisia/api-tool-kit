<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\FillableColumnsParser;
use Medianet\APIToolKit\Generator\SchemaParsers\RelationshipMethodsParser;

class ModelGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MODEL;

    public function getContent(): array
    {
        return [
            '{{fillableColumns}}' =>  (new FillableColumnsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
            '{{modelRelations}}' => (new RelationshipMethodsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyModel';
    }
}
