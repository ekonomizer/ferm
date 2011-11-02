<?php
function startup($class)
{
	Switch($class)
	{
		case 'ferm':
			// Настройки подключения к БД.
			$hostName = 'localhost'; 
			$userName = 'andrey'; 
			$password = '1';
			$dbName = 'ferm';
			break;
	}
	
	// Языковая настройка.
	//setlocale(LC_ALL, 'ru_RU.CP1251');	
	setlocale(LC_ALL, 'ru_ru.UTF8');	
	
	// Подключение к БД.
	mysql_connect($hostName, $userName, $password) or die('No connect with data base'); 
	mysql_select_db($dbName) or die('No data base');
	
	// Устанавливаем кодировку.
	mysql_query("SET CHARSET utf8");
	mysql_query ("SET COLLATION_CONNECTION=utf8");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	mysql_query("SET CHARACTER_SET_CONNECTION=utf8");
	mysql_query('SET NAMES utf8');

	mysql_set_charset('utf8');
	
	
	/*mysql_query('SET NAMES cp1251');
	$charset = mysql_client_encoding();
	printf ("current character set is %s\n", $charset);
	*/
	
	
	// Открытие сессии.
	//session_start();	
}