<?php

namespace Medianet\APIToolKit\Generator\ConsoleTable;

use Medianet\APIToolKit\Generator\ApiGenerationCommandInputs;
use Medianet\APIToolKit\Generator\Configs\PathConfigHandler;
use Medianet\APIToolKit\Generator\Contracts\ConsoleTableInterface;
use Medianet\APIToolKit\Generator\TableDate;

class GeneratedFilesConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = $this->generateTableData($apiGenerationCommandInputs);

        $headers = ['Type', 'File Path'];

        return new TableDate($headers, $tableData);
    }

    private function generateTableData(ApiGenerationCommandInputs $apiGenerationCommandInputs): array
    {
        $configForPathGroup = PathConfigHandler::getFileInfoForAllTypes(
            pathGroupName: $apiGenerationCommandInputs->getPathGroup(),
            modelName: $apiGenerationCommandInputs->getModel()
        );

        $tableData = [];

        foreach ($configForPathGroup as $type => $generatedFileInfo) {
            if ($apiGenerationCommandInputs->isOptionSelected($type)) {
                $tableData[] = [
                    $type,
                    $generatedFileInfo->getFullPath(),
                ];
            }
        }

        return $tableData;
    }
}
