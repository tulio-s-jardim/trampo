<?php
	// set feed URL
	$url = 'https://api.postmon.com.br/v1/cep/31?format=xml';
	echo $url."<br />";

	$sxml = simplexml_load_file($url)
	// then you can do
	var_dump($sxml);

	$estado = $sxml->{'estado_info'}->nome;

	echo "<script type='text/javascript'>alert('$estado');</script>";
?>