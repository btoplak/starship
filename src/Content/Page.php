<?php

namespace Starship\Content;

use Parsedown;

use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Parser;

class Page extends Content
{
    public function __construct(SplFileInfo $file)
    {
        parent::__construct($file);

        $this->target = $this->getTarget($file);
    }

    /** Determine the target file. */
    protected function getTarget(SplFileInfo $file)
    {
        $sourceExt = $file->getExtension();
        $sourcePath = $file->getRelativePathName();

        // Determine target extension based on template
        if (!empty($this->template) && $this->template != 'none') {
            $targetExt = pathinfo($this->template, PATHINFO_EXTENSION);
        } else {
            $targetExt = $sourceExt;
        }

        // Replace source extension with that of the template
        $target = substr($sourcePath, 0, -strlen($sourceExt));
        $target .= $targetExt;

        return $target;
    }
}
