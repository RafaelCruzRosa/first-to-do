<?php

require_once "app/init.php";

$updateQuery = $connection->prepare('
		UPDATE items SET
		name = :name,
		cargo = :cargo
		WHERE id = :id
	');

$updateQuery->bindParam(':name',$_POST['newName']);
$updateQuery->bindParam(':cargo',$_POST['newCargo']);
$updateQuery->bindParam(':id',$_POST['id']);

$updateQuery->execute();

header('Location: index.php');
?>