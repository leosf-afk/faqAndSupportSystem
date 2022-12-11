<?php

	// connect with database
    include "config/config.php";



	// get all faqs from latest to oldest
	$sql = "SELECT * FROM consultas ORDER BY id DESC";
	$statement = $conn->prepare($sql);
	$statement->execute();
	$querys = $statement->fetchAll();

?>

<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />

<!-- include jquer, bootstrap and rich text JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>
<!-- search toolbar -->
<br>
<br>
<form action="" method="POST" >
            <input type="text" name="search" placeholder="Buscar una consulta" style="margin-left: 500px;width:510px">
            <input type="submit" value="buscar"></input>
            </form>
			<br>
		

	<!-- show all FAQs added -->
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<table class="table table-bordered">
				<!-- table heading -->
				<thead>
					<tr>
						<th>Numero</th>
						<th>nombre</th>
						<th>legajo</th>
						<th>documento</th>
						<th>email</th>
						<th>consulta</th>
						<th>estado</th>
						<th>observaciones</th>
						<th>usuario</th> 
						<th>pregunta</th> 
						<th>fecha</th>
					</tr>
				</thead>

				<!-- table body -->
				<tbody>
					<?php foreach ($querys as $query): ?>
						<tr>
							<td><?php echo $query["id"]; ?></td>
							<td><?php echo $query["nombre"]; ?></td>
							<td><?php echo $query["legajo"]; ?></td>
							<td><?php echo $query["documento"]; ?></td>
							<td><?php echo $query["email"]; ?></td>
							<td><?php echo $query["consulta"]; ?></td>
							<td><?php echo $query["estado"]; ?></td>
							<td><?php echo $query["observaciones"]; ?></td>
							<td><?php echo $query["usuario"]; ?></td>
							<td><?php echo $query["pregunta"]; ?></td>
							<td><?php echo $query["fecha"]; ?></td>
							<td>
								<!-- edit button -->
								<a href="faqedit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
									Editar
								</a>

								<!-- delete form -->
								<form method="POST" action="delete.php" onsubmit="return confirm('Estas seguro de eliminar esta FAQ ?');">
									<input type="hidden" name="id" value="<?php echo $query['id']; ?>" required />
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm" />
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>


<script>
	// initialize rich text library
	window.addEventListener("load", function () {
		$("#answer").richText();
	});
</script>