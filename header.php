<?php
include_once('php/conta.php');

$conta = new Conta();

session_start();
$conta->setId($_SESSION['id']);
if (!$conta->existeID($_SESSION['id'])) {
    header('Location: index.php');
}
$c = $conta->view();
$countRespostas = $conta->countRespostas();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trampo</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="img/favicon.png" />
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" alt="Trampo"></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><?php if($countRespostas > 0) { ?><span class="label label-info"><?= $countRespostas; ?></span><?php } ?>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="respostas.php">
								<div><?= $countRespostas > 0?"<em class='fa fa-user'></em> " . $countRespostas ." " . ($countRespostas>1?"Novas Respostas":"Nova Resposta"):"Nenhuma nova notificação"; ?></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $c->nome . ' ' . $c->sobrenome ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="perfil.php"><em class="fa fa-user">&nbsp;</em> Meu Perfil</a></li>
			<li><a href="criaPublicacao.php"><em class="fa fa-file-signature">&nbsp;</em> Criar Publicação</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;&nbsp;</em> Serviços Disponíveis<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<?php
						$cat = $conta->viewCategorias();
						$catOutros = $conta->viewOutros();
						for($i=0;$i<sizeof($cat);$i++) { ?>
							<a class="" href="publicacoes.php?catid=<?php echo $cat[$i]->id ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> <?= $cat[$i]->nome; ?>
							</a>
						<?php } ?>
						<a class="" href="publicacoes.php?catid=<?php echo $catOutros->id ?>">
						<span class="fa fa-arrow-right">&nbsp;</span> <?= $catOutros->nome; ?>
						</a>
					</li>
				</ul>
			</li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Desconectar</a></li>
		</ul>
	</div><!--/.sidebar-->