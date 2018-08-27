<?php 
include_once('php/conta.php');

$conta = new Conta();
$conta->setId(1);

if(isset($_POST['cria'])) {
	$conta->criaPublicacao($_POST['categoria'], $_POST['titulo'], $_POST['descricao']);
}
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
			<div class="panel-heading">Criar Publicação</div>
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
				<form name="cria" method="post" action="criaPublicacao.php" enctype="multipart/form-data">
					<div class="col-md-12 form-group">
						<label>Categoria</label>
						<select name="categoria" class="form-control"  required>
							<?php
							$cat = $conta->viewCategorias();
							for($i=0;$i<sizeof($cat);$i++) { ?>
								<option value="<?php echo $cat[$i]->id ?>"><?php echo $cat[$i]->nome; ?></option>
							<?php }?>
						</select>
					</div>
					<div class="col-md-12 form-group">
						<label>Título</label>
						<input type="text" class="form-control" name="titulo" maxlength="255" required>
					</div>
					<div class="col-md-12 form-group">
						<label>Descrição</label>
						<textarea class="form-control" name="descricao" cols="30" rows="10" required></textarea>
					</div>
					<div class="col-md-12 justify-content-md-center">
						<button name="cria" class="btn-primary btn btn-lg" type="submit" required>Criar Publicação</button>
					</div>
				</form>
			</div>
		</div><!-- /.panel-->
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