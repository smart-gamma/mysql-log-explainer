<?php

namespace spec\SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\QueryPrinter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QueryPrinterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(QueryPrinter::class);
    }

    function it_implemets()
    {
        $this->shouldImplement(AnalyzerProviderInterface::class);
    }
}
