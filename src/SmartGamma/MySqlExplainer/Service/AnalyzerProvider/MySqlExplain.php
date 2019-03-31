<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

use SmartGamma\MySqlExplainer\Service\Connection\ConnectionFactory;

class MySqlExplain implements AnalyzerProviderInterface
{
    const PROBLEM_KEYWORDS_PATTERN = '/(Using filesort|Using temporary)/';

    /**
     * @var ConnectionFactory
     */
    protected $connectionFactory;

    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(ConnectionFactory $factory)
    {
        $this->connection = $factory->getConnection();
    }

    public function execute(string $query): AnalyzeResultDTO
    {
        $analyzeResultDTO = new AnalyzeResultDTO();

        $res     = $this->connection->query('EXPLAIN ' . $query);
        $analyzeResultDTO->data = $res->fetchAll(\PDO::FETCH_ASSOC);

        foreach($analyzeResultDTO->data as &$line) {
            $analyzeResultDTO->problemFound = preg_match(self::PROBLEM_KEYWORDS_PATTERN, $line['Extra']) ? true : $analyzeResultDTO->problemFound;
            $line['Extra'] = preg_replace(self::PROBLEM_KEYWORDS_PATTERN, '<error>$1</error>', $line['Extra']);
        }

        return $analyzeResultDTO;
    }
}
