<?php 
		
		try 
		{
			$db=new PDO("mysql:host=localhost:3306;dbname=nedmin",'root','lenovo123');	
			$db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
		} 
		catch (PDOException $e) 
		{
			echo $e->getmessage();
		}

 ?>