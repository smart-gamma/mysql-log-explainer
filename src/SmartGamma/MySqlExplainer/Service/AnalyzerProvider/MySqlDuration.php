<?php

namespace SmartGamma\MySqlExplainer\Service\AnalyzerProvider;

class MySqlDuration implements AnalyzerProviderInterface
{
    const MAX_LIMIT = 0.0000001;

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
        $analyzeResultDTO = new  AnalyzeResultDTO();

        $this->connection->query('set profiling=1');
        $this->connection->query($query);
        $res = $this->connection->query('show profiles');
        $records = $res->fetchAll(\PDO::FETCH_ASSOC);
        $duration = $records[0]['Duration'];

        if($duration > self::MAX_LIMIT) {
            $duration = '<error>' . $duration .'</error>';
            $analyzeResultDTO->problemFound = true;
        }

        $analyzeResultDTO->data = [['Duration' => $duration]];

        return $analyzeResultDTO;
    }
}
