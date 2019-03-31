<?php

namespace spec\SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\MySqlDuration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\Connection\ConnectionFactory;

class MySqlDurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MySqlDuration::class);
    }

    function it_implemets()
    {
        $this->shouldImplement(AnalyzerProviderInterface::class);
    }

    function let(ConnectionFactory $connectionFactory)
    {
        $this->beConstructedWith($connectionFactory);
    }
}
