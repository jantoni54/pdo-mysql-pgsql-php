<?php
	try {
		$nombres = $_POST["nombres"];
		$email = $_POST["email"];
		$clave = $_POST["clave"];
		if (isset($nombres) && isset($email) && isset($clave)) {
			require_once('../negocio/usuario.clase.php');
			$U = new Usuario();
			$U->nombres = $nombres;
			$U->email = $email;
			$U->clave = $clave;

			$resultado = $U->registrarUsuario();

			echo $resultado;
		}
		else
			echo 'Faltan datos para el usuario';
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>