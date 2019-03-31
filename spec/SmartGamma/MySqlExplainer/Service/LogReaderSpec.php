<?php

namespace spec\SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\LogReader;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogReaderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(LogReader::class);
    }
}
