<?php
	if (!isset($_SESSION)) { session_start(); }
	require("fnc/funcionesUsuario.php");
	

	$user = $_SESSION["username"];

    if (empty($user)) {
        $destino = "error.html";
        header("location: $destino");	
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>INICIO</title>
	<script src="js/scripts.js"></script>

	<link rel="stylesheet" type="text/css" href="styleslogin.css">

</head>
<body>
	<ul>
		<li><a class="active" onclick="window.location.href='pagprin.php'">Home</a></li>
		<li><a onclick="window.location.href='faqadd.php'">FAQS</a></li>
	    <li><a onclick="window.location.href='queryform.php'">Consultas</a></li>
	    <li><a onclick="window.location.href='logout.php'">Salir</a></li>
	    <li style="float:right"><a><?php echo "Bienvenido $user";?></a></li>

	</ul>
<br>




</body>
</html>