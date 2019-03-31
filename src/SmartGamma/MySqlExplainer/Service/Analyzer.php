<?php

namespace SmartGamma\MySqlExplainer\Service;

use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;

class Analyzer
{
    /**
     * @var AnalyzerProviderInterface[]
     */
    private $providers = [];

    public function registerProvider(AnalyzerProviderInterface $provider)
    {
        $this->providers[] = $provider;
    }

    public function scannQueries(array $queries): array
    {
        $result = [];

        foreach($queries as $query) {
            $result[] = '<info>'.$query . '</>';
            foreach ($this->providers as $provider) {
              $result[] = $provider->execute($query);
            }
        }

        return $result;
    }
}
