<?php
	// 先进行数据库链接  引入数据库操作类
	function database(){
		require_once('./lib/mysql.class.php');
		// 链接数据库
		$configArr=array(
			'host'=>'localhost',
			'port'=>'3306',
			'user'=>'root',
			'passwd'=>'123456',
			'dbname'=>'test',
		);
		return $mysql=new MMysql($configArr);
	}
	
?>