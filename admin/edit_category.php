<?php include 'includes/header.php'; ?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    $db = new Database;
    
    $query = "SELECT * FROM categories WHERE id='$id'";
    $cats = $db->select($query)->fetch_assoc();
    
    if(isset($_POST['submit'])){
    $cat = mysqli_real_escape_string($db->link,$_POST['name']);
   
   if($cat==''){
    $error = "Empty fields are not allowed!";
   }else{
    $query = "UPDATE categories SET 
               name = '$cat'  WHERE id='$id'";
    $db->update($query);
   }
 }  
 
 if (isset($_POST['delete'])){
    $query = "DELETE FROM categories WHERE id='$id'";
    $db->delete($query);
 }

?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $cats['name'] ?>">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>