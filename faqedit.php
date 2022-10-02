<?php 
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
?>

<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />

<!-- include jquer, bootstrap and rich text JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>