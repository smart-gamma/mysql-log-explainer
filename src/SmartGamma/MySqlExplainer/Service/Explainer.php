<?php

namespace SmartGamma\MySqlExplainer\Service;

class Explainer
{
    /**
     * @var QueryParser
     */
    private $queryParser;

    public function __construct(QueryParser $queryParser)
    {
        $this->queryParser = $queryParser;
    }

    public function analyze()
    {
        $queries = $this->queryParser->parseQueries();

        return 'test';
    }
}
