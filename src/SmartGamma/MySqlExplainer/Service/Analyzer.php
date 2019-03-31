<?php

namespace SmartGamma\MySqlExplainer\Service;

use dekor\ArrayToTextTable;
use SmartGamma\MySqlExplainer\Service\AnalyzerProvider\AnalyzerProviderInterface;

class Analyzer
{
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
        $result = [];
        $resultsToShow = [];

        foreach ($queries as $query) {
           // $result['query'] = $i++ . '. <info>' . $query . '</>';
            $problematicQuery = false;
            foreach ($this->providers as $provider) {
                $dto = $provider->execute($query);
                $result[get_class($provider)] = $provider->execute($query);
                $problematicQuery = $dto->problemFound ?  $dto->problemFound : $problematicQuery;
            }

            if($problematicQuery) {
                $resultsToShow[] = $result;
            }
        }

        return $resultsToShow;
    }
}
