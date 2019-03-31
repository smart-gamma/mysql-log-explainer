<?php

namespace SmartGamma\MySqlExplainer\Service;

class QueryParser
{
    /**
     * @var LogReader
     */
    private $logReader;

    public function __construct(LogReader $logReader)
    {
        $this->logReader = $logReader;
    }

    /**
     * @return array
     */
    public function parseQueries(): array
    {
        $lines   = $this->logReader->readFile();
        $queries = [];

        foreach ($lines as $line) {
            preg_match('/doctrine.DEBUG:\sSELECT(.*?)\s\[(.*?)\]\s\[/i', $line, $m);
            if (isset($m[1]) && !preg_match('/information_schema.key_column_usage|TABLE_SCHEMA/', $line)) {
                $sql    = "SELECT" . $m[1] . "\r\n";
                $hash   = md5($sql);
                $params = explode(",", $m[2]);

                foreach ($params as $param) {
                    $param = str_replace('[', '', $param);
                    $sql   = $this->replaceFirst("?", $param, $sql);
                }
                $sql            = preg_replace('/SELECT\s(.*?)FROM/is', 'SELECT * FROM', $sql) . "\r\n";
                $queries[$hash] = $sql . ";";
            }
        }

        return $queries;
    }

    private function replaceFirst(string $from, string $to, string $subject): string
    {
        $from = '/' . preg_quote($from, '/') . '/';

        return preg_replace($from, $to, $subject, 1);
    }
}
