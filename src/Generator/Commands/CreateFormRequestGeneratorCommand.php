<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\CreateValidationRulesParser;

class CreateFormRequestGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::CREATE_REQUEST;

    public function getContent(): array
    {
        return [
            '{{createValidationRules}}' => (new CreateValidationRulesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'CreateDummyRequest';
    }
}
