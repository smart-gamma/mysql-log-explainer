<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlDuration implements AnalyzerProviderInterface
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
        $this->connection->query('set profiling=1');
        $this->connection->query($query);
        $res = $this->connection->query('show profiles');
        $records = $res->fetchAll(\PDO::FETCH_ASSOC);
        $duration = $records[0]['Duration'];

        return $duration;
    }
}
