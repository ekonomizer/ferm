<?php
//
//	Помощник работы с БД.
//
class MSQL
{
	
	private static $instance; 	//	ссылка на экземпляр класса
	private $hostName; 			//	имя хоста
	private $userName; 			//	логин
	private $password; 			//	пароль
	private $dbName; 			//	имя БД		
	
	//
	//	Функция конфигурирования соединения PDO.
	//
	function dbConfig($config)
	{
		switch($config)
		{
			case 'ferm':
				$this->hostName = 'localhost';
				$this->userName = 'andrey';
				$this->password = '1';
				$this->dbName = 'ferm';
				break;
		}
	}
	
	//
	//	Получение единственного экземпляра (одиночка).
	//
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new MSQL();
	
		return self::$instance;
	}
	
	//
	//	Выборка строк через PDO методом Prepare.
	//	$query    	- полный текст SQL запроса.
	//	$param    	- набор параметров для запроса(делаем их безопасными от SQL-иньекций).
	//	результат	- класс($class) с заполнеными свойство класса - значение выбранного объекта.
	//
	public function selectPrepareToClass($query, $param, $class)
	{
		try
		{
			//	Создаем объект.
			$dbh = new PDO ('mysql:host=' . $this->hostName . ';
							 dbname=' . $this->dbName,
							 $this->userName, 
							 $this->password, 
							 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			//	Выбираем данные.
			$result = $dbh->prepare($query);
			
			$result->execute($param);
			
			if(!$result)
			{
				$dbh = null;
				return false;
			}
			
			//	Наполняем массив данными.
			$results = $result->fetchALL(PDO::FETCH_CLASS, $class);
			$dbh = null;
			return $results;
		}
		catch (Exception $e) 
		{ 
			echo $e->getMessage(); 
		}
	}

	//
	//	Выборка строк через PDO методом Prepare.
	//	$query    	- полный текст SQL запроса.
	//	$param    	- набор параметров для запроса(делаем их безопасными от SQL-иньекций).
	//	результат	- массив выбранных объектов.
	//
	public function selectPrepare($query, $param)
	{
		try
		{
			//	Создаем объект.
			$dbh = new PDO ('mysql:host=' . $this->hostName . ';
							 dbname=' . $this->dbName,
							 $this->userName, 
							 $this->password, 
							 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			//	Выбираем данные.
			$result = $dbh->prepare($query);
			
			$result->execute($param);
						
			if(!$result)
			{
				$dbh = null;
				return false;
			}
			
			//	Наполняем массив данными.
			while ($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$results[] = $row;
			}
						
			$dbh = null;
			return $results;
		}
		catch (Exception $e) 
		{ 
			echo $e->getMessage(); 
		}
	}
	
	
	//
	//	Вставка, обновление строк через PDO методом Prepare.
	//	$query    	- полный текст SQL запроса.
	//	$param    	- набор параметров для запроса(делаем их безопасными от SQL-иньекций).
	//	результат	- число обработанных строк.
	//
	public function insUpDelPrepare($query, $param)
	{
		try
		{
			//	Создаем объект.
			$dbh = new PDO ('mysql:host=' . $this->hostName . ';
							 dbname=' . $this->dbName,
							 $this->userName, 
							 $this->password, 
							 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			//	Выбираем данные.
			$result = $dbh->prepare($query);
			$result->execute($param);
			$row_affected = $result->rowCount();
			
			$dbh = null;			
			if($row_affected)
				return true;
			return false;
		}
		catch (Exception $e) 
		{ 
			echo $e->getMessage(); 
		}
	}	
}