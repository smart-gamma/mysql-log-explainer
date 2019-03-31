<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\Analyzer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzeResultDTO;
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
        $this->registerProvider($mySqlDuration);
        $this->registerProvider($mySqlExplain);
    }

    function it_finds_query_if_only_duration_problem_found(MySqlDuration $mySqlDuration, MySqlExplain $mySqlExplain)
    {
        $queries = [self::TEST_QUERY];

        $durationProblemDTO = new AnalyzeResultDTO();
        $durationProblemDTO->problemFound = true;

        $mySqlDuration->execute(self::TEST_QUERY)->willReturn($durationProblemDTO);
        $mySqlExplain->execute(self::TEST_QUERY)->willReturn(new AnalyzeResultDTO());

        $this->scannQueries($queries)->shouldBeArray();
        $this->scannQueries($queries)->shouldHaveCount(1);
    }

    function it_finds_query_if_only_explain_problem_found(MySqlDuration $mySqlDuration, MySqlExplain $mySqlExplain)
    {
        $queries = [self::TEST_QUERY];

        $explainProblemDTO = new AnalyzeResultDTO();
        $explainProblemDTO->problemFound = true;

        $mySqlDuration->execute(self::TEST_QUERY)->willReturn(new AnalyzeResultDTO());
        $mySqlExplain->execute(self::TEST_QUERY)->willReturn($explainProblemDTO);

        $this->scannQueries($queries)->shouldBeArray();
        $this->scannQueries($queries)->shouldHaveCount(1);
    }

    function it_finds_query_if_duration_and_explain_problem_found(MySqlDuration $mySqlDuration, MySqlExplain $mySqlExplain)
    {
        $queries = [self::TEST_QUERY];

        $explainProblemDTO = new AnalyzeResultDTO();
        $explainProblemDTO->problemFound = true;

        $durationProblemDTO = new AnalyzeResultDTO();
        $durationProblemDTO->problemFound = true;

        $mySqlDuration->execute(self::TEST_QUERY)->willReturn($durationProblemDTO);
        $mySqlExplain->execute(self::TEST_QUERY)->willReturn($explainProblemDTO);

        $this->scannQueries($queries)->shouldBeArray();
        $this->scannQueries($queries)->shouldHaveCount(1);
    }

    function it_skips_query_if_no_problem_found(MySqlDuration $mySqlDuration, MySqlExplain $mySqlExplain)
    {
        $queries = [self::TEST_QUERY];

        $explainProblemDTO = new AnalyzeResultDTO();
        $durationProblemDTO = new AnalyzeResultDTO();

        $mySqlDuration->execute(self::TEST_QUERY)->willReturn($durationProblemDTO);
        $mySqlExplain->execute(self::TEST_QUERY)->willReturn($explainProblemDTO);

        $this->scannQueries($queries)->shouldBeArray();
        $this->scannQueries($queries)->shouldHaveCount(0);
    }
}
