<?php

$nome = htmlspecialchars($_REQUEST['nome']);
$placa = htmlspecialchars($_REQUEST['placa']);
$marca = htmlspecialchars($_REQUEST['marca']);
$modelo = htmlspecialchars($_REQUEST['modelo']);
$ano_modelo = htmlspecialchars($_REQUEST['ano_modelo']);
$km_atual = htmlspecialchars($_REQUEST['km_atual']);

include '../../conn/conn.php';

$sql = "insert into veiculo(nome,placa,marca,modelo,ano_modelo , km_atual) values('$nome','$placa','$marca','$modelo' , $ano_modelo , $km_atual)";
$result = @mysql_query($sql);

if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'nome' => $nome,
		'placa' => $placa,
		'marca' => $marca,
		'modelo' => $modelo,
		'ano_modelo' => $ano_modelo,
		'km_atual' => $km_atual
	));
} else {
	echo json_encode(array('errorMsg'=>'Erro:'));
}
?>