<?php

namespace spec\SmartGamma\MySqlExplainer\Service\Connection;

use SmartGamma\MySqlExplainer\Service\Connection\ConnectionFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConnectionFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ConnectionFactory::class);
    }

    function let()
    {
        $this->beConstructedWith('host', 'db', 'user', 'password');
    }
}
