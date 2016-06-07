<?php
	require_once 'configuracion.php';

	class Conexion{
	    protected $dblink;

	    public function __construct() {
	      $this->abrirConexion();
	    }

	    public function __destruct() {
	      $this->dblink = NULL;      
	    }

	    protected function abrirConexion(){
	      /*
	      Conexion a PostgreSql
	      $servidor = "pgsql:host=".SERVIDOR_BD.";port=".PUERTO_BD.";dbname=".NOMBRE_BD;
          $usuario = USUARIO_BD;
          $clave = CLAVE_BD;  
	      */
	      $servidor = "mysql:host=".SERVIDOR_BD.";port=".PUERTO_BD.";dbname=".NOMBRE_BD;
	      $usuario = USUARIO_BD;
	      $clave = CLAVE_BD;
	      
	      try {
	        $this->dblink = new PDO($servidor, $usuario, $clave);
	        $this->dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      } catch (Exception $exc) {
	        echo $exc->getMessage();
	      }
	      return $this->dblink;
	    }

	    protected function num_rows($consulta){
	      return $consulta->rowCount();
	    }
  }
?>