<?php

namespace SmartGamma\MySqlExplainer\Service;

class Explainer
{
    /**
     * @var QueryParser
     */
    private $queryParser;

    /**
     * @var Analyzer
     */
    private $analyzer;

    public function __construct(QueryParser $queryParser, Analyzer $analyzer)
    {
        $this->queryParser = $queryParser;
        $this->analyzer    = $analyzer;
    }

    public function explainProblematic(): array
    {
        $queries = $this->queryParser->parseQueries();
        $results = $this->analyzer->scannQueries($queries);

        return $results;
    }
}
