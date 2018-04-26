<?php

$motorista_id = htmlspecialchars($_REQUEST['motorista_id']);
$veiculo_id = htmlspecialchars($_REQUEST['veiculo_id']);
$data_hora_inicio = htmlspecialchars($_REQUEST['data_hora_inicio']);
$km_inicial = htmlspecialchars($_REQUEST['km_inicial']);
$data_hora_fim = htmlspecialchars($_REQUEST['data_hora_fim']);
$km_final = htmlspecialchars($_REQUEST['km_final']);

include '../../conn/conn.php';

$sql = "insert into veiculo_aluguel(motorista_id,veiculo_id,data_hora_inicio,km_inicial,data_hora_fim , km_final) values($motorista_id,$veiculo_id,'$data_hora_inicio',$km_inicial , '$data_hora_fim' , $km_final)";
$result = @mysql_query($sql);

if ($result){
	echo json_encode(array(
			'id' => mysql_insert_id(),
			'motorista_id' => $motorista_id,
			'veiculo_id' => $veiculo_id,
			'data_hora_inicio' => $data_hora_inicio,
			'km_inicial' => $km_inicial,
			'data_hora_fim' => $data_hora_fim,
			'km_final' => $km_final
	));
} else {
	echo json_encode(array('errorMsg'=>'Erro:'));
}
?>