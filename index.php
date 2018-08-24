<?php 
include_once('headerIndex.php');
?>		
	<div class="container">
		<h2><b>O que é "Trampo"?</b></h2>
		<p class="index-texto"><b>"Trampo" é uma ferramenta para contratação e prestação de serviços de curta duração, criada com o objetivo de atenuar um dos maiores problemas do Brasi: o desemprengo, além de fornecer maior comodidade para quem a utiliza.</b></p>
		<h2><b>Mas como essa ferramenta funciona?</b></h2>
		<p class="index-texto"><b>Ela funciona basicamente como um canal de comunicação entre pessoas que querem contratar serviços de curta duração (como por exemplo a troca da resistência de um chuveiro) e pessoas que querem prestar serviços do mesmo tipo.</b></p>
		<h2><b>Quais são as categorias de serviços disponíveis?</b></h2>
		<p class="index-texto"><b> São várias categorias: jardinagem, elétrica, hidráulica, pintura, alvenaria, mecânica, transporte, buffet, babá e faxina.</b></p>
		<h2><b>Qual é o preço para se ter acesso à ferramenta?</b></h2>
		<p class="index-texto"><b>A ferramenta é gratuita, ou em forma de jargão brasileiro: "de grátis"</b></p>
		<h2><b>Ficou interessado? </b></h2>
		<p class="index-texto"><a href="formularioCadastra.php">Cadastre-se aqui</a></p>


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