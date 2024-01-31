<?php

namespace Medianet\APIToolKit\Filters\Contracts;

use Closure;
use Medianet\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;

interface QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO;
}
