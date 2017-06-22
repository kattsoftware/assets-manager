<?php

namespace Phassets\Filters;

use Phassets\Asset;
use Phassets\Interfaces\Configurator;
use Phassets\Interfaces\Filter;
use Sabberworm\CSS\Parser;
use Sabberworm\CSS\OutputFormat;

class CssCompactFilter implements Filter
{
    /**
     * Filter constructor.
     *
     * @param Configurator $configurator Chosen and loaded Phassets configurator.
     */
    public function __construct(Configurator $configurator)
    {
    }

    /**
     * Process the Asset received and using Asset::setContents(), update
     * the contents accordingly. If succeeded, return true; false otherwise.
     *
     * @param Asset $asset
     * @return bool Whether the filtering succeeded or not
     */
    public function filter(Asset $asset)
    {
        $cssParser = new Parser($asset->getContents());

        $result = $cssParser->parse()->render(OutputFormat::createCompact());

        $asset->setContents($result);

        return true;
    }
}