<?php
	
	echo "quase lá";

	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$email = $_POST["email"];
	$celular = $_POST["celular"];
	$bairro = $_POST["bairro"];
	$senha = $_POST["senha"];

	$conexao= mysqli_connect('localhost', 'root', '', 'trampo');
	$query="insert into conta (nome, sobrenome, email, senha, celular, bairro_id) values ('{$nome}', '{$sobrenome}', '{$email}', '{$senha}', '{$celular}', '1')";
	mysqli_query($conexao, $query);

	echo "cadastrado!";
?>