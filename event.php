<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["delete"])) {
  # Get form data
  $delete_id = $conn -> real_escape_string($_POST["delete_id"]);

  # Delete = delete_id (line 62)
  $sql = "DELETE FROM events WHERE id = $delete_id;";

  # Redirect to home page if query successfull
  if ($conn -> query($sql)) {
    header ("Location: home.php");
  } else {
    echo "ERROR: ".mysqli_error($conn);
  }
}

  # Get ID
  $id = $conn -> real_escape_string($_GET["id"]);

  # Create Query = SINLGE POST
  $sql = "SELECT * FROM events WHERE id = $id";

  # Get the result
  $result = $conn -> query($sql);

  # Fetch data to associative array
  $event = $result -> fetch_assoc();

    require "inc/event-query.php";
?>

<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>
      <div class="home-content">
        <div class="home-posts">
          <div class="post-event">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
              <h2><?php echo $event["title"]; ?></h2>
              <h5>Event At: <?php echo $event["event_at"]; ?></h5>
              <p class="txt-home">
              <?php echo $event["descr"]; ?>
              </p>

              <!-- Hidden id shows this post ID -->
              <input type="hidden" name="delete_id" value="<?php echo $event["id"]; ?>">
              <div class="edit-form">
                <a href="editevent.php?id=<?php echo $event["id"]; ?>" class="btn">Edit Event</a>
                <input type="submit" name="delete" value="Delete" class="btn-alert">
              </div>
            </form>
          </div>       
        </div>

        <div class="home-events">
          <?php foreach($events as $event): ?>
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
