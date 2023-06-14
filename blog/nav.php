<?php
	// 先进行数据库链接  引入数据库操作类，并创建数据库对象
	require './lib/public.php';
	$db=database();
	
	// 查询分类表中的所有数据   和  文章表中的指定的数据
	$categories=$db->select('category_list');
	
	$id=$_GET['id'];
	// var_dump($id);
	// exit;
	
	$articles=$db->where(['category'=>$id])->select('article_list');
	
?>

<!doctype html>
<html lang="zh-CN">
  <head>
    <!-- 必须的 meta 标签 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 的 CSS 文件 -->
    <link rel="stylesheet" href="./lib/bootstrap-4.6.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="./css/cursor.css">
    <title>index.php</title>
  </head>
  <body>  
	<!--// 导航条-->
	<div class="bg-primary ">
	  <nav class="container navbar navbar-expand-lg navbar-light bg-primary ">
			<a class="navbar-brand text-white" href="./index.php">
			TanZ的个人博客
			</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarNav">
		  <ul class="navbar-nav">
			<!--// 遍历分类表,获取分类表中的name值  作为首页的导航项的内容-->
			<?php foreach($categories as $category){ ?>
				<li class="nav-item">
				  <a class="nav-link text-white ml-3" href="nav.php?id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
				</li>
			<?php } ?>
		  </ul>
		  <ul class="navbar-nav ml-auto">
			<li class="nav-item active">
			  <a class="nav-link text-white" href="./login.php">后台页面</a>
			</li>
		  </ul>
		</div>
	  </nav>
	</div>
	
	<!--//文章展示-->
	<div class="container mt-3">
		<div class="row">
			<?php foreach($articles as $article){ ?>
				<div class="col-12 border rounded">
					<div class="media">
					  <img src="./img/<?php echo $article['pic'];?>" class="mr-3" alt="..." style="width:180px;height:150px;">
					  <div class="media-body">
					    <h5 class="mt-0">
							
							<?php foreach($categories as $category){ ?>
								<?php if($category['id']==$article['category']){ ?>
									<button class="btn btn-primary btn-sm"><?php echo $category['name'];?></button>
								<?php } ?>
							<?php } ?>
							
							
							<a href="pages.php?id=<?php echo $article['id'];?>"><?php echo $article['title'];?></a>
						</h5>
					    <p><?php echo $article['content'];?></p>
						<time><?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i:s",$article['time']); ?></time>
					  </div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>






    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>