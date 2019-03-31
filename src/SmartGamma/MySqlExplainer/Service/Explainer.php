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
        $this->analyzer = $analyzer;
    }

    public function explainProblematic()
    {
        $queries = $this->queryParser->parseQueries();

        return 'test';
    }
}
