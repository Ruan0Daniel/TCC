<?php 
session_start();
include('conexao.php'); // Arquivo PHP com as informações de conexão ao banco de dados

if(empty($_POST['usuario']) || empty($_POST['senha'])){ //caso um dos campos esteja vazio ele retorna a página inicial (index.php)
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from usuarios where login = '$usuario' and senha = md5('$senha')";  // busca no banco de dados na tabela "usuários" registros que possuam o "usuario" e "senha" compativeis

$result = mysqli_query($conexao, $query); 

 
$row = mysqli_num_rows($result);

if($row == 1) { // caso o login seja correto executa esse bloco
	$_SESSION['usuario'] = $usuario; // cria uma sessão para o usuário informado
	header('Location: painel.php');	// direciona para o painel
	exit();
} else { 	// caso o login não esteja correto executa esse bloco
	$_SESSION['nao_autenticado'] = true;	// cria uma sessão de não autenticação
	header('Location: index.php');	// redireciona para a página principaç
	exit();
}

