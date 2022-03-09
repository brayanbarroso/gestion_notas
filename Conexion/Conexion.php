<?php
$host = 'mysql:host=localhost;dbname=Notas';
$user = 'root';
$password = 'bbarroso01';

try {
	$pdo = new PDO($host, $user, $password);
} catch (PDOException $e) {
	print "¡Error!: " . $e->getMessage() . "<br/>";
	die();
}
