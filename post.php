<?php include 'includes/header.php'; ?>
<?php 
    $id = $_GET['id'];
    
    $query = "SELECT * FROM posts WHERE id='$id'";
    $post = $db->select($query);

?>
    <?php if($post) :?>
    <?php while($row = $post->fetch_assoc()) :?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
           <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author'] ?></a></p>
            <p><?php echo $row['body']; ?></p>
        </div>	
    <?php endwhile;?>
    <?php else :?><p>No such a Post</p>
    <?php endif;?>
			
<?php include 'includes/footer.php'; ?>