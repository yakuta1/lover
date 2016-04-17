<?php include 'includes/header.php'; ?>
<?php
    $db = new Database;
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
    $query = "INSERT INTO posts (title, body, author, tags, category) VALUES ('$title','$body','$author','$tags',$cat)";
    $db->insert($query);
   }
   
   
 }
?>

<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" >
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
			<?php while($row = $cats->fetch_assoc()) :?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>          
                        
        <?php endwhile; ?>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>