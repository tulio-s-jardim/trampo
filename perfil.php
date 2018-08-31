<?php 
include_once('header.php');

if(isset($_GET['id']) && $conta->exists($_GET['id'])) {
	$a = $conta->viewPerfil($_GET['id']);
	$p = $conta->viewServPrestados($_GET['id']);
	$s = $conta->viewServSolicitados($_GET['id']);
	$meuPerfil = 0;
} else {
	$a = $conta->view();
	$p = $conta->viewServPrestados($_SESSION['id']);
	$s = $conta->viewServSolicitados($_SESSION['id']);
	$meuPerfil = 1;
}
?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Perfis</li>
				<?= $meuPerfil?'<li class="active">Meu Perfil</li>':''?>
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
						<div class="col-md-6">
							<label>Nome</label>
							<p><?php echo $a->nome . " " .  $a->sobrenome ?></p>
						</div>
						<div class="col-md-6">
							<label>E-mail</label>
							<p><?php echo $a->email ?></p>
						</div>
						<div class="col-md-6">
							<label>Recomendações como prestador</label>
							<p><?php echo sizeof($p) ?></p>
						</div>
						<div class="col-md-6">
							<label>Recomendações como contratante</label>
							<p><?php echo $conta->viewNotasContratante()->n ?></p>
						</div>
						<?php if($meuPerfil) { ?>
						<div class="col-md-6">
							<label>Celular</label>
							<p><?php echo $a->celular ?></p>
						</div>
						<div class="col-md-6">
							<a class="btn-primary btn btn-lg" href="formularioPerfil.php">Editar Perfil</a>
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
								<div class="col-sm-6" style="text-align: right;"><?php echo $conta->viewRecomendacoesPrestador()->n*10 ?>%</div>
							</div>
							<div class="progress">
								<div data-percentage="0%" style="width: <?php echo $conta->viewRecomendacoesPrestador()->n*10 ?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<div class="row progress-labels">
								<div class="col-sm-6">Como contratante</div>
								<div class="col-sm-6" style="text-align: right;"><?php echo $conta->viewRecomendacoesContratante()->n*10 ?>%</div>
							</div>
							<div class="progress">
								<div data-percentage="0%" style="width: <?php echo $conta->viewRecomendacoesContratante()->n*10 ?>%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
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