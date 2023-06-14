<?php
	// 先进行数据库链接  引入数据库操作类   并 创建数据库对象
	require './lib/public.php';
	$db=database();
	
	$id=$_GET['id'];
	// var_dump($id);
	// exit;
	
	// 查询分类表中的所有数据   和  文章表中的所有数据
	$categories=$db->select('category_list');
	
	
	$articles=$db->where(['id'=>$id])->select('article_list');
	$article=$articles[0];
	
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
		<h1><?php echo $article['title'];?></h1>
		<p>类别:
			<?php foreach($categories as $category){ ?>
				<?php if($category['id']==$article['category']){ ?>
					<?php echo $category['name'];?>
				<?php } ?>
			<?php } ?>
		</p>
		<p>发布时间 : <?php date_default_timezone_set("PRC"); echo date("Y-m-d H:i:s",$article['time']); ?></p>
		<p>正文:<?php echo $article['content'];?></p>
	</div>
	
	<!--第三方评论系统-->
	<div class="container mt-3">
		<!--PC版    // http://changyan.kuaizhan.com-->
		<div id="SOHUCS" sid="请将此处替换为配置SourceID的语句"></div>
		<script charset="utf-8" type="text/javascript" src="https://cy-cdn.kuaizhan.com/upload/changyan.js" ></script>
		<script type="text/javascript">
		window.changyan.api.config({
		appid: 'cyvwlnv1J',
		conf: 'prod_02bbac6703951b004664b63d6dc42f73'
		});
		</script>
	</div>






    <!-- 选项 1：jQuery 和 Bootstrap 集成包（集成了 Popper） -->
    <script src="./lib/jquery/jquery.js"></script>
    <script src="./lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.js"></script>

  </body>
</html>