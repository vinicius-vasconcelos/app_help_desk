<?php
	/* Capturando URL´s
	//GET
	//------------------------------
	//recuperando dados da url
	$arr = $_GET; //array

	//acessando os names dos inputs
	$_GET['email'];
	$_GET['senha'];

	//POST
	//------------------------------
	//recuperando dados da url
	$arr = $_POST; //array

	//acessando os names dos inputs
	$_POST['email'];
	$_POST['senha'];
	*/

	//validando sessões
	session_start();

	//perfis de usuário
	$perfis = [1 => 'adm', 2 => 'usuario'];

	//usúarios dos sistemas
	$usuarios_app = [
		['id' => 1, 'email' =>'adm@teste.com.br', 'senha' => '123', 'perfil_id' => 1],
		['id' => 2, 'email' =>'user@teste.com.br', 'senha' => '123', 'perfil_id' => 1],
		['id' => 3, 'email' =>'jose@teste.com.br', 'senha' => '123', 'perfil_id' => 2],
		['id' => 4, 'email' =>'maria@teste.com.br', 'senha' => '123', 'perfil_id' => 2]
	];

	//validando dados
	$achou = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	foreach ($usuarios_app as $usuario) {
		if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
			$achou = true;
			$usuario_id = $usuario['id'];
			$usuario_perfil_id = $usuario['perfil_id'];
		}
	}

	if($achou){ //logar
		//criando sessão
		$_SESSION['login'] = $_POST['email'];
		$_SESSION['senha'] = $_POST['senha'];
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('location: home.php');
	}
	else { //voltar index com parametro de erro
		$_SESSION['login'] = null;
		$_SESSION['senha'] = null;
		$_SESSION['id'] = null;
		$_SESSION['perfil_id'] = null;
		$_SESSION['autenticado'] = 'NAO';
		header('location: index.php?login=erroLogin');
	}

?>