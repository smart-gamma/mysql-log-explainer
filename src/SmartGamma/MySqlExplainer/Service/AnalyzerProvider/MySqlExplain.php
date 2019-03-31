<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlExplain implements AnalyzerProviderInterface
{
    const PROBLEM_KEYWORDS_PATTERN = '/(Using filesort|Using temporary)/';

    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO(
            'mysql:host=mysql;dbname=3w1AdminDB',
            'root',
            'notsecretpass'
        );
    }

    public function execute(string $query): AnalyzeResultDTO
    {
        $analyzeResultDTO = new AnalyzeResultDTO();

        $res     = $this->connection->query('EXPLAIN ' . $query);
        $analyzeResultDTO->data = $res->fetchAll(\PDO::FETCH_ASSOC);

        foreach($analyzeResultDTO->data as &$line) {
            $analyzeResultDTO->problemFound ?? preg_match(self::PROBLEM_KEYWORDS_PATTERN, $line['Extra']);
            $line['Extra'] = preg_replace(self::PROBLEM_KEYWORDS_PATTERN, '<error>$1</error>', $line['Extra']);
        }

        return $analyzeResultDTO;
    }
}
