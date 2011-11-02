<?php
include_once 'startUp.php';
include_once 'MSQL.php';

if($_POST)
{
	$objectName = $_POST['objectName'];
	$x = $_POST['x'];
	$y = $_POST['y'];
	$plantedTime = $_POST['plantedTime'];
		
	$msql = MSQL::Instance();
	$msql->dbConfig('matmac');
	
	//	Готовим параметры.
	$param = array($objectName, $x, $y, $plantedTime);
	
	//	Запрос.
	$query = "INSERT
			  INTO `seeds` (`objectName`, `x`, `y`, `plantedTime`) VALUES (?, ?, ?, ?)";
	
	$results = $msql->insUpDelPrepare($query, $param);	
}
?>



