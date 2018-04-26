<?php

include '../../conn/conn.php';
	
	$id_motorista = mysql_real_escape_string($_REQUEST['id']);
	
	$rs = mysql_query("select v.id as id_veiculo ,v.nome as nome_veiculo , v.placa , v.marca , v.modelo, v.ano_modelo , v.km_atual , va.data_hora_inicio , va.data_hora_fim from veiculo as v left join veiculo_aluguel as va on v.id = va.veiculo_id where va.motorista_id = $id_motorista");

	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);


?>
