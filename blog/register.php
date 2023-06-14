
<?php
	header('Content-Type: text/html; charset=utf-8');
	// 先进行数据库链接  引入数据库操作类   并创建数据库对象
	require './lib/public.php';
	$db=database();
	
	if($_POST){
		$username=$_POST['username'];
		$psw=$_POST['psw'];
		
		$salt=md5(random_bytes(32));
		
		$data=[
			'username'=>$username,
			'psw'=>md5(md5($psw).$salt),
			'salt'=>$salt,
		];
		//查询数据库中的所有用户
		$rows=$db->where(['username'])->select('user_list');
		//判断是否重名
		foreach($rows as $row){
			if($data['username']==$row['username']){
				echo "<script type='text/javascript'>alert('用户名已经存在,请重新注册'); window.location.href='register.php'; </script>";
				exit;
			}
		}
		
		// md5     md5(md5(psw)+salt)
		$db->insert('user_list',$data);
		
		// 重名？？？
		
		
		
		// 跳转
		echo "<script type='text/javascript'>alert('注册成功,点击确定到登陆页面'); window.location.href='login.php'; </script>";
		// header('Location:login.php');
		exit;
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

    <title>注册</title>
  </head>
  <body>
    <div class="container">
		<form class="border rounded-lg text-center p-3" method="post">
			<h2>注 册</h2>
		  <div class="form-row align-items-center">
		    <div class="col-12 mt-3">
		      <label class="sr-only" for="inlineFormInputGroup">Username</label>
		      <div class="input-group mb-2">
		        <div class="input-group-prepend">
		          <div class="input-group-text">
					<i class="bi bi-person-circle"></i>
				  </div>
		        </div>
		        <input type="text" class="form-control" name="username" id="inlineFormInputGroup" placeholder="Username" required>
		      </div>
		    </div>	
			<div class="col-12 mt-3">
			  <label class="sr-only" for="inlineFormInputGroup">Username</label>
			  <div class="input-group mb-2">
			    <div class="input-group-prepend">
			      <div class="input-group-text">
					<i class="bi bi-key-fill"></i>
				  </div>
			    </div>
			    <input type="password" class="form-control" name="psw" id="inlineFormInputGroup" placeholder="password" required>
			  </div>
			</div>
		    <div class="col-12 my-3">
		      <button type="submit" class="btn btn-primary form-control">注 册</button>
		    </div>
		  </div>
		  <p>
			如果已经注册,请直接<a href="./login.php" class="text-danger"><strong>登录</strong></a>!
		  </p>
		</form>
	</div>
	
	

    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>