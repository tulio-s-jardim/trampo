<?php 
include_once('header.php');

$contaX = new Conta();

$recomendo = 0;

if(isset($_GET['id']) && $conta->exists($_GET['id']) && $_GET['id'] != $_SESSION['id']) {
	$contaX->setId($_GET['id']);
	$a = $contaX->viewPerfil($_GET['id']);
	$p = $contaX->viewMeusServPrestados($_GET['id']);
	$s = $contaX->viewServSolicitados($_GET['id']);
	$meuPerfil = 0;
	$recomendo = $conta->clienteDe($_GET['id']);
	if(isset($_POST['nota'])) {
		$conta->resolveCliente($recomendo, $_POST['nota']);
	}
} else {
	$contaX->setId($_SESSION['id']);
	$a = $contaX->view();
	$p = $contaX->viewMeusServPrestados($_SESSION['id']);
	$s = $contaX->viewServSolicitados($_SESSION['id']);
	$meuPerfil = 1;
}
?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<?= $meuPerfil?'<li class="active">Meu Perfil</li>':'<li class="active">Perfis</li>
'?>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?= $meuPerfil?"Meu Perfil": "Perfis"?></h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Perfil de <?php echo $a->nome ?></div>
					<div class="panel-body">
						<?php if(isset($cadastrado)) {?>
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-body sucesso">
										<p><b>Perfil criado com sucesso!</b></p>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="col-md-<?= $meuPerfil?'6':$recomendo?'6':'12' ?>">
							<label>Nome</label>
							<p><?php echo $a->nome . " " .  $a->sobrenome ?></p>
						</div>
						<?php if($meuPerfil) { ?>
						<div class="col-md-6">
							<label>E-mail</label>
							<p><?php echo $a->email ?></p>
						</div>
						<?php }
						else if($recomendo) { 
						$nota = $conta->viewPublicacao($recomendo)->nota; ?>
						<div class="col-md-6">
							<label>Nota como cliente</label>
							<form role="form" method="post" name="nota" action="perfil.php?id=<?= $_GET['id'] ?>">
								<select name="nota" class="form-control" onchange="this.form.submit()">
									<option value='0'<?= $nota==0?'selected':'' ?>>0</option>
									<option value='1'<?= $nota==1?'selected':'' ?>>1</option>
									<option value='2'<?= $nota==2?'selected':'' ?>>2</option>
									<option value='3'<?= $nota==3?'selected':'' ?>>3</option>
									<option value='4'<?= $nota==4?'selected':'' ?>>4</option>
									<option value='5'<?= $nota==5?'selected':'' ?>>5</option>
									<option value='6'<?= $nota==6?'selected':'' ?>>6</option>
									<option value='7'<?= $nota==7?'selected':'' ?>>7</option>
									<option value='8'<?= $nota==8?'selected':'' ?>>8</option>
									<option value='9'<?= $nota==9?'selected':'' ?>>9</option>
									<option value='10'<?= $nota==10?'selected':'' ?>>10</option>
								</select>
							</form>
						</div>
						<?php } ?>
						<div class="col-md-6">
							<label>Recomendações como prestador</label>
							<p><?php echo sizeof($p) ?></p>
						</div>
						<div class="col-md-6">
							<label>Recomendações como contratante</label>
							<p><?php echo $contaX->viewNotasContratante()->n ?></p>
						</div>
						<?php if($meuPerfil) { ?>
						<div class="col-md-6">
							<label>Celular</label>
							<p><?php echo $a->celular ?></p>
						</div>
						<div class="col-md-6 botao-edita-perfil">
							<a class="btn-primary btn btn-md" href="formularioPerfil.php">Editar Perfil</a>
						</div>
						<?php }?>
					</div>
				</div><!-- /.panel-->
			</div>
			<div class="col-md-6">
		<div class="panel panel-default ">
					<div class="panel-heading">
						Recomendações
					</div>
					<div class="panel-body">
						<div class="col-md-12 no-padding">
							<label>Médias</label>
							<div class="row progress-labels">
								<div class="col-sm-6">Como prestador</div>
								<div class="col-sm-6" style="text-align: right;"><?php echo $contaX->viewRecomendacoesPrestador()->n*10 ?>%</div>
							</div>
							<div class="progress">
								<div data-percentage="0%" style="width: <?php echo $contaX->viewRecomendacoesPrestador()->n*10 ?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="row progress-labels">
								<div class="col-sm-6">Como contratante</div>
								<div class="col-sm-6" style="text-align: right;"><?php echo $contaX->viewRecomendacoesContratante()->n*10 ?>%</div>
							</div>
							<div class="progress">
								<div data-percentage="0%" style="width: <?php echo $contaX->viewRecomendacoesContratante()->n*10 ?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default articles">
			<div class="panel-heading">
				Serviços Prestados
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<?php
				for($i=0;$i<sizeof($p);$i++) { ?>
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2 col-md-2 date">
								<div class="large"><?php echo $p[$i]->nome ?></div>
								<div class="text-muted">Categoria</div>
							</div>
							<div class="col-xs-10 col-md-10">
								<h4><a href="publicacao.php?id=<?php echo $p[$i]->pubid ?>"><?php echo $p[$i]->titulo ?></a></h4>
								<p><?php echo $p[$i]->descricao ?></p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php } ?>
			</div>
		</div><!--End .articles-->
		<div class="panel panel-default articles">
			<div class="panel-heading">
				Serviços Solicitados
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<?php
				for($i=0;$i<sizeof($s);$i++) { ?>
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2 col-md-2 date">
								<div class="large"><?php echo $s[$i]->nome ?></div>
								<div class="text-muted">Categoria</div>
							</div>
							<div class="col-xs-10 col-md-10">
								<h4><a href="publicacao.php?id=<?php echo $s[$i]->pubid ?>"><?php echo $s[$i]->titulo ?></a></h4>
								<p><?php $out = strlen($s[$i]->descricao) > 255 ? substr($s[$i]->descricao,0,255)."..." : $s[$i]->descricao; echo $out ?></p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php } ?>
			</div>
		</div><!--End .articles-->

			<div class="col-sm-12">
				<p class="back-link">Trampo possui sua base em <a href="https://www.medialoot.com">Lumino</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>		
</body>
</html>