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
        $conPDO=null;
        try {
            require_once("../global.php");
            $conPDO = new PDO("mysql:host=".$DB_SERVER.";dbname=".$DB_SCHEMA, $DB_USER, $DB_PASSWD);
            return $conPDO;

         } catch (PDOException $e) {
            print "¡Error al conectar!: " . $e->getMessage() . "<br/>";
            return $conPDO;
            die();
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


    //Funcion que genera un codigo de activacion numerico de 6 caracteres aleatorio
    public static function genCodActiv(){
        return rand(111111,999999);
    }


    //Funcion que envia el codigo de activacion del usuario por correo 
    public static function emailRegistro($usuario){

        $to = $usuario["email"] ;
        $subject = "Confirmacion de cuenta";
        
        $message = "<b>Hola". $usuario["nombre"] ."Bienvenido al gimnasio </b>";
        $message .= "<h1>Confirma tu cuenta de email.</h1>";
        $message .= "<p>Codigo de activacion: <b>". $usuario["codActivacion"] ."  </b></p>";
        

        
        $header = "From:abc@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        }else {
           echo "Message could not be sent...";
        }

    }


}