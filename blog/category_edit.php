<?php
	require './lib/admin.php';
	
	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();
	
	// 获取需要被修改记录对应的id值
	$id=$_GET['id'];
	
	// 查询数据库,获取对应id的记录值   结果是数组类型
	$rows=$db->where(['id'=>$id])->select('category_list');
	$row=$rows[0];
	// var_dump($rows,$row);
	// exit;
	
	// 把修改后的数据写回到数据库    更新	
	// 获取更新后的表单数据
	if($_POST){
		$data=[
			'name'=>$_POST['name'],
			'eng'=>$_POST['eng']
		];
		
		// 更新
		$db->where(['id'=>$id])->update('category_list',$data);
		
		// 跳转回分类表页面
		header('Location:category.php');
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
    <title>分页管理</title>
  </head>
  <body>
	  <!-- 导航条 -->
	  <div class="bg-light">
		  <nav class="container navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="./category.php">
          <img src="./img/000.jpg" alt="" style="width: 50px; height: 50px;">
        </a>	
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item active">
		          <a class="nav-link" href="./category.php">分类表 <span class="sr-only">(current)</span></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="./arctile.php">文章表</a>
		        </li>	 
		      </ul>
			  <ul class="navbar-nav ml-auto">
			    <li class="nav-item active">
			      <a class="nav-link" href="./index.php">前台页面</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="./login.php">退出后台</a>
			    </li>	 
			  </ul>
		    </div>
		  </nav>
	  </div>
	  
	  <!-- // 添加分类表单 -->
	  <div class="container mt-5">
		  <form method="POST">
		    <div class="form-group">
		      <label for="">分类名称</label>
		      <input type="text" name="name" value="<?php echo $row['name']; ?>" required class="form-control" id="exampleInputEmail1" placeholder="请输入分类名称">
		    </div>
		    <div class="form-group">
		      <label for="">分类英文名称</label>
		      <input type="text" name="eng" value="<?php echo $row['eng']; ?>"  class="form-control" id="exampleInputPassword1" placeholder="请输入分类英文名称">
		    </div>

		    <button type="submit" class="btn btn-primary mr-3">确定修改分类</button>
			<a href="./category.php"  class="btn btn-primary">取消</a>
			
		  </form>
	  </div>


    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>