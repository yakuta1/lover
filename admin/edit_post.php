<?php include 'includes/header.php'; ?>
<?php 
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];
    }
    
    $db = new Database;
    
    $query = "SELECT * FROM posts WHERE id='$post_id'";
    $post = $db->select($query)->fetch_assoc();
    
    $query = "SELECT * FROM categories";
    $cats = $db->select($query);

 if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $body = mysqli_real_escape_string($db->link,$_POST['body']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
    $cat = mysqli_real_escape_string($db->link,$_POST['category']);
   
   if($title==''){
    $error = "Empty fields are not allowed!";
   }else{
    $query = "UPDATE posts SET 
        title = '$title',
        body = '$body',
        author = '$author',
        tags = '$tags',
        category = '$cat'  WHERE id='$post_id'";
    $db->update($query);
   }
 }  
 
 if (isset($_POST['delete'])){
    $query = "DELETE FROM posts WHERE id='$post_id'";
    $db->delete($query);
 }
 
?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $post_id; ?>">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title'] ?>">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body">
    <?php echo $post['body'] ?>
    </textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
		<?php while($row = $cats->fetch_assoc()) :?>
            <?php if($row['id'] == $post['category']):?>
            <option value="<?php echo $row['id']; ?>" selected="selected"><?php echo $row['name'] ?></option>
            <?php else :?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
            <?php endif; ?>       
                        
        <?php endwhile; ?>
		
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author'] ?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'] ?>">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
	
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>