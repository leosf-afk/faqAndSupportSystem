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

$sql = "SELECT * FROM faqs WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->execute([
    $_REQUEST["id"]
]);

$faq = $statement->fetch();

if (!$faq) {
    die("FAQ no encontrada");
}


//edit logic
if (isset($_POST["submit"]))
	{
		// update the FAQ in database
		$sql = "UPDATE faqs SET question = ?, answer = ?, priority = ?, categoria = ? WHERE id = ?";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["question"],
			$_POST["answer"],
            $_POST["cbopripridad"],
            $_POST["categoria"],
			$_POST["id"]
		]);

		// redirect back to previous page
        $destino = "faqadd.php";
        header("location: $destino");
	}




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
			<h1 class="text-center">Edit FAQ</h1>

			<!-- form to edit FAQ -->
			<form method="POST" action="faqedit.php">

				<!-- hidden ID field of FAQ -->
				<input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />

				<!-- question, auto-populate -->
				<div class="form-group">
					<label>Añadir pregunta</label>
					<input type="text" name="question" class="form-control" value="<?php echo $faq['question']; ?>" required />
				</div>

                <div class="form-group">
					<label>Establecer prioridad:</label>
					<select name="cbopripridad">
						<option value="Alta">Alta</option>
						<option value="Media">Media</option>
						<option value="Baja">Baja</option>
					</select>
				</div>


                <div class="form-group">
					<label>Escriba la categoria:</label>
					<input type="text" name="categoria" class="form-control" value="<?php echo $faq['categoria']; ?>" required />
				</div>

				<!-- answer, auto-populate -->
				<div class="form-group">
					<label>Añadir respuesta</label>
					<textarea name="answer" id="answer" class="form-control" required><?php echo $faq['answer']; ?></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="submit" class="btn btn-warning" value="Edit FAQ" />
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