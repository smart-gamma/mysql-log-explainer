<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlExplain implements AnalyzerProviderInterface
{
    public function execute(string $query): string
    {
        return 'explain result';
    }
}
