<?php
if (!isset($_SESSION)) { session_start(); }

session_destroy();

$destino = "login.php";

header("location: $destino");
?>