<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

include '../../conn/conn.php';

$rs = mysql_query("select count(*) from veiculo_aluguel");
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];
$rs = mysql_query("select va.id ,va.motorista_id ,va.veiculo_id , m.nome as nome_motorista , v.nome as nome_veiculo , v.placa , va.km_inicial , va.data_hora_inicio , va.data_hora_fim , va.km_final from veiculo_aluguel as va left join veiculo as v on va.veiculo_id = v.id left join motorista as m on m.id = va.motorista_id limit $offset,$rows");

$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>