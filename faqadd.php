<?php

// session login
if (!isset($_SESSION)) { session_start(); }
	require("fnc/funcionesUsuario.php");
	

	$user = $_SESSION["username"];

    if (empty($user)) {
        $destino = "error.html";
        header("location: $destino");	
    }

	// connect with database
    include "config/config.php";

	// check if insert form is submitted
	if (isset($_POST["submit"]))
	{
		// create table if not already created
		$sql = "CREATE TABLE IF NOT EXISTS faqs (
			id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
			question TEXT NULL,
			answer TEXT NULL,
			created_at DATETIME DEFAULT CURRENT_TIMESTAMP
		)";
		$statement = $conn->prepare($sql);
		$statement->execute();

		// insert in faqs table
		$sql = "INSERT INTO faqs (question, answer, priority, categoria) VALUES (?, ?, ?, ?)";
		$statement = $conn->prepare($sql);
		$statement->execute([
			$_POST["question"],
			$_POST["answer"],
			$_POST["cbopripridad"],
			$_POST["categoria"]

		]);
	}

	// get all faqs from latest to oldest
	$sql = "SELECT * FROM faqs ORDER BY id DESC";
	$statement = $conn->prepare($sql);
	$statement->execute();
	$faqs = $statement->fetchAll();

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
	    <li><a onclick="window.location.href='logout.php'">Salir</a></li>
	    <li style="float:right"><a><?php echo "Bienvenido $user";?></a></li>

	</ul>




<!-- layout for form to add FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
	<div class="row">
		<div class="offset-md-3 col-md-6">
			<h1 class="text-center">FAQ</h1>

			<!-- for to add FAQ -->
			<form method="POST" action="faqadd.php">

				<!-- question -->
				<div class="form-group">
					<label>Añadir pregunta</label>
					<input type="text" name="question" class="form-control" required />
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
					<input type="text" name="categoria" class="form-control" required />
				</div>

				<!-- answer -->
				<div class="form-group">
					<label>Añadir respuesta</label>
					<textarea name="answer" id="answer" class="form-control" required></textarea>
				</div>

				<!-- submit button -->
				<input type="submit" name="submit" class="btn btn-info" value="Añadir FAQ" />
			</form>
		</div>
	</div>




		

	<!-- show all FAQs added -->
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<table class="table table-bordered">
				<!-- table heading -->
				<thead>
					<tr>
							
	<form action="faqform.php" method="POST" >
		<input type="text" name="search"  placeholder="Buscar una Faq">
            <input type="submit" value="buscar"></input>
			</form>
						
						<th>Pregunta</th>
						<th>Respuesta</th>
						<th>Categoria</th>
						<th>Prioridad</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<!-- table body -->
				<tbody>
					<?php foreach ($faqs as $faq): ?>
						<tr>
			
							<td><?php echo $faq["question"]; ?></td>
							<td><?php echo $faq["answer"]; ?></td>
							<td><?php echo $faq["categoria"]; ?></td>
							<td><?php echo $faq["priority"]; ?></td>
							<td>
								<!-- edit button -->
								<a href="faqedit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
									Editar
								</a>

								<!-- delete form -->
								<form method="POST" action="delete.php" onsubmit="return confirm('Estas seguro de eliminar esta FAQ ?');">
									<input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm" />
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>