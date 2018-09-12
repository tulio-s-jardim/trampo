<?php
include_once('header.php');

$p = $conta->viewPublicacao($_GET['id']);
$r = $conta->viewResposta($_GET['id'], $_GET['conta']);
if(isset($_POST['sim'])) {
	if($_GET['conta'] != $_SESSION['id'])
		$conta->resolve($_GET['id'], $_GET['conta'], $_POST['nota']);
	else
		$conta->resolve($_GET['id'], $_GET['conta'], NULL);
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
		<?php if(!$conta->respondido($_GET['id'])) { ?>
		<div class="panel panel-default pnl-sem-titulo">
			<div class="panel-heading"><?php echo $p->titulo ?></div>
			<div class="panel-body">
				<div class="col-md-12 justify-content-md-center">
					<form role="form" action="concluido.php?id=<?= $_GET['id']; ?>&conta=<?= $_GET['conta']; ?>" method="post">
						<?php if($_GET['conta'] != $_SESSION['id']) { ?>
						<div class="form-group">
							<h4><label>Que nota você daria para <?= $r->nome . ' ' . $r->sobrenome ?>?</label></h4>
							<select name="nota" class="form-control" required>
								<option value='0'>0</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10' selected>10</option>
							</select>
						</div>
						<?php } ?>
						<h4><label>Você tem certeza que <?= $r->nome . ' ' . $r->sobrenome ?> resolveu sua publicação "<?= $p->titulo ?>"?</label></h4>
						<button name="sim" class="btn-primary btn btn-lg" type="submit">Sim</button>
						<a class="btn-muted btn btn-lg" href="javascript:history.back()">Não</a>
					</form>
				</div>
			</div>
		</div><!-- /.panel-->
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