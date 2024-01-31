<?php

namespace Medianet\APIToolKit\Generator\Contracts;

interface HasDynamicContentInterface
{
    public function getContent(): array;
}
