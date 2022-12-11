<?php
	if (!isset($_SESSION)) { session_start(); }
	require("fnc/funcionesUsuario.php");

	// Limpiar Inputs
	//LimpiarInput($_POST);


	// Verificar errores
	$errores = array();

	if ( !isset($_POST["txtUsuario"]) )
	{
		$errores[] = "Usuario no esta definido";	
	}
	else
	{
		$user = trim($_POST["txtUsuario"]);
		
		if(empty($user))
		{
			$errores[] = "Usuario esta vacio";
		}

		if ( !is_string($user))
		{
			$errores[] = "Usuario no es una cadena";
		}
	}

	if ( !isset($_POST["txtClave"]) )
	{
		$errores[] = "Clave no esta definida";	
	}
	else
	{
		$pass = trim($_POST["txtClave"]);	
	
		if ( empty($pass) )
		{
			$errores[] = "Clave esta vacia";
		}
	
	
		if ( !is_string($pass) )
		{
			$errores[] = "Clave no es una cadena";	
		}
	}	

	if ( !empty($errores) )
	{
		$s  = "";
	
		$s .= "<h4>Errores</h4>";
	
		foreach ($errores as $error)
		{
			$s .= "<h4>$error</h4>";
		}
	}

	if ( empty($errores) ) 
	{
		if ( Login($user, sha1($pass)) ) 
		{
			$_SESSION["logueado"] = true;
			$_SESSION["username"] = $user;
		
			$destino = "pagprin.php";
		
			header("location: $destino");
		}
		else
		{
			$destino = "error.html";
			header("location: $destino");
		}
	}
	else
	{
		$destino = "error.php?error=1";
		header("location: $destino");
	}
?>