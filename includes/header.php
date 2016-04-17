<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<?php $db = new Database();
    
    $query = "SELECT * FROM posts";
    $posts = $db->select($query);
    
    $query = "SELECT * FROM categories";
    $cats = $db->select($query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script>
new WOW().init();
</script>
	<title>Lover</title>
</head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
		  <a class="blog-nav-item pull-right" href="admin">Admin</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
		<div class="logo"><img src="images/logo.png" /></div>
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">PHP News, tutorials, videos & more</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">