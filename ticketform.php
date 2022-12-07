<?php 
//connect db
include "config/config.php";

$faq = $_POST["faq"];




if (isset($_POST["enviar"]))
	{

		// insert in faqs table
		$sql = "INSERT INTO consultas (nombre, legajo, documento, email, consulta, pregunta)
         VALUES (?, ?, ?, ?, ?, ?)";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["nombre"],
			$_POST["legajo"],
            $_POST["dni"],
            $_POST["email"],
            $_POST["consulta"],
            $_POST["pregunta"],
		]);
        // header('Location:'.'http://localhost/ticketsystem/faqindex.php');
	}
?> 


<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
var  redirect = "<?php echo $faq; ?>"

    if ( redirect == "si") {
        window.open('http://localhost/ticketsystem/faqindex.php', '_self');
    }
</script>



    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesform.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Problemas</title>
</head>
<body>
<form method="POST" action="ticketform.php">
    <h1>Rellene los campos solicitados</h1>
    <br>
    <br>
    <label>Pregunta</label>
    <?php $pregunta = $faq; ?>
    <input type="text" name="pregunta" value="" placeholder="<?php echo $pregunta;?>" disabled>
    <br>
    <br>
    <label> Nombre y apellido</label>
    <input type="text" name="nombre" placeholder="nombre completo">
    <br>
    <br>
    <label>Legajo</label>
    <input type="text" name="legajo" placeholder="legajo">
    <br>
    <br>
    <label> Documento</label>
    <input type="text" name="dni" placeholder="documento">
    <br>
    <br>
    <label> Email</label>
    <input type="text" name="email" placeholder="email" >
    <br>
    <br>
    <label>Consulta</label>
    <input type="text" size=40  style="width:510px;height:160px" name="consulta" placeholder="escriba su consulta">
    <input type="submit" name="enviar">
</form>


</body>
</html>

