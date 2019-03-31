<?php

namespace spec\SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\MySqlExplain;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\Connection\ConnectionFactory;

class MySqlExplainSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MySqlExplain::class);
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
