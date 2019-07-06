<?php 
	session_start();
	
	//transformando $_POST em String
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);

	$text = $_SESSION['id'] . '#' . $_POST['titulo'] . '#' . $_POST['categoria'] . '#' . $_POST['descricao'] . PHP_EOL;

	//abrindo aquivo
	$arquivo = fopen("../../../app_help_desk/arquivo.txt", 'a');

	fwrite($arquivo, $text);

	fclose($arquivo);

	header('location: abrir_chamado.php'); 	
?>