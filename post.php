<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["delete"])) {
  # Get form data
  $delete_id = mysqli_real_escape_string($conn, $_POST["delete_id"]);

  # Delete = delete_id (line 62)
  $query = "DELETE FROM posts WHERE id = {$delete_id};";

  if (mysqli_query($conn, $query)) {
    header ("Location: home.php");
  } else {
    echo "ERROR: ".mysqli_error($conn);
  }
}


  # Using OOP

  $id = mysqli_real_escape_string($conn, $_GET["id"]);

  # Create Query = SINLGE POST
  $sql3 = "SELECT * FROM posts WHERE id = $id";

  # Get the result
  $result3 = $conn -> query($sql3);

  # Fetch data to associative array
  $post = mysqli_fetch_assoc($result3);

    require "inc/event-query.php"; 
?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>

      <div class="home-content">
        <div class="home-posts">
          <div class="post-event">
            <h2><?php echo $post["title"]; ?></h2>
            <h5>Created At: <?php echo $post["created_at"]; ?> By: <?php echo $post["author"]; ?></h5>
            <p class="txt-home">
            <?php echo $post["body"]; ?>
            </p>

            
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
            <!-- Hidden id shows this post ID -->
            <input type="hidden" name="delete_id" value="<?php echo $post["id"]; ?>">
              <div class="edit-form">
                  <a href="editpost.php?id=<?php echo $post["id"]; ?>" class="btn">Edit Post</a>
                  <input type="submit" name="delete" value="Delete" class="btn-alert">
              </div>
            </form>
          </div>
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
