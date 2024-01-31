<?php

namespace Medianet\APIToolKit\Generator\SchemaParsers;

use Medianet\APIToolKit\Generator\ColumnDefinition;
use Medianet\APIToolKit\Generator\Guessers\ValidationRuleGuesserInterface;
use Medianet\APIToolKit\Generator\SchemaDefinition;

class UpdateValidationRulesParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(function (ColumnDefinition $definition): string {
                $guesser = new ValidationRuleGuesserInterface($definition, ['sometimes']);

                return "'{$definition->getName()}' => [{$guesser->guess()}],";
            })
            ->implode(PHP_EOL . "\t\t\t");
    }
}
