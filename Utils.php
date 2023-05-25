<?php
use \PDO;
use \PDOException;


class Utils {

public static function conectar()
    {
        try {
            require_once("global.php");
            $conPDO = new PDO("mysql:host=".$DB_SERVER.";dbname=".$DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;
        } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }
}