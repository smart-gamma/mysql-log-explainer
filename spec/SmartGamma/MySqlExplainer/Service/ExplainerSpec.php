<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\Analyzer;
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

    function let(QueryParser $queryParser, Analyzer $analyzer)
    {
        $queryParser->parseQueries()->willReturn(['fake queries input']);
        $analyzer->scannQueries(Argument::any())->willReturn(['fake query scanned']);

        $this->beConstructedWith($queryParser, $analyzer);
    }

    function it_explain_problematic_queries()
    {
        $this->explainProblematic()->shouldBeArray();
        $this->explainProblematic()->shouldHaveCount(1);
    }
}
