<?php 
define('HOST', '127.0.0.1'); // Define uma constante com o nome 'HOST' com o valor '127.0.0.1' (ip onde o DB está localizado)
define('USUARIO', 'root');	// Define uma constante com o nome 'USUARIO' com o valor 'root' (login do banco de dados)
define('SENHA', '');	// Define uma constante com o nome 'SENHA' com o valor '' (senha do banco de dados)
define('DB', 'nanochip');	// Define uma constante com o nome 'DB' com o valor 'nanochip' (nome do banco de dados)

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Erro ao conectar ao DB ...'); // conexão com o banco de dados, caso falhe a mensagem 'Erro ao conectar ao DB ...' é exibida