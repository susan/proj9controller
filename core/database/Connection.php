<?php

class Connection
{
    public static function connecttoDB($config)
    {
        try {
            return new PDO(
                //'mysql:host=localhost;dbname=mytodo', 'root', ''
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']

            );
            //echo "connection ok";
            //return $pdo;
        } catch (PDOException $e) {
            die('could not connect' . $e->getMessage());
        }
    }
}
