<?php
	// funcion generica para hacer pedidos a la db
	function opSql($sqlCad) // sqlcad = cadena sql para el query
	{
		require("config/config.php");
		try
		{
			$sql = $sqlCad;
		
			$filas = $conn->query($sql);

			return $filas; // devuelve las filas en forma de array.
			
		    $conn = null;
		}
		catch (PDOException $e)
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
?>

