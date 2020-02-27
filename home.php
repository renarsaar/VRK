<?php
require "inc/config.php";
session_start();
  # Using OOP

  # Create Query = POSTS
  $sql = "SELECT * FROM posts";

  # Get the result
  $result = $conn -> query($sql);

  # Fetch data to associative array
  $posts = $result -> fetch_all(MYSQLI_ASSOC);

    require "inc/event-query.php";
?>

<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>
      <div class="home-content">
        <div class="home-posts">
          <!-- Foreach loop -->
          <?php foreach($posts as $post) : ?>
            <div class="post-event">
              <h2><?php echo $post["title"]; ?></h2>
              <h5>Created At: <?php echo $post["created_at"]; ?> By: <?php echo $post["author"]; ?></h5>
              <p class="txt-home">
              <?php echo $post["body"] ?>
              </p>
              <a class="btn btn-default" href="post.php?id=<?php echo $post["id"]; ?>">Read more</a>
            </div>
          <?php endforeach; ?>
        </div>

        <?php include("inc/event-loop.php"); ?>
        
      </div>
    </div>
<?php include("inc/footer.php"); ?>
