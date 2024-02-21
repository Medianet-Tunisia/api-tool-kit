<?php

namespace Medianet\APIToolKit\Generator\Helpers;

use Medianet\APIToolKit\Generator\Configs\PathConfigHandler;
use Medianet\APIToolKit\Generator\GeneratedFileInfo;
use Illuminate\Support\Str;

class StubVariablesProvider
{
    public static function generate(string $modelName, string $pathGroup): array
    {
        $configForPathGroup = PathConfigHandler::getFileInfoForAllTypes(
            pathGroupName: $pathGroup,
            modelName: $modelName
        );

        $replacements = [];

        foreach ($configForPathGroup as $type => $generatedFileInfo) {
            $replacements += self::generateReplacementsForType($type, $generatedFileInfo);
        }

        $baseUrlPrefix = self::getBaseUrlPrefix($pathGroup);

        return $replacements + self::generateBasicReplacements($modelName) + $baseUrlPrefix;
    }

    private static function generateReplacementsForType(string $type, GeneratedFileInfo $generatedFileInfo): array
    {
        if ( ! $generatedFileInfo->shouldSaveAsSeparateClass()) {
            return [];
        }

        $type = Str::studly($type);

        return [
            "{{Dummy{$type}}}" => $generatedFileInfo->getClassName(),
            "{{Dummy{$type}NameSpace}}" => $generatedFileInfo->getNameSpace(),
            "{{Dummy{$type}WithNameSpace}}" => $generatedFileInfo->getNameSpace() . '\\' . $generatedFileInfo->getClassName(),
        ];
    }

    private static function generateBasicReplacements(string $modelName): array
    {
        return [
            '{{Dummy}}' => $modelName,
            '{{Dummies}}' => Str::plural($modelName),
            '{{dummy}}' => lcfirst($modelName),
            '{{dummies}}' => Str::plural(Str::snake($modelName)),
            '{{dummyPolicy}}' => Str::plural(Str::snake($modelName, '_')),
            '{{dummiesRoute}}' => Str::plural(Str::snake($modelName, '-')),
        ];
    }

    private static function getBaseUrlPrefix(string $pathGroupName): array
    {
        return [
            '{{baseUrlPrefix}}' => PathConfigHandler::getBaseUrlPrefixForGroup($pathGroupName),
        ];
    }
}
