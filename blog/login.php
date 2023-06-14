<?php
	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();
	
	if($_POST){
		$username=$_POST['username'];
		$psw=$_POST['psw'];
		
		// admin   123
		// md5(md5($psw).$salt)
		
		if($username && $psw){
			// 获取用户对应的salt	
				// var_dump($username);	
			$rows=$db->where(['username'=>'"'.$username.'"'])->select('user_list');
			$row=$rows[0];


			$psw=md5(md5($psw).$row['salt']);
			if($psw==$row['psw']){
				setcookie('login_flag','1',time()+3000);
				//判断用户是否是管理员身份是，就跳转到后天页面，不是就跳转到前台页面
				if($row['username']=='admin'){
					header("Location:category.php");
				}else{
					header('Location:index.php');
				}
				
			} else {
				echo "<script>alert('输入的密码错误或账号不存在'); window.location.href='login.php'; </script>";
			}
		}
	}
	
?>


<!doctype html>
<html lang="zh-CN">
  <head>
    <!-- 必须的 meta 标签 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 的 CSS 文件 -->
    <link rel="stylesheet" href="./lib/bootstrap-4.6.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="./lib/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="./css/cursor.css">
	<style>
		form{
			width:500px;
			height:300px;
			position:absolute;
			top:50%;
			left:50%;
			transform:translate(-50%,-50%);
		}
	</style>

    <title>登录</title>
  </head>
  <body>
    <div class="container">
		<form class="border rounded-lg text-center p-3" method="post">
			<h2>登 录</h2>
		  <div class="form-row align-items-center">
		    <div class="col-12 mt-3">
		      <label class="sr-only" for="">Username</label>
		      <div class="input-group mb-2">
		        <div class="input-group-prepend">
		          <div class="input-group-text">
					<i class="bi bi-person-circle"></i>
				  </div>
		        </div>
		        <input type="text" name="username" class="form-control" placeholder="Username" required>
		      </div>
		    </div>	
			<div class="col-12 mt-3">
			  <label class="sr-only" for="">Username</label>
			  <div class="input-group mb-2">
			    <div class="input-group-prepend">
			      <div class="input-group-text">
					<i class="bi bi-key-fill"></i>
				  </div>
			    </div>
			    <input type="password" name="psw" class="form-control" placeholder="password" required>
			  </div>
			</div>
		    <div class="col-12 my-3">
		      <button type="submit" class="btn btn-primary form-control">登 录</button>
		    </div>
		  </div>
		  <p>
			如果还没注册,请先<a href="./register.php" class="text-danger"><strong>注册</strong></a>!
		  </p>
		</form>
	</div>
	
	

    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>