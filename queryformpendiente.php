<?php
//session
if (!isset($_SESSION)) { session_start(); }
require("fnc/funcionesUsuario.php");
include "config/config.php";


$user = $_SESSION["username"];


if (empty($user)) {
    $destino = "error.html";
    header("location: $destino");	
}

	// connect with database
    include "config/config.php";

	// get all faqs from latest to oldest
	// $sql = "SELECT * FROM consultas ORDER BY id DESC";
	// $statement = $conn->prepare($sql);
	// $statement->execute();
	// $querys = $statement->fetchAll();
    // $estado = 'finalizado';
	// $sql = "SELECT * FROM consultas as c INNER JOIN faqs as f ON c.faqs_id = f.id  WHERE estado = $estado";
	// $statement = $conn->prepare($sql);
	// $statement->execute();
	// $querys = $statement->fetchAll();


    $statement = $conn->prepare("SELECT *  FROM consultas as c INNER JOIN faqs as f ON c.faqs_id = f.id
	 WHERE  estado LIKE :estado ");
$estado = '%'.'pendiente'.'%';
$statement->bindValue(':estado', $estado, PDO::PARAM_STR);
$statement->execute();
	$querys = $statement->fetchAll();


	

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

<!-- header -->
<ul>
		<li><a class="active" onclick="window.location.href='pagprin.php'">Home</a></li>
		<li><a onclick="window.location.href='faqadd.php'">FAQS</a></li>
	    <li><a onclick="window.location.href='queryform.php'">Consultas</a></li>
	    <li><a onclick="window.location.href='logout.php'">Salir</a></li>
	    <li style="float:right"><a><?php echo "Bienvenido $user";?></a></li>

</ul>



	<!-- show all querys added -->
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<table class="table table-bordered">
				<!-- table heading -->
				<thead>
					<tr>
					<!-- search toolbar -->

						<th>nombre</th>
						<th>legajo</th>
						<th>documento</th>
						<th>email</th>
						<th>consulta</th>
						<th>estado</th>
						<th>Prioridad</th>
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
					<?php	$_SESSION["legajo_edit"] = $query['legajo']; ?>
							<td><?php echo $query["nombre"]; ?></td>
							<td><?php echo $query["legajo"]; ?></td>
							<td><?php echo $query["documento"]; ?></td>
							<td><?php echo $query["email"]; ?></td>
							<td><?php echo $query["consulta"]; ?></td>
							<td><?php echo $query["estado"]; ?></td>
							<td><?php echo $query["priority"]; ?></td>
							<td><?php echo $query["observaciones"]; ?></td>
							<td><?php echo $query["usuario"]; ?></td>
							<td><?php echo $query["pregunta"]; ?></td>
							<td><?php echo $query["fecha"]; ?></td>
							<td>
								<!-- edit button -->
								<a href="queryupdate.php?legajo=<?php echo $query["legajo"]; ?>" class="btn btn-warning btn-sm">
									Editar
								</a>

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