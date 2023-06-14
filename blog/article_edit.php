<?php
	require './lib/admin.php';
	
	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();
	
	$id=$_GET['id'];
	
	$rows=$db->where(['id'=>$id])->select('article_list');
	$row=$rows[0];
	
	
	// 查询分类表,获取各种分类数据   分类名称  name
	$categories=$db->select('category_list');
	
	// 修改文章数据后,需要把数据更新到数据库
	if($_POST){
		$data=[
			'title'=>$_POST['title'],
			'pic'=>$_POST['pic'],
			'time'=>time(),
			'category'=>$_POST['category'],
			'content'=>$_POST['content'],
		];
		
		$db->where(['id'=>$id])->update('article_list',$data);
		
		header('Location:article.php');
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
    <title>文章管理</title>
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
		      <label for="">文章标题</label>
		      <input type="text" name="title" value="<?php echo $row['title'];?>" required class="form-control" id="exampleInputEmail1" placeholder="请输入文章标题">
		    </div>
		    <div class="form-group">
		      <label for="">文章缩略图</label>
		      <input type="file" name="pic" value=""  class="form-control" id="exampleInputPassword1" placeholder="请选择文章图片">
		    </div>
			<div class="form-group">
			  <label for="">文章分类</label>
			  <select name="category" class="form-control">
				<option value="">请选择</option>
				<?php foreach($categories as $category){ ?>
					<?php if($row['category']==$category['id']){ ?>
						<option value="<?php echo $category['id'];?>" selected><?php echo $category['name'];?></option>
					<?php }else{   ?>
						<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
					<?php }   ?>
					
				<?php }  ?>
			  </select>
			</div>
			
			<div class="form-group">
			  <label for="">文章内容</label>
			  <textarea name="content" id="" cols="30" rows="10" placeholder="请输入文章内容" class="form-control mb-3"><?php echo $row['content'];?></textarea>

		    <button type="submit" class="btn btn-primary mr-3">确定修改文章</button>
			<a href="./article.php"  class="btn btn-primary">取消</a>
			
		  </form>
	  </div>


    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>