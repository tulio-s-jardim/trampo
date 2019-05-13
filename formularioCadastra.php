<?php
include_once('php/conta.php');

function urlExists($url) {

    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if($httpCode >= 200 && $httpCode <= 400) {
        return true;
    } else {
        return false;
    }

    curl_close($handle);
}

$conta = new Conta();
$sem_cep = 0;

session_start();

if (isset($_SESSION)) {
	session_unset();
	session_destroy();
}

if(isset($_POST['botao'])) {
	$conta->setNome($_POST["nome"]);
	$conta->setSobrenome($_POST["sobrenome"]);
	$conta->setEmail($_POST["email"]);
	$celular = str_replace("-", "", $_POST['celular']);
	$celular = str_replace("(", "", $celular);
	$celular = str_replace(")", "", $celular);
	$celular = str_replace(" ", "", $celular);
	$conta->setCelular($celular);
	$conta->setSenha(sha1($_POST["senha"]));
	$cep = str_replace("-", "", $_POST['cep']);
	
	// set feed URL
	$url = 'https://api.postmon.com.br/v1/cep/'.$cep.'?format=xml';

	 if(urlExists($url)){
	 	$sxml = simplexml_load_file($url);
	 	if(!is_null($sxml->bairro)){
	 		$conta->setCep($cep);
	 	}else{
	 		$sem_cep = 1;
	 	}
	 }else{
	 	$sem_cep = 1;
	 }

	 if($sem_cep != 1){
		if ($conta->estaCadastrado($celular, $_POST['email'])) {
			$cadastrado = -2;
		}else if ($conta->estaCadastradoCelular($celular)) {
			$cadastrado = -1;
		} else if ($conta->estaCadastradoEmail($_POST['email'])) {
			$cadastrado = 0;
		} else {
			$cadastrado = 1;
			$conta->insert();
			$uid = $conta->existe($_POST['email'], sha1($_POST['senha']));
			if (!is_null($uid)) {
		        session_start();
		        $_SESSION["id"] = $uid;
		        header("Location: perfil.php");
			}else{
				//header('Location: index.php');
			}
		} 	
	 }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trampo - Cadastro</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="img/favicon.png" />
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Cadastro</div>
				<div class="panel-body">
					<form role="form" name="criarMembro" action="formularioCadastra.php" method="post">
						<?php if(isset($cadastrado) && $cadastrado!=1) {?>
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-body fracasso">
										<p><b><?= $cadastrado==-2?'E-mail e celular já cadastrados no sistema!':($cadastrado==-1?'Celular já cadastrado no sistema!':"E-mail já cadastrado no sistema!"); ?></b></p>
									</div>
								</div>
							</div>
						<?php }else if($sem_cep == 1){ ?>
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-body fracasso">
										<p><b>O CEP informado não é válido</b></p>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label>Nome</label>
							<input class="form-control" name="nome" type="text" autofocus="" required>
						</div>
						<div class="form-group">
							<label>Sobrenome</label>
							<input class="form-control" name="sobrenome" type="text"required>
						</div>
						<div class="form-group">
							<label>E-mail</label>
							<input class="form-control" name="email" type="email"" required>
						</div>
						<div class="form-group">
							<label>Celular</label>
							<input class="form-control" placeholder="(XX) X-XXXX-XXXX" name="celular" type="text" onkeypress="MascaraCelular(criarMembro.celular, 'celular');" id="celular" maxlength="16" required>
						</div>
						<div class="form-group">
							<label>CEP</label>
							<input class="form-control" placeholder="XXXXX-XXX" onkeypress="MascaraCep(criarMembro.cep);" name="cep" type="text" maxlength="9" required>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input class="form-control" name="senha" type="password" value="" required>
						</div>
						<button name="botao" class="btn btn-primary cadastra" type="submit" required>Cadastrar</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
		
	</div><!-- /.row -->	

<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validaCampos.js"></script>
</body>
</html>
