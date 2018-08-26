<?php
	echo "vai cadastrar!";
	
	$flag="false";	
	$conexao= mysqli_connect('localhost', 'root', '', 'trampo');

	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$email = $_POST["email"];
	$celular = $_POST["celular"];
	$bairro = $_POST["bairro"];
	$senha = $_POST["senha"];

		$usuarios = array();
		$resultado = mysqli_query($conexao, "select celular,email from conta");
		while($u = mysqli_fetch_assoc($resultado)){
			array_push($usuarios, $u);
		}

		foreach ($usuarios as $usuario) {
			if($usuario['celular'] == $celular){
				echo "Celular já cadastrado!";
				$flag="true";
			}
			if($usuario['email'] == $email){
				echo "Email já cadastrado";
				$flag="true";
			}
		}
		if($flag=="false"){
			$query="insert into conta (nome, sobrenome, email, senha, celular, bairro_id) values ('{$nome}', '{$sobrenome}', '{$email}', '{$senha}', '{$celular}', '1')";
			mysqli_query($conexao, $query);
		}

	echo "cadastrado!";
?>