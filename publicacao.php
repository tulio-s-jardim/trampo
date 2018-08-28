<?php 
include_once('php/functions.php');

$conta = new Conta();
$conta->setId(1);
$p = $conta->viewPublicacao($_GET['id']);
$r = $conta->viewRespostas($_GET['id']);

include_once('header.php');
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
		
		<div class="panel panel-default pnl-sem-titulo">
			<div class="panel-heading"><?php echo $p->titulo ?></div>
			<div class="panel-body">
			<?php if(isset($_POST['cria'])) {?>
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body sucesso" style="background-color: #b9db87; border-radius: 10px;">
							<p style=" color: #111; margin: auto"><b>Publicação criada com sucesso!</b></p>
						</div>
					</div>
				</div>
			<?php } ?>
				<div class="col-md-6 form-group">
					<label>Contratante</label>
					<p><?php echo $p->pnome ?></p>
				</div>
				<div class="col-md-6 form-group">
					<label>Categoria</label>
					<p><?php echo $p->cnome ?></p>
				</div>
				<div class="col-md-12 form-group">
					<label>Descrição</label>
					<p><?php echo $p->descricao ?></p>
				</div>
				<div class="col-md-6 justify-content-md-center">
					<button name="cria" class="btn-primary btn btn-lg" type="submit" required>Responder Publicação</button>
				</div>
				<?php if($p->status != 0) { ?>
				<div class="col-md-6 justify-content-md-center">
					<p>Completo por x</p>
				</div>
				<?php } ?>
			</div>
		</div><!-- /.panel-->
		
		<?php if(sizeof($r) > 0) { ?>
		<div class="panel panel-default articles">
			<div class="panel-heading">
				Quem topa o serviço
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-6 col-md-6 date">
								<h4><b>Nome</b></h4>
							</div>
							<div class="col-xs-6 col-md-6 date">
								<h4><b>Número de Celular</b></h4>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php
				for($i=0;$i<sizeof($r);$i++) { ?>
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-6 col-md-6 date">
								<h4><?php echo $r[$i]->nome ?></h4>
							</div>
							<div class="col-xs-6 col-md-6 date">
								<h4><a href="https://wa.me/55<?php echo $r[$i]->celular ?>?text=Ol%C3%A1%2C%20vejo%20que%20voc%C3%AA%20respondeu%20%C3%A0%20minha%20publica%C3%A7%C3%A3o%20%22<?php echo $conta->myUrlEncode($p->titulo) ?>%22."><?php echo $r[$i]->celular ?></a></h4>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php } ?>
			</div>
		</div><!--End .articles-->
		<?php } ?>

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