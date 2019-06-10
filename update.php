<?php 

require_once "app/init.php";

$user = $connection->prepare("
		SELECT * FROM items WHERE id = :id;
	");

$user->bindParam(':id',$_POST['id']);

$user->execute();

$result = $user->fetch(PDO::FETCH_OBJ);
 ?>

 <form action="confirm.php" method="post">
 	Nome: <input type="text" value="<?php echo($result->name) ?>" name="newName">
 	Cargo: <input type="text" value="<?php echo($result->cargo) ?>" name="newCargo">
 	<input type="hidden" value="<?php echo($result->id) ?>" name="id">
 	<input type="submit" value="Alterar">
 </form>
