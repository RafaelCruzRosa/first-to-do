<?php 

require_once "app/init.php";

$selectQuery = $connection->prepare("
		SELECT id, name, cargo FROM items WHERE user = :user
	");

	$selectQuery->execute([
		"user"=>$_SESSION['user_id']
	]);

	$items = $selectQuery->rowCount() ? $selectQuery : [];
?>
<!DOCTYPE html>
<html>
<head>
	<title>To do</title>
</head>
<body>
	<ul>
		<?php foreach($items as $item): ?>
			<li>
				Nome: <?php echo $item['name'] ?> <br/>
				Cargo: <?php if($item['cargo']){
							echo $item['cargo'];
						}else{
							echo "Nenhum cargo";
						} ?>
				<form action="update.php" method="post">
					<input type="hidden" name="id" value='<?php echo $item["id"] ?>'>
					<input type="submit" value='Alterar'>
				</form>
				<form action="delete.php" method="post">
					<input type="hidden" name="id" value='<?php echo $item["id"] ?>'>
					<input type="submit" value='Deletar'>
				</form>
			</li>
		<?php endforeach; ?> 
	</ul>
	<p>Criar novo usuário</p>
	<form action="add.php" method="post">
		Nome: <input type="text" required name="name"><br>
		Cargo: <input type="text" required name="cargo">
		<input type="submit" value="Send">
	</form>
</body>
</html>