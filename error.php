<?php
if (!isset($_SESSION)) { session_start(); }


$tituloHTML = "Error";

$mensajeError = "Se produjo un error";
$textoEnlace = "Login"; 
$destino = "login.php";

if ( isset($_GET["error"]) )
{
	
	$error = $_GET["error"];
	
	switch ( $error )
	{
		
		case "1":
			    {
			    	$mensajeError = "Usuario y/o Clave incorrectas";
					$textoEnlace = "Login";
					$destino = "login.php";
			    	break;
			    }
				
		case "2":
			    {
			    	$mensajeError = "Mail no valido";
					$textoEnlace = "Ir a registro";
					$destino = "registro.php";
			    	break;
			    }
		case "3":
			    {
			    	$mensajeError = "Error al cargar la apuesta";
					$textoEnlace = "Ir a pag principal";
					$destino = "pagprin.php";
			    	break;
			    }
		case "4":
			    {
			    	$mensajeError = "Codigo o pin incorrecto";
					$textoEnlace = "Volver";
					$destino = "cargSal.php";
			    	break;
			    }

				
	}

}
else
{
}

?>

<!DOCTYPE html>

<html>
<head>
<title><?php echo $tituloHTML;?></title>
<link type="text/css" rel="stylesheet" href="css/estilo01.css"/>
</head>
<body>
<div id="contenedor">
	
<h2> <?php echo $tituloHTML; ?> </h2>	

<h3> <?php echo $mensajeError; ?> </h3>	

<p>
<a href="<?php echo $destino; ?>"><?php echo $textoEnlace;?></a>
</p>

</div>
</body>
</html>