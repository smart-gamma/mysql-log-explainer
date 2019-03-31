<?php

namespace SmartGamma\MySqlExplainer\Command;

use SmartGamma\MySqlExplainer\Service\Explainer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExplainerCommand extends Command
{
    /**
     * @var Explainer
     */
    private $explainer;

    protected static $defaultName = 'explainer:doctrine-log:analyze';

    public function __construct(Explainer $explainer)
    {
        $this->explainer = $explainer;
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this->setDescription('Allows scanning doctrine log file and pick problematic queries from explain loop execution output');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write($this->explainer->analyze());
    }
}