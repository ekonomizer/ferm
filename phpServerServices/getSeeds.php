<?php
include_once 'startUp.php';
include_once 'MSQL.php';

if ($_POST)
{
	//	Связываемся с БД.
	$msql = MSQL::Instance();
	$msql->dbConfig('matmac');
	
	//	Запрос.
	$query = "SELECT *
			  FROM `seeds`";
	$param = array();
	
	//	Выполняем и обрабатываем результат.
	$results = $msql->selectPrepare($query, $param);
	
	//	Отправлем результат в XML формате.
	if ($results)
		include 'views/previosWorld.php';
	else
		include 'views/noObjects.php';
}
?>
