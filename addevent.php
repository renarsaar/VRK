<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["submit"])) {
  # Get form data
  $title = $conn -> real_escape_string(htmlspecialchars($_POST["title"]));
  $descr = $conn -> real_escape_string(htmlspecialchars($_POST["descr"]));
  $event_at = $conn -> real_escape_string(htmlspecialchars($_POST["event_at"]));

  # Create query
  $sql = "INSERT INTO events(title, descr, event_at) VALUES ('$title', '$descr', '$event_at')";

  # Redirect to home page if query successfull
  if ($conn -> query($sql)) {
    header ("Location: home.php");
  } else {
    echo "ERROR: ".mysqli_error($conn);
  }
}

require "inc/event-query.php"; 
?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>

      <div class="home-content">
        <div class="home-posts">
          <div class="form">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
              <h2>Add a new event</h2>
              <!-- Input fields -->
              <div class="input-field">
                <h4>Event title</h4>
                <label for="title">
                  <input
                    type="text"
                    name="title"
                    placeholder="Add title..."
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Event date</h4>
                <label for="event_at">
                  <input
                    type="date"
                    name="event_at"
                    placeholder=""
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Event description</h4>
                <label for="body">
                  <textarea 
                  name="descr"
                  rows="6"
                  cols="50"
                  placeholder="Add event description..."></textarea>
                </label>
              </div>

              <input type="submit" name="submit" value="Add a new event" class="btn-success">
            </form>
          </div>
        </div>

      <div class="home-events">
        <div class="home-posts">
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
