<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlExplain implements AnalyzerProviderInterface
{
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

    public function execute(string $query): string
    {
        $res = $this->connection->query('EXPLAIN '.$query);
        $records = $res->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($records);

        return $records;
    }
}
