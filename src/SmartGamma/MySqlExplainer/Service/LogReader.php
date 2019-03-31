<?php

namespace SmartGamma\MySqlExplainer\Service;

class LogReader
{
    /**
     * @var string
     */
    private $logPath;

    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    /**
     * @return array|bool
     */
    public function readFile()
    {
        return file($this->logPath);
    }
}
