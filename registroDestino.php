<?php
	require("fnc/funcionesUsuario.php");

	$user = $_POST["txtUsuario"];
	$pass = $_POST["txtClave"];
	$name = $_POST["txtNombre"];


	
	
		if ( Registro($name, $user, $pass) ) 
		{
			$destino = "registroRealizado.html";
			header("location: $destino");	
		}
		else
		{
			echo "algo salio mal";
		}
	
?>