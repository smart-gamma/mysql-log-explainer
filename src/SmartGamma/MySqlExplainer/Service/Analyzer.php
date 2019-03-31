<?php

namespace SmartGamma\MySqlExplainer\Service;

use dekor\ArrayToTextTable;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;

class Analyzer
{
    const SHOW_ALL = false;

    /**
     * @var AnalyzerProviderInterface[]
     */
    private $providers = [];

    public function registerProvider(AnalyzerProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    public function scannQueries(array $queries): array
    {
        foreach ($queries as $query) {
            $result[] = '<info>' . $query . '</>';

            foreach ($this->providers as $provider) {
                $analyzeResultDTO = $provider->execute($query);
                $result[] = (new ArrayToTextTable($analyzeResultDTO->data))->render();
            }
        }

        return $result;
    }
}
