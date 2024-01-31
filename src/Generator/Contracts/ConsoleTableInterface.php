<?php

namespace Medianet\APIToolKit\Generator\Contracts;

use Medianet\APIToolKit\Generator\ApiGenerationCommandInputs;
use Medianet\APIToolKit\Generator\TableDate;

interface ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate;
}
