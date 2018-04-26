<?php

include '../../conn/conn.php';


$rs = mysql_query("select id, nome from motorista ");

$items = array();
while($row = mysql_fetch_object($rs)){
	array_push($items, $row);
}
$result = $items;

echo json_encode($result);

?>