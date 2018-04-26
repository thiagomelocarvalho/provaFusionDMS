<?php

$id = intval($_REQUEST['id']);
$nome = htmlspecialchars($_REQUEST['nome']);
$cnh = htmlspecialchars($_REQUEST['cnh']);
$cpf = htmlspecialchars($_REQUEST['cpf']);
$rg = htmlspecialchars($_REQUEST['rg']);
$data_nascimento = htmlspecialchars($_REQUEST['data_nascimento']);


include '../../conn/conn.php';

$sql = "update motorista set nome='$nome',cnh='$cnh',rg='$rg',cpf='$cpf' , data_nascimento='$data_nascimento' where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
			'id' => mysql_insert_id(),
			'nome' => $nome,
			'cnh' => $cnh,
			'rg' => $rg,
			'cpf' => $cpf,
			'data_nascimento' => $data_nascimento
	));
} else {
	echo json_encode(array('errorMsg'=>'Erro:'));
}
?>