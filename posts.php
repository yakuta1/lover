<?php include 'includes/header.php'; ?>
<?php 
    if (isset($_GET['category'])){
        $cat_name = $_GET['category'];                
        $query = "SELECT * FROM posts WHERE category='$cat_name'";
        $select_posts = $db->select($query);       
              
    }else{
        $query = "SELECT * FROM posts";
        $select_posts = $db->select($query);
    }
    
    
    
?>

    <?php if($select_posts) : ?> 
    <?php while($row = $select_posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="post.php?id=<?php echo urlencode($row['id']); ?>"><?php echo $row['title'] ?></a></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author'] ?></a></p>
            <p><?php echo shortenText ($row['body']); ?></p>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
        </div>
    
    <?php endwhile; ?>
    <?php else : ?> 
        <h3>There are no posts yet</h3>
    <?php endif; ?>  
    
       
<?php include 'includes/footer.php'; ?>