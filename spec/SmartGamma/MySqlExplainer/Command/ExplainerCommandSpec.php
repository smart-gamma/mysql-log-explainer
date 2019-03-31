<?php

namespace spec\SmartGamma\MySqlExplainer\Command;

use SmartGamma\MySqlExplainer\Command\ExplainerCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzeResultDTO;
use SmartGamma\MySqlExplainer\Service\Explainer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExplainerCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ExplainerCommand::class);
    }

    function let(Explainer $explainer)
    {
        $explainer->explainProblematic()->willReturn([['provider' => new AnalyzeResultDTO()]]);
        $this->beConstructedWith($explainer);
    }

    function it_executes(InputInterface $input, OutputInterface $output)
    {
        $this->run($input, $output);
    }
}
