<?php 

require_once "app/init.php";

if (isset($_POST['name'])) {
	$addQuery = $connection->prepare('
		INSERT INTO items (name, cargo, user)
		VALUES (:name, :cargo, :user)
	');

	$addQuery->execute([
		"name"=>$_POST['name'],
		"cargo"=>$_POST['cargo'],
		"user"=>'1'
	]);
}

header('Location: index.php');
 ?>