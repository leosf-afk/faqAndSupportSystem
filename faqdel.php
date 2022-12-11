<?php

	// connect database
    include "config/config.php";

	// check if FAQ existed
	$sql = "SELECT * FROM faqs WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([
		$_REQUEST["id"]
	]);
	$faq = $statement->fetch();

	if (!$faq)
	{
		die("FAQ not found");
	}

	// delete from database
	$sql = "DELETE FROM faqs WHERE id = ?";
	$statement = $conn->prepare($sql);
	$statement->execute([
		$_POST["id"]
	]);

	// redirect to previous page
    $destino = "faqadd.php";
    header("location: $destino");

?>