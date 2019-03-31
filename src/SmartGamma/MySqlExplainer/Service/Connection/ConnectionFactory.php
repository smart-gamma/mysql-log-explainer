<?php

namespace SmartGamma\MySqlExplainer\Service\Connection;

class ConnectionFactory
{
    protected static $connection;

    public function getConnection() {
        if (!self::$connection) {
            self::$connection = new \PDO(
                'mysql:host=mysql;dbname=3w1AdminDB',
                'root',
                'notsecretpass'
            );
        }

        return self::$connection;
    }

}