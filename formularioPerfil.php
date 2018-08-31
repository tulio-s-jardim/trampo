<?php
	include_once('header.php');

	$flag = 0;

	if(isset($_POST['senha_atual']) && isset($_POST['senha_nova']) && isset($_POST['senha_confirmar'])){
		if(sha1($_POST['senha_atual'] == $c->senha)){
			$conta->setEmail($_POST['email']);
			$conta->setCelular($_POST['celular']);
			$conta->setBairro_id($_POST['bairro']);
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
				<li class="active">Perfis</li>
				<li class="active">Meu Perfil</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Meu Perfil</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">Editar Perfil</div>
				<div class="panel-body">
					<form role="form" action="formularioPerfil.php" method="post">
						<?php
							if($flag == 1){ ?>
								<div class="panel-body fracasso">
									<p><b>A senha atual não foi informada corretamente</b></p>
								</div>
							<?php }
							else if($flag == 2){ ?>
								<div class="panel-body fracasso">
									<p><b>A nova senha não é a mesma que a senha confirmada<p></p>
								</b>
							<?php }
						?>
						<div class="form-group">
							<input class="form-control" name="email" type="email" autofocus="" value="<?= $c->email?>" required>
						</div>
						<div class="form-group">
							<input class="form-control" name="celular" type="number" autofocus="" value="<?= $c->celular ?>" required>
						</div>
						<div class="form-group">
							<input class="form-control" name="bairro" type="text" autofocus="" value="<?= $c->bairro_id ?>" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Senha atual" name="senha_atual" type="password" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Nova senha" name="senha_nova" type="password">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Confirmar nova senha" name="senha_confirmar" type="password">
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