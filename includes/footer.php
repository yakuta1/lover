        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p><?php echo $site_description; ?></p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
            <?php if($posts) : ?> 
            <?php while($row = $cats->fetch_assoc()) : ?>
              <li><a href="posts.php?category=<?php echo urlencode($row['id']); ?>"><?php echo $row['name']; ?></a></li>
            <?php endwhile;?>
            <?php else: ?>
            <h3>No categories</h3>
            <?php endif; ?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>Anton Yakuta &copy; 2014</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>


    
  </body>
</html>