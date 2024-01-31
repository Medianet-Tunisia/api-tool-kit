<?php

namespace Medianet\APIToolKit\Generator\ConsoleTable;

use Medianet\APIToolKit\Generator\ApiGenerationCommandInputs;
use Medianet\APIToolKit\Generator\Contracts\ConsoleTableInterface;
use Medianet\APIToolKit\Generator\TableDate;

class SchemaConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = [];

        foreach ($apiGenerationCommandInputs->getSchema()->getColumns() as $column) {
            $tableData[] = [$column->getName(), $column->getType(), $column->getOptionsAsString()];
        }

        $headers = ['Column Name', 'Column Type', 'Options'];

        return new TableDate($headers, $tableData);
    }
}
