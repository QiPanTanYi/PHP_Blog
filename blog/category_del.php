<?php
	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();	
	
	// 被删除的id值是多少？
	$id=$_GET['id'];
	
	$db->where(['id'=>$id])->delete('category_list');
	
	header('Location:category.php');

?>