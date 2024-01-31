<?php

use Medianet\APIToolKit\Enum\GeneratorFilesType;

return [
    /*
    |--------------------------------------------------------------------------
    | API Generators Commands
    |--------------------------------------------------------------------------
    |
    | Define API generator commands.
    |
    */
    'api_generator_commands' => [
        GeneratorFilesType::MODEL => Medianet\APIToolKit\Generator\Commands\ModelGeneratorCommand::class,
        GeneratorFilesType::FACTORY => Medianet\APIToolKit\Generator\Commands\FactoryGeneratorCommand::class,
        GeneratorFilesType::SEEDER => Medianet\APIToolKit\Generator\Commands\SeederGeneratorCommand::class,
        GeneratorFilesType::CONTROLLER => Medianet\APIToolKit\Generator\Commands\ControllerGeneratorCommand::class,
        GeneratorFilesType::RESOURCE => Medianet\APIToolKit\Generator\Commands\ResourceGeneratorCommand::class,
        GeneratorFilesType::TEST => Medianet\APIToolKit\Generator\Commands\TestGeneratorCommand::class,
        GeneratorFilesType::CREATE_REQUEST => Medianet\APIToolKit\Generator\Commands\CreateFormRequestGeneratorCommand::class,
        GeneratorFilesType::UPDATE_REQUEST => Medianet\APIToolKit\Generator\Commands\UpdateFormRequestGeneratorCommand::class,
        GeneratorFilesType::FILTER => Medianet\APIToolKit\Generator\Commands\FilterGeneratorCommand::class,
        GeneratorFilesType::MIGRATION => Medianet\APIToolKit\Generator\Commands\MigrationGeneratorCommand::class,
        GeneratorFilesType::ROUTES => Medianet\APIToolKit\Generator\Commands\RoutesGeneratorCommand::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | Specify the list of handler classes for processing query filters.
    | These handlers will be applied in the specified order.
    */
    'filters' => [
        'handlers' => [
            Medianet\APIToolKit\Filters\Handlers\FiltersHandler::class,
            Medianet\APIToolKit\Filters\Handlers\SortHandler::class,
            Medianet\APIToolKit\Filters\Handlers\IncludesHandler::class,
            Medianet\APIToolKit\Filters\Handlers\SearchHandler::class,
        ],
    ],
];
