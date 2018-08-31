<?php
include_once('php/conta.php');

$conta = new Conta();

session_start();

if (isset($_SESSION)) {
	session_unset();
	session_destroy();
}

if (isset($_POST['login'])) {
	echo $_POST['email'] . ' ' . sha1($_POST['senha']);
	$uid = $conta->existe($_POST['email'], sha1($_POST['senha']));
	if (!is_null($uid)) {
        session_start();
        $_SESSION["id"] = $uid;
        header("Location: perfil.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trampo - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form role="form" action="login.php" method="post">
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Senha" name="senha" type="password" value="" required>
							</div>
							<button name="login" class="btn btn-primary" type="submit">Login</button>
							<a href="formularioCadastra.php" class="btn btn-primary">Cadastrar</a>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
