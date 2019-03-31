<?php

namespace SmartGamma\MySqlExplainer\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExplainerCommand extends Command implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    protected static $defaultName = 'explainer:doctrine-log:analyze';

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this
            ->setDescription('Allows scanning doctrine log file and pick problematic queries from explain loop execution output');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "xxx";
    }
}