<?php 

include "config/config.php";


$sql = "UPDATE consultas SET estado = ?, observaciones = ?, usuario = ?  WHERE id = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["cboestado"],
			$_POST["observaciones"],
            $_POST["usuario"],
			$_POST["id"]
		]);


        

		// redirect back to previous page
       // $destino = "queryform.php";
       // header("location: $destino");

       header("location: queryform.php");


?>