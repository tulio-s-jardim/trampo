<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trampo</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="img/favicon.png" />
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top"">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" alt="Trampo"></a>
					<div class="nav navbar-top-links navbar-right">
						<button onclick="window.location.href='login.php'" class="btn btn-md btn-default botao-index"><b>Fazer Login</b></button>
					</div>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div class="div-index">
			<h2 class="subtitulo-index"><b>O que é "Trampo"?</b></h2>
			<p class="index-texto"><b>"Trampo" é uma ferramenta para contratação e prestação de serviços de curta duração, criada com o objetivo de atenuar um dos maiores problemas do Brasil: o desemprego. Além disso, ela fornece maior comodidade para quem a utiliza.</b></p>
		</div>
		<div class="div-index">
			<h2 class="subtitulo-index"><b>Como essa ferramenta funciona?</b></h2>
			<p class="index-texto"><b>Ela funciona basicamente como um canal de comunicação entre pessoas que querem contratar serviços de curta duração (como por exemplo a troca da resistência de um chuveiro) e pessoas que querem prestar serviços do mesmo tipo.</b></p>
		</div>
		<div class="div-index">
			<h2 class="subtitulo-index"><b>Quais são as categorias de serviços disponíveis?</b></h2>
			<p class="index-texto"><b> São várias categorias: jardinagem, elétrica, hidráulica, pintura, alvenaria, mecânica, transporte, buffet, babá e faxina.</b></p>
		</div>
		<div class="div-index">
			<h2 class="subtitulo-index"><b>Qual é o preço para se ter acesso à ferramenta?</b></h2>
			<p class="index-texto"><b>A ferramenta é gratuita, ou em forma de jargão brasileiro: "de grátis".</b></p>
		</div>
		<div class="div-index">
			<h2 class="subtitulo-index"><b>Ficou interessado? </b></h2>
			<div class="div-cadastra-index">
				<p class="index-texto"><b>Cadastre-se <a href="formularioCadastra.php" id="cadastra-index">neste link</a></b></p>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
	};
	</script>	
</body>
</html>