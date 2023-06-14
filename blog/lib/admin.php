	<?php
	// 检查用户是否登录
	if(!isset($_COOKIE['login_flag']) || $_COOKIE['login_flag']!=1){
		header('Location:login.php');
		exit;
	}
	
	?>