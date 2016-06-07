<?php
	require_once('../datos/conexion.php');
	class Usuario extends Conexion{
		//pueden trabajarlo con variables públicas o privadas, lo trabajaré esta vez con públicas
		public $nombres;
		public $email;
		public $clave;
		public function registrarUsuario(){
			$this->dblink->beginTransaction();
			try {
				$sql = "insert into usuario (nombres,email,clave) 
						values(:nombres, :email, md5(:clave))";
				$sentencia = $this->dblink->prepare($sql);
				$sentencia->bindParam(":nombres",$this->nombres,PDO::PARAM_STR);
				$sentencia->bindParam(":email",$this->email,PDO::PARAM_STR);
				$sentencia->bindParam(":clave",$this->clave,PDO::PARAM_STR);
				$sentencia->execute();
				$this->dblink->commit();

				return "exito";
			} catch (Exception $e) {
				$this->dblink->rollBack();
				throw $e;
			}
		}
	}
?>