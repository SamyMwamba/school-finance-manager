<?php

/**
 * Created by PhpStorm.
 * User: samy
 * Date: 4/11/17
 * Time: 4:56 AM
 */
class Configuration
{

    public static function getConnexion()
    {

        try {
            $pdo = new PDO('mysql:host=db677876095.db.1and1.com;dbname=db677876095', 'dbo677876095', 'dev2017');
            return $pdo;
        }catch (Exception $e)
        {
            die($e->getMessage());

        }



    }

}