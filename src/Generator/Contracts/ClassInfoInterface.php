<?php

namespace Medianet\APIToolKit\Generator\Contracts;

interface ClassInfoInterface
{
    public function getNameSpace(): string;

    public function getClassName(): string;
}
