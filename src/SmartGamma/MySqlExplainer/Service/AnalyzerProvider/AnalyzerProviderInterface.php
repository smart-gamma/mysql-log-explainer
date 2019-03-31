<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

interface AnalyzerProviderInterface
{
    public function execute(string $queriy): AnalyzeResultDTO;
}