<?php

namespace SmartGamma\MySqlExplainer\Service\Connection;

class ConnectionFactory
{
    /**
     * @var \PDO
     */
    protected static $connection;

    /**
     * @var string
     */
    private $dbHost;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $dbUser;

    /**
     * @var string
     */
    private $dbPassword;

    public function __construct(string $dbHost, string $dbName, string $dbUser, string $dbPassword)
    {
        $this->dbHost     = $dbHost;
        $this->dbUser     = $dbUser;
        $this->dbName     = $dbName;
        $this->dbPassword = $dbPassword;
    }

    public function getConnection()
    {
        if (!self::$connection) {
            self::$connection = new \PDO(
                sprintf('mysql:host=%s;dbname=%s', $this->dbHost, $this->dbName),
                $this->dbUser,
                $this->dbPassword
            );
        }

        return self::$connection;
    }

}