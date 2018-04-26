<?php

$conn = @mysql_connect('localhost','root','dev123456');
if (!$conn) {
	die('Erro ao conectar na base de dados: ' . mysql_error());
}
mysql_select_db('prova_fusiondms', $conn);

?>