<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\LogReader;
use SmartGamma\MySqlExplainer\Service\QueryParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QueryParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(QueryParser::class);
    }

    function let(LogReader $logReader)
    {
        $logReader->readFile()->willReturn(['line 1', 'line 2']);
        $this->beConstructedWith($logReader);
    }

    function it_returns_parsed_queries()
    {
        $this->parseQueries()->shouldBeArray();
    }
}
