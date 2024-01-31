<?php

namespace Medianet\APIToolKit\Filters\Handlers;

use Closure;
use Medianet\APIToolKit\Filters\Contracts\QueryFiltersHandlerInterface;
use Medianet\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;

class IncludesHandler implements QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO
    {
        $includes = array_intersect(
            $queryFiltersOptionsDTO->getFiltersDTO()->getIncludes(),
            $queryFiltersOptionsDTO->getAllowedIncludes()
        );

        $queryFiltersOptionsDTO->getBuilder()->with($includes);

        return $next($queryFiltersOptionsDTO);
    }
}
