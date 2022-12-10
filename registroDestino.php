<?php
	require("fnc/funcionesUsuario.php");

	$user = $_POST["txtUsuario"];
	$pass = $_POST["txtClave"];
	$name = $_POST["txtNombre"];
	$cod = $_POST["txtCodigo"];

	$error = 'codigo incorrecto';

	$clave = 3813595380;

	$jodete= 'jodete';

	$errores = array();


	if ( empty($user))
	{
		$errores[] = "Usuario no esta definido";
		$errores[] = ", ";
	}
	

	if ( empty($pass))
	{
		$errores[] = "Clave no esta definida";
		$errores[] = ", ";	
	}
	

	if (empty($cod)) {
		$errores[] = "Codigo no ingresado";		
		$errores[] = ", ";
	}
	
	if ($cod != $clave) {
		$errores[] = "Codigo incorrecto";	
		$errores[] = ", ";	
	}
	


	if ( !empty($errores) )
	{
		$s  = "";
	
		$s .= "<h4>Errores</h4>";
	
		foreach ($errores as $error)
		{
			echo $error;
		}
	}


	if ( empty($errores) ) 
	{
		if ( Registro($user,sha1($pass),$name ) ) 
		{
			$destino = "registroRealizado.html";
			header("location: $destino");	
		}
		else
		{
			echo "algo salio mal";
		}
		
	}


	



	
		


	



	
	
	
?>