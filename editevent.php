<?php
require "inc/config.php";
session_start();

# Check for submit
if (isset($_POST["submit"])) {
  # Get form data
  $update_id = $conn -> real_escape_string(htmlspecialchars($_POST["update_id"]));
  $title = $conn -> real_escape_string(htmlspecialchars($_POST["title"]));
  $event_at = $conn -> real_escape_string(htmlspecialchars($_POST["event_at"]));
  $descr = $conn -> real_escape_string(htmlspecialchars($_POST["descr"]));

  # Create query
  $sql = "UPDATE events SET title='$title', event_at='$event_at', descr='$descr' WHERE id = '$update_id' ";

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
              <input type="submit" name="submit" value="Edit event" class="btn-success">
            </form>
          </div>
        </div>

        <?php include("inc/event-loop.php"); ?>
      </div>
    </div>
<?php include("inc/footer.php"); ?>
