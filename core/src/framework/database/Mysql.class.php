<?php
/**
 * Created by PhpStorm.
 * User: kille
 * Date: 28/05/2018
 * Time: 17:01
 */

class Database
{

    private $instance;
    private $result = null;
    public $current_field = "";
    public $lengths = "";
    public $num_rows = "";

    public function __construct($config = array())
    {
        // Check if a connection has already been established
        if (!isset($this->instance)) {



            $host = isset($config['host'])? $config['host'] : 'localhost';
            $user = isset($config['user'])? $config['user'] : 'root';
            $password = isset($config['password'])? $config['password'] : '';
            $dbname = isset($config['dbname'])? $config['dbname'] : '';
            $port = isset($config['port'])? $config['port'] : '3306';
            $charset = isset($config['charset'])? $config['charset'] : 'UTF8';

            // Set up connection query
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port . ';charset=' .$charset;

            // Execute connection
            try {
                $this->instance = new PDO($dsn, $user, $password);
                $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {

                // Output errors on connection
                echo 'ERROR: ' . $e->getMessage();
                die();
            }
        }

        return $this->instance;
    }

}