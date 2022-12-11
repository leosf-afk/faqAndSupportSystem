
<?php 
//connect db
include "config/config.php";






//insert into query table
if (isset($_POST["enviar"]))
	{

		// insert in faqs table
		$sql = "INSERT INTO consultas (nombre, legajo, documento, email, consulta)
         VALUES (?, ?, ?, ?, ?)";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["nombre"],
			$_POST["legajo"],
            $_POST["dni"],
            $_POST["email"],
            $_POST["consulta"]
		]);
        header('Location:'.'http://localhost/ticketsystem/ticketformredirect.php');
	}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesform.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Problemas</title>
</head>
<body>
<form method="POST"  action="ticketformvanilla.php">
    <h1>Rellene los campos solicitados</h1>
    <input type="text" name="nombre" placeholder="nombre completo">
    <input type="text" name="legajo" placeholder="legajo">
    <input type="text" name="dni" placeholder="documento">
    <input type="text" name="email" placeholder="email">
    <input type="text" size=40  style="width:510px;height:160px" name="consulta" placeholder="escriba su consulta">
    <input type="submit" name="enviar">





</form>


    
</body>
</html>