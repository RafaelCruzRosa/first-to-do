<?php 

require_once "app/init.php";

$deleteQuery = $connection->prepare('
		DELETE FROM items 
		WHERE id = :id
	');

$deleteQuery->bindParam(':id', $_POST['id']);
$deleteQuery->execute();

header('Location: index.php');

 ?>