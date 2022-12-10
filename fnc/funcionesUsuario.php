<?php 
	if (!isset($_SESSION)) { session_start(); }

	// require("funcionBase.php");

	



	// function Login($usuario, $clave) // verifica los datos del login en base
	// {		
	// 	try
	// 	{
	// 		require_once("config/config.php");

	// 		$sql = "CALL SP_LOGIN('$usuario', '$clave')";
		
	// 		$filas = $conn->query($sql);

	// 		if ($filas)
	// 		{
	// 			$fila = $filas->fetch();
	// 		}
			
	// 		return $fila;
			
	// 	    $link = null;
	// 	}
	// 	catch (PDOException $e)
	// 	{
	// 	    print "Error!: " . $e->getMessage() . "<br/>";
	// 	    die();
	// 	}	
	// }

	function Registro($nombre,$usuario, $clave) // carga registro
	{		
		try
		{
			require_once("config/config.php");

			$sql = "CALL SP_REGISTRO('$nombre', '$usuario', '$clave')";
			
			//echo "<h3>" . $sql . "</h3>";
		
			$filas = $conn->query($sql);

			if ($filas)
			{
				return 1;
			}
			
			return 0;
			
		    $link = null;
		}
		catch (PDOException $e)
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}	

	}





?>