<?php 
include_once('header.php');
$cat = $conta->viewCategoria($_GET['catid']);
$area = '';

if(isset($_POST['regiao'])) {
	if($_POST['regiao']==1) {
		$area = substr($c->cep, 0, 5);
	} else if($_POST['regiao']==2) {
		$area = substr($c->cep, 0, 3);
	} else if($_POST['regiao']==3) {
		$area = substr($c->cep, 0, 1);
	}
}
$s = $conta->viewPublicacoesArea($_GET['catid'], $area.'%');

?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Publicações</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Publicações - <?= $cat->nome ?></h1>
			</div>
		</div><!--/.row-->
		<div class="panel panel-default articles">
			<div class="panel-heading">
				Serviços Solicitados
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 form-group">
						<label>Área de Alcance</label>
						<form role="form" method="post" name="filtro" action="publicacoes.php?catid=<?= $_GET['catid'] ?>">
							<select name="regiao" class="form-control" onchange="this.form.submit()">
								<option value="0">Qualquer uma</option>
								<option value="1" <?= strlen($area)==5?"selected":"" ?>>Minha Cidade</option>
								<option value="2" <?= strlen($area)==3?"selected":"" ?>>Meu Polo</option>
								<option value="3" <?= strlen($area)==1?"selected":"" ?>>Meu Estado</option>
							</select>
						</form>
					</div>
				</div>
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
								<h4><a href="publicacao.php?id=<?= $s[$i]->pid ?>"><?= $s[$i]->titulo ?></a></h4>
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