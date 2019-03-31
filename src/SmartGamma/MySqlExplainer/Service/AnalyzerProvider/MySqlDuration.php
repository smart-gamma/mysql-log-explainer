<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

use SmartGamma\MySqlExplainer\Service\Connection\ConnectionFactory;

class MySqlDuration implements AnalyzerProviderInterface
{
    //const MAX_LIMIT = 0.0000001;
    const MAX_LIMIT = 1;

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
        $analyzeResultDTO = new  AnalyzeResultDTO();

        $this->connection->query('set profiling=1');
        $this->connection->query('set profiling_history_size = 1');
        $this->connection->query($query);
        $res = $this->connection->query('show profiles');
        $this->connection->query('set profiling_history_size = 0');
        $records  = $res->fetchAll(\PDO::FETCH_ASSOC);
        $duration = $records[0]['Duration'];

        if ($duration > self::MAX_LIMIT) {
            $duration                       = '<error>' . $duration . '</error>';
            $analyzeResultDTO->problemFound = true;
        }

        $analyzeResultDTO->data = [['Duration' => $duration]];

        return $analyzeResultDTO;
    }
}
