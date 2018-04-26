<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include '../../conn/conn.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$nomePesquisa= isset($_POST['nomePesquisa']) ? mysql_real_escape_string($_POST['nomePesquisa']) : '';
$cnhPesquisa = isset($_POST['cnhPesquisa']) ? mysql_real_escape_string($_POST['cnhPesquisa']) : '';

$offset = ($page-1)*$rows;

$result = array();

$where = "nome like '$nomePesquisa%' and cnh like '$cnhPesquisa%'";
$rs = mysql_query("select count(*) from motorista where " . $where);
$row = mysql_fetch_row($rs);
$result["total"] = $row[0];

//$rs = mysql_query("select count(va.id) as quantidade , m.id as id, nome, cnh, rg,cpf,data_nascimento,data_hora_cadastro from motorista as m left join veiculo_aluguel as va on m.id = va.motorista_id where " . $where . " group by m.nome, va.id limit  $offset ,$rows" );

$rs = mysql_query("select id, nome, cnh, rg,cpf,data_nascimento,data_hora_cadastro from motorista where " . $where . " limit $offset,$rows");

$items = array();
while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>