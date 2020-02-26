<?php
require "inc/config.php";

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

        <div class="home-events">
          <?php foreach($events as $event) : ?>
            <div class="event">
              <h2><?php echo $event["title"]; ?></h2>
              <h5>Event At: <?php echo $event["event_at"]; ?></h5>
              <p class="txt-home"><?php echo $event["descr"]; ?></p>
              <a class="btn" href="event.php?id=<?php echo $event["id"]; ?>">View more</a>
            </div>
          <?php endforeach; ?>
          
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>
