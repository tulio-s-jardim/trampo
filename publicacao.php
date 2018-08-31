<?php
include_once('header.php');

$p = $conta->viewPublicacao($_GET['id']);
$r = $conta->viewRespostas($_GET['id']);
if(isset($_POST['responde'])) {
	$conta->insereResposta($_GET['id']);
	echo "<meta http-equiv='refresh' content='0'>";
} else if(isset($_POST['excluir'])) {
	$conta->deletaResposta($_GET['id']);
	echo "<meta http-equiv='refresh' content='0'>";
}
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
						<div class="panel-body sucesso">
							<p><b>Publicação criada com sucesso!</b></p>
						</div>
					</div>
				</div>
			<?php } ?>
				<div class="col-md-6 form-group">
					<label>Contratante</label>
					<p><a href="perfil?id=<?= $p->conta_id ?>"><?php echo $p->pnome ?></a></p>
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
					<form role="form" action="publicacao.php?id=<?= $_GET['id']; ?>" method="post">
						<?php if(!$conta->respondi($_GET['id'])) { ?>
						<button name="responde" class="btn-primary btn btn-lg" type="submit">Responder Publicação</button>
						<?php } else { ?>
						<button name="excluir" class="btn-primary btn btn-lg" type="submit">Excluir minha resposta</button>
						<?php }?>
					</form>
				</div>
				<?php if($p->status != 0) {
					$cp = $conta->viewPublicacaoCompleta($_GET['id']); ?>
				<div class="col-md-6 justify-content-md-center">
					<p>Completo por <?= '<a href="perfil.php?id='.$cp->id.'">'.$cp->nome.' '.$cp->sobrenome.'</a>' ?></p>
				</div>
				<?php } ?>
			</div>
		</div><!-- /.panel-->
		
		<?php if(sizeof($r) > 0 && $p->conta_id == $_SESSION['id']) { ?>
		<div class="panel panel-default articles">
			<div class="panel-heading">
				Quem topa o serviço
				<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body articles-container">
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-4 col-md-4 date">
								<h4><b>Nome</b></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Serviços Prestados</b></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Média como Prestador</b></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Número de Celular</b></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><b>Contratado e Resolvido?</b></h4>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div><!--End .article-->
				<?php
				for($i=0;$i<sizeof($r);$i++) { 
					$contaX = new Conta();
					$contaX->setId($r[$i]->id);
					$pX = $contaX->viewServPrestados($r[$i]->id);?>
				<div class="article border-bottom">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-4 col-md-4 date">
								<h4><a href="perfil?id=<?= $r[$i]->id ?>"><?php echo $r[$i]->nome . " " . $r[$i]->sobrenome  ?></a></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><?php echo sizeof($pX) ?></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><?php echo $contaX->viewRecomendacoesPrestador()->n*10 ?></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><a href="https://wa.me/55<?php echo $r[$i]->celular ?>?text=Ol%C3%A1%2C%20vejo%20que%20voc%C3%AA%20respondeu%20%C3%A0%20minha%20publica%C3%A7%C3%A3o%20%22<?php echo $conta->myUrlEncode($p->titulo) ?>%22."><?php echo $r[$i]->celular ?></a></h4>
							</div>
							<div class="col-xs-2 col-md-2 date">
								<h4><a class="btn btn-primary" href="concluido?id=<?= $_GET['id'] ?>&conta=<?= $contaX->view()->id ?>">Sim</a></h4>
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