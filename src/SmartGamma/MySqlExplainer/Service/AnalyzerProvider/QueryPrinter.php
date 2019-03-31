<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class QueryPrinter implements AnalyzerProviderInterface
{
    public function execute(string $query): AnalyzeResultDTO
    {
        $analyzeResultDTO               = new  AnalyzeResultDTO();
        $analyzeResultDTO->outputFormat = AnalyzeResultDTO::OUTPUT_FORMAT_SIMPLE;
        $analyzeResultDTO->data         = ['<info>' . $query . '</info>'];

        return $analyzeResultDTO;
    }

}
