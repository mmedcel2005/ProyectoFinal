<?php
namespace model;
use \PDO;
use \PDOException;


class Utils {

   
    /**
     * Funcion que se conecta a la BD y nos devuelve una conexion PDO activa
     */
    public static function conectar()
    {
        try {
            require_once("../global.php");
            $conPDO = new PDO("mysql:host=".$DB_SERVER.";dbname=".$DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;
        } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }
    

    //Funcion que limpia los datos introducidos
    public static function limpiarDatos($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;

    }

    //Funcion que genera una salt aleatoria
    public static function generarSalt($tam, $numerico){

        if($numerico==true){
            $letras="1234567890";

        }
        else{
            $letras="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890*-.,#";
        }

        $salt="";

        //Vamos añadiendo caracteres aleatorio a $salt
        for($i=0;$i<strlen($letras);$i++){
            $salt.=$letras[rand(0,strlen($letras)-1)];
        }

        return $salt;
    }



}