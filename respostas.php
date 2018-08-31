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