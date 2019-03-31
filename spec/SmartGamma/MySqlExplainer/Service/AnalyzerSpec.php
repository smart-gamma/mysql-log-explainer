<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\Analyzer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\MySqlDuration;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\MySqlExplain;

class AnalyzerSpec extends ObjectBehavior
{
    const TEST_QUERY = 'SELECT * from table;';

    function it_is_initializable()
    {
        $this->shouldHaveType(Analyzer::class);
    }

    function let(MySqlDuration $mySqlDuration, MySqlExplain $mySqlExplain)
    {
        $mySqlDuration->execute(self::TEST_QUERY)->willReturn('500');
        $mySqlExplain->execute(self::TEST_QUERY)->willReturn('explain result');
        $this->registerProvider($mySqlDuration);
        $this->registerProvider($mySqlExplain);
    }

    function it_scann_queries_throu_registered_analise_providers()
    {
        $queries = [self::TEST_QUERY];

        $this->scannQueries($queries)->shouldBeArray();
        // 1 - original query
        // 2 - duration result provider
        // 3 - explain result
        $this->scannQueries($queries)->shouldHaveCount(3);
    }
}
