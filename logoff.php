<?php

	//removendo índices  do array de sessão, remove índice apenas se existir !
	/*unset($_SESSION['login']);
	unset($_SESSION['senha']);
	unset($_SESSION['autenticado']);*/

	//destruir a váriavel de sessão 
	session_destroy(); //tem que forçar o redirecionamento
	header('location: index.php');
 ?>