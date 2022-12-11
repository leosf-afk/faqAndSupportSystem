<?php 
if (!isset($_SESSION)) { session_start(); }
require("fnc/funcionesUsuario.php");
include "config/config.php";


$user = $_SESSION["username"];

$search = $_POST["search"];

if (empty($user)) {
    $destino = "error.html";
    header("location: $destino");	
}

// select all faqs where search = Post search

$stmt = $conn->prepare("SELECT *  FROM faqs WHERE question LIKE :search OR categoria LIKE :search OR priority LIKE :search");
$search = '%'.$_POST['search'].'%';
$stmt->bindValue(':search', $search, PDO::PARAM_STR);
$stmt->execute();
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);




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
					<!-- <?php foreach ($faqs as $faq): ?> -->
						<tr>
							
							<td><?php echo $faq["question"]  ?></td>
							<td><?php echo $faq["answer"]; ?></td>
							<td><?php echo $faq["categoria"]; ?></td>
							<td><?php echo $faq["priority"]; ?></td>
							<td>
								<!-- edit button -->
								<a href="faqedit.php?id=<?php echo $faq['id']; ?>" class="btn btn-warning btn-sm">
									Editar
								</a>

								<!-- delete form -->

								<form method="POST" action="faqdel.php" onsubmit="return confirm('Estas seguro de eliminar esta FAQ ?');">
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