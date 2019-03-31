<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\Explainer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\QueryParser;

class ExplainerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Explainer::class);
    }

    function let(QueryParser $queryParser)
    {
        $this->beConstructedWith($queryParser);
    }

    function it_anaylze_input_queries()
    {
        $this->analyze();
    }
}
