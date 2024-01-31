<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\UpdateValidationRulesParser;

class UpdateFormRequestGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::UPDATE_REQUEST;

    public function getContent(): array
    {
        return [
            '{{updateValidationRules}}' => (new UpdateValidationRulesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'UpdateDummyRequest';
    }
}
