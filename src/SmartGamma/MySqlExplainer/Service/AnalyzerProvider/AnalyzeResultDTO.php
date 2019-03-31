<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class AnalyzeResultDTO
{
    const OUTPUT_FORMAT_SIMPLE = 'simple';
    const OUTPUT_FORMAT_TABLE  = 'table';

    /**
     * table - make console table
     * simple - leave unformatted
     *
     * @var string
     */
    public $outputFormat = self::OUTPUT_FORMAT_TABLE;
    public $data         = [];
    public $problemFound = false;
}