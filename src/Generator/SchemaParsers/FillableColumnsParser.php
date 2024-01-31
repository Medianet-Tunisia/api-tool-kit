<?php

namespace Medianet\APIToolKit\Generator\SchemaParsers;

use Medianet\APIToolKit\Generator\ColumnDefinition;
use Medianet\APIToolKit\Generator\SchemaDefinition;

class FillableColumnsParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(fn (ColumnDefinition $definition): string => "'{$definition->getName()}',")
            ->implode(PHP_EOL . "\t\t");
    }
}
