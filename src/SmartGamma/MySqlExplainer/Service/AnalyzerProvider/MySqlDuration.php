<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlDuration implements AnalyzerProviderInterface
{
    public function execute(string $query): string
    {
        return 'duration result';
    }
}
