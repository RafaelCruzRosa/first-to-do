<?php 

/*
	Fazer sessao para o sistema de login
*/
session_start();

$_SESSION['user_id'] = '1';

$connection = new PDO('mysql:dbname=todo;host=localhost', 'root', '');
	
 ?>