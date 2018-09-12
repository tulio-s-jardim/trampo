<?php
	include_once('header.php');

	$flag = 0;

	if(isset($_POST['senha_atual']) && isset($_POST['senha_nova']) && isset($_POST['senha_confirmar'])){
		if(sha1($_POST['senha_atual'] == $c->senha)){
			$conta->setEmail($_POST['email']);
			$conta->setCelular($_POST['celular']);
			$conta->setCep($_POST['cep']);
			if($_POST['senha_nova'] == $_POST['senha_confirmar']){
				$conta->setSenha(sha1($_POST['senha_nova']));
				$conta->edit();
			}
			else{
				$flag = 2;
			}
		}
		else{
			$flag = 1;
		}
	}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Meu Perfil</li>
				<li class="active">Editar Perfil</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Editar Perfil</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-body">
					<form role="form" action="formularioPerfil.php" method="post">
						<?php
							if($flag == 1){ ?>
								<div class="panel-body fracasso form-group" align="center">
									<p><b>A senha atual não foi informada corretamente</b></p>
								</div>
							<?php }
							else if($flag == 2){ ?>
								<div class="panel-body fracasso form-group" align="center">
									<p><b>Nova senha e senha confirmada não são as mesmas</b></p>
								</div>
							<?php }
						?>
						<div class="form-group">
							<label>E-mail</label>
							<input class="form-control" name="email" type="email" autofocus="" value="<?= $c->email?>" required>
						</div>
						<div class="form-group">
							<label>Celular</label>
							<input class="form-control" name="celular" type="number" autofocus="" value="<?= $c->celular ?>" required>
						</div>
						<div class="form-group">
							<label>CEP</label>
							<input class="form-control" name="cep" type="text" autofocus="" value="<?= $c->cep ?>" required>
						</div>
						<div class="form-group">
							<label>Senha atual</label>
							<input class="form-control" name="senha_atual" type="password" required>
						</div>
						<div class="form-group">
							<label>Nova senha</label>
							<input class="form-control" name="senha_nova" type="password">
						</div>
						<div class="form-group">
							<label>Confirmar nova senha</label>
							<input class="form-control" name="senha_confirmar" type="password">
						</div>
						<button class="btn btn-primary cadastra" type="submit" name="alterar" required>Alterar</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
		
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