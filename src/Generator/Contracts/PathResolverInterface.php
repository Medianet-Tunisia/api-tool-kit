<?php

namespace Medianet\APIToolKit\Generator\Contracts;

interface PathResolverInterface
{
    public function folderPath(): string;

    public function fileName(): string;

    public function getFullPath(): string;
}
