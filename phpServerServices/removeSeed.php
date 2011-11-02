<?php
include_once 'startUp.php';
include_once 'MSQL.php';

if ($_POST)
{
	$plantedTime = $_POST['plantedTime'];
	
	//	Связываемся с БД.
	$msql = MSQL::Instance();
	$msql->dbConfig('matmac');
	
	$param = array($plantedTime);
	
	//	Запрос.
	$query = "DELETE
			  FROM `seeds`
			  WHERE `plantedTime` = ?";

	//	Выполняем и обрабатываем результат.
	$results = $msql->insUpDelPrepare($query, $param);
	
	if ($results)
		include 'views/noObjects.php';
	else
		include 'views/noObjects.php';
}
?>
