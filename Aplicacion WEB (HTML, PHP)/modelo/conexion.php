<?php
include_once("variables_conexion.php");

class Conexion{
     private $srv  = SRV;
     private $dbn  = DBN;
     private $port = PORT;
     private $usr  = USR;
     private $pas  = PAS;

     private $conn;

     public function __construct(){
         try{
          $dns="pgsql:host=".$this->srv.";port=".$this->port.";dbname=".$this->dbn;
          $this->conn=new PDO($dns,$this->usr,$this->pas); 
          $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
          
        }catch(PDOException $e){
            echo "error: ".$e->getMessage();
         }//catch
     }//constructor

     public function getConn(){
         return $this->conn;
     }

}//clase






