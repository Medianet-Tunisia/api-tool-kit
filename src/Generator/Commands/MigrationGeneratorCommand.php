<?php

namespace Medianet\APIToolKit\Generator\Commands;

use Medianet\APIToolKit\Enum\GeneratorFilesType;
use Medianet\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Medianet\APIToolKit\Generator\SchemaParsers\MigrationContentParser;

class MigrationGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MIGRATION;

    public function getContent(): array
    {
        return [
            '{{migrationContent}}' => (new MigrationContentParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyMigration';
    }
}
