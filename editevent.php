<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["submit"])) {
  # Get form data
  $update_id = mysqli_real_escape_string($conn, $_POST["update_id"]);
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $event_at = mysqli_real_escape_string($conn, $_POST["event_at"]);
  $descr = mysqli_real_escape_string($conn, $_POST["descr"]);

  $query = "UPDATE events SET title='$title', event_at='$event_at', descr='$descr' WHERE id = '{$update_id}' ";

  if (mysqli_query($conn, $query)) {
    header ("Location: home.php");
  } else {
    echo "ERROR: ".mysqli_error($conn);
  }
}

  # Using OOP
  # Get ID
 $id = mysqli_real_escape_string($conn, $_GET["id"]);

 # Create Query = SINLGE POST
 $sql2 = "SELECT * FROM events WHERE id = $id";

 # Get the result
 $result2 = $conn -> query($sql2);

 # Fetch data to associative array
 $event = mysqli_fetch_assoc($result2);

    require "inc/event-query.php"; 
?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>

      <div class="home-content">
        <div class="home-posts">

            <!-- form to edit -->
          <div class="form">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
              <h2>Edit event</h2>
              <!-- Input fields -->
              <div class="input-field">
                <h4>Title</h4>
                <label for="title">
                  <input
                    type="text"
                    name="title"
                    value="<?php echo $event["title"]; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Date</h4>
                <label for="event_at">
                  <input
                    type="date"
                    name="event_at"
                    value="<?php echo $event["event_at"]; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Description</h4>
                <label for="descr">
                  <textarea 
                  name="descr"
                  rows="7"
                  cols="60"><?php echo $event["descr"]; ?></textarea>
                </label>
              </div>

            <!-- Hidden id shows this post ID -->
              <input type="hidden" name="update_id" value="<?php echo $event["id"]; ?>">
              <input type="submit" name="submit" value="Edit post" class="btn-success">
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
