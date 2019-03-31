<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\Analyzer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnalyzerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Analyzer::class);
    }

    function it_scann_queries_throu_registered_analise_providers()
    {
        $queries = ['SELECT * from table;'];
        $this->scannQueries($queries)->shouldBeArray();
    }
}
