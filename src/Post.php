<?php

namespace Starship;

use Symfony\Component\Finder\SplFileInfo;

class Page extends Content
{
    public function __construct(SplFileInfo $file)
    {
        parent::__construct($file);
    }
}
