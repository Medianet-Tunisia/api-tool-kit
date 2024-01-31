<?php

namespace Medianet\APIToolKit\Generator\Contracts;

use Medianet\APIToolKit\Generator\ApiGenerationCommandInputs;

interface GeneratorCommandInterface
{
    public function run(ApiGenerationCommandInputs $apiGenerationCommandInputs): void;
}
