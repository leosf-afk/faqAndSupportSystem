<?php 
// session login
if (!isset($_SESSION)) { session_start(); }
	require("fnc/funcionesUsuario.php");
	

	$user = $_SESSION["username"];

   
    if (empty($user)) {
        $destino = "error.html";
        header("location: $destino");	
    }

// database connection
include "config/config.php";

//check if faq exists

$sql = "SELECT * FROM consultas WHERE legajo = ?";
$statement = $conn->prepare($sql);
$statement->execute([
    $_REQUEST["legajo"]
]);

$query = $statement->fetch();

if (!$query) {
    die("query no encontrada");
}


//edit logic
// if (isset($_POST["submit"]))
// 	{
// 		// update the FAQ in database
// 		$sql = "UPDATE consultas SET estado = ?, observaciones = ?, usuario = ?  WHERE id = ?";
// 		$statement = $conn->prepare($sql);
// 		$statement->execute([
// 			$_POST["cboestado"],
// 			$_POST["observaciones"],
//             $_POST["usuario"],
// 			$_POST["id"]
// 		]);


        

// 		// redirect back to previous page
//        // $destino = "queryform.php";
//        // header("location: $destino");

//        header("location: queryform.php");
// 	}

?>



<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />
<link rel="stylesheet" type="text/css" href="styleslogin.css">

<!-- include jquer, bootstrap and rich text JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>



<ul>
		<li><a class="active" onclick="window.location.href='pagprin.php'">Home</a></li>
		<li><a onclick="window.location.href='faqadd.php'">FAQS</a></li>
	    <li><a onclick="window.location.href='queryform.php'">Consultas</a></li>
		<li><a onclick="window.location.href='queryformpendiente.php'">Consultas pendientes</a></li>
		<li><a onclick="window.location.href='queryformfinalizado.php'">Consultas finalizadas</a></li>
	    <li><a onclick="window.location.href='logout.php'">Salir</a></li>
	    <li style="float:right"><a><?php echo "Bienvenido $user";?></a></li>

	</ul>





<!-- layout for form to edit FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h1 class="text-center">Revisar consulta</h1>

			<!-- form to edit FAQ -->
			<form method="POST" action="queryupdate2.php">

				<!-- hidden ID field of FAQ -->
				<input type="hidden" name="id" value="<?php echo $query['id']; ?>" required />

				<!-- question, auto-populate -->

                <div class="form-group">
					<label>pregunta:</label>
					<textarea disabled name="pregunta" class="form-control" required><?php echo $query['pregunta']; ?>  </textarea>
				</div>

				<div class="form-group">
					<label>nombre</label>
					<input type="text" name="nombre" class="form-control" value="<?php echo $query['nombre']; ?>" disabled />
				</div>

                <div class="form-group">
					<label>legajo:</label>
					<input type="text" name="legajo" class="form-control" value="<?php echo $query['legajo']; ?>" disabled />
				</div>

                <div class="form-group">
					<label>documento:</label>
					<input type="text" name="documento" class="form-control" value="<?php echo $query['documento']; ?>" disabled  />
				</div>

                <div class="form-group">
					<label>email:</label>
					<input type="text" name="email" class="form-control" value="<?php echo $query['email']; ?>" disabled />
				</div>

                <div class="form-group">
					<label>consulta:</label>
					<input type="text" name="consulta" class="form-control" value="<?php echo $query['consulta']; ?>" disabled />
				</div>

                <div class="form-group">
					<label>estado:</label>
					<select name="cboestado">
						<option value="Pendiente">Pendiente</option>
						<option value="Finalizado">Finalizado</option>
					</select>
				</div>


                <div class="form-group">
					<label>observaciones:</label>
					<input type="text" name="observaciones" class="form-control" value="<?php echo $query['observaciones']; ?> "  />
				</div>


                

				<!-- answer, auto-populate -->
				<div class="form-group">
					<label>usuario a cargo:</label>
					<textarea disabled name="user" class="form-control" ><?php echo $user; ?></textarea>
                    <input type="text" name="usuario" class="form-control" value="<?php echo $user; ?>" hidden />
				</div>


          

				<!-- submit button -->
				<input type="submit" name="submit" class="btn btn-warning" value="Edit QUERY" />
			</form>
		</div>
	</div>
</div>

<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>