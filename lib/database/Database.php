<?php

namespace ferrite\database;


use PDO;
use PDOException;

use ferrite\config\Config;
use ferrite\config\exceptions\ConfigKeyNotFoundException;
use ferrite\database\exceptions\DatabaseConnectionException;

/**
 * FerriteDocs singleton database class
 * Currently only supports MySQL via PDO, other databases
 * may be included in the future.
 */
class Database
{
    // Stores the instance of the database connection
    private static $dbInstance;
    
    /**
     * Returns only one instance of the database connection
     * @return PDO Instance of the PDO object
     */
    public static function getInstance() {
        if (!static::$dbInstance) {
            try {
                $hostname = Config::getValue('db_hostname');
                $database = Config::getValue('db_database');
                $username = Config::getValue('db_username');
                $password = Config::getValue('db_password');
            } catch (ConfigKeyNotFoundException $e) {
                echo $e;
                exit();
            }
            
            try {
                $dsn = 'mysql:host=' . $hostname . ';dbname=' . $database;
                self::$dbInstance = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                throw new DatabaseConnectionException($e->getMessage());
            }
        }
        
        return static::$dbInstance;
    }
}
