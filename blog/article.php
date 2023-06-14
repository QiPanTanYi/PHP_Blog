<?php
	require './lib/admin.php';

	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();
	 
	// 查询分类表中的所有数据       article_list中的category---------category_list中的id------name
	$result=$db->select('article_list');
	// var_dump($result);
	// exit;
	
	$categories=$db->select('category_list');
	$article_categories=[];
	foreach($categories as $category){
		$article_categories[$category['id']]=$category;
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
		          <a class="nav-link" href="./article.php">文章表</a>
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
	  
	  <!-- 表格 -->
	  <div class="container mt-5">
		  <a href="./article_add.php" class="btn btn-primary">添加文章</a>
		  <table class="table table-striped table-bordered mt-3">
		    <thead  class="bg-warning">
		      <tr>
		        <th scope="col" style="width:5%;">文章序号</th>
		        <th scope="col" style="width:10%;">文章标题</th>
		        <th scope="col" style="width:5%;">文章缩略图</th>
				<th scope="col" style="width:5%;">文章类别</th>
				<th scope="col" style="width:10%;">文章创建时时间</th>
				<th scope="col" style="width:50%;">文章内容</th>
		        <th scope="col" style="width:15%;">操作</th>
		      </tr>
		    </thead>
		    <tbody>
				
				<?php $i=0;foreach($result as $row){ ?>
					<tr>
					  <th scope="row"><?php $i++;echo $i; ?> </th>
					  <td><?php echo $row['title']; ?></td>
					  <td><img src="./img/<?php echo $row['pic']; ?>" alt="" style="height:50px;"></td>
					  <td><?php echo $article_categories[$row['category']]['name']; ?></td>
					  
					  <td><?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i:s",$row['time']); ?></td>
					  <td><?php echo $row['content']; ?></td>
					  <td>
							<a href="./article_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
							<a href="./article_del.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
					  </td>
					</tr>
				<?php } ?>
		      
		    </tbody>
		  </table>
	  </div>
	 
	  
	  
	 


    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>