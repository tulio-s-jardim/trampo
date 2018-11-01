<?php 
include_once('header.php');
?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Respostas</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Respostas às minhas publicações</h1>
			</div>
		</div><!--/.row-->
		<?php 
		$rg = $conta->viewRespostasGerais();
		for($j=0;$j<sizeof($rg);$j++) { ?>
		<div class="panel panel-default articles">
			<div class="panel-heading">
				<h4><a href="publicacao.php?id=<?php echo $rg[$j]->id ?>"><?= $rg[$j]->titulo ?></a></h4>
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Nome</b></h4>
							</div>
							<div class="col-xs-3 col-md-3 date">
								<h4><b>E-mail</b></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Serviços Prestados</b></h4>
							</div>
							<div class="col-xs-1 col-md-1 date">
								<h4><b>Endereço</b></h4>
							</div>
							<div class="col-xs-4 col-md-4 date">
								<h4><b>Número de Celular</b></h4>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php
				$r = $conta->viewRespostasNLidas($rg[$j]->id);
				for($i=0;$i<sizeof($r);$i++) { 
					$contaX = new Conta();
					$contaX->setId($r[$i]->id);
					$pX = $contaX->viewServPrestados($r[$i]->id);?>
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2 col-md-2 date">
								<h4><a href="perfil?id=<?= $r[$i]->id ?>"><?php echo $r[$i]->nome ?></a></h4>
							</div>
							<div class="col-xs-3 col-md-3 date">
								<h4><?php echo $r[$i]->email ?></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><?php echo sizeof($pX) ?></h4>
							</div>
							<div class="col-xs-1 col-md-1 date">
								<h4><a href="<?php echo 'https://www.google.com/maps?q='.$r[$i]->cep ?>"><em class="fa fa-map-marked-alt">&nbsp;</em></a></h4>
							</div>
							<div class="col-xs-4 col-md-4 date">
								<h4><a href="https://wa.me/55<?php echo $r[$i]->celular ?>?text=Ol%C3%A1%2C%20vejo%20que%20voc%C3%AA%20respondeu%20%C3%A0%20minha%20publica%C3%A7%C3%A3o%20%22<?php echo $conta->myUrlEncode($rg[$j]->titulo) ?>%22."><?php echo $r[$i]->celular ?></a></h4>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php } ?>
			</div>
		</div><!--End .articles-->
		<?php 
		$conta->lerRespostas($rg[$j]->id); } ?>

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