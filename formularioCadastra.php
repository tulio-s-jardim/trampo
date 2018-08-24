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
			<div class="panel panel-default">
				<div class="panel-heading">Cadastro</div>
				<div class="panel-body">
					<form role="form" action="cadastraUsuario.php" method="post">
						<div class="form-group">
							<input class="form-control" placeholder="Nome" name="nome" type="text" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Sobrenome" name="sobrenome" type="text" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Celular" name="celular" type="number" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Bairro" name="bairro" type="text" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
						</div>
						<button class="btn btn-primary cadastra" type="submit">Cadastrar</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
		
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
