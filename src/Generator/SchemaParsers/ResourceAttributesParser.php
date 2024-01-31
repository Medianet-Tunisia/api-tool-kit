<?php

namespace Medianet\APIToolKit\Generator\SchemaParsers;

use Medianet\APIToolKit\Generator\ColumnDefinition;
use Medianet\APIToolKit\Generator\SchemaDefinition;

class ResourceAttributesParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(fn (ColumnDefinition $definition): string => "'{$definition->getName()}' => {$this->value($definition)},")
            ->implode(PHP_EOL . "\t\t\t");
    }

    private function value(ColumnDefinition $definition): string
    {
        $value = "\$this->{$definition->getName()}";

        if ($definition->isDateType()) {
            return "dateTimeFormat({$value})";
        }

        return $value;
    }
}
