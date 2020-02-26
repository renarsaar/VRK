<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["submit"])) {
  # Get form data
  $update_id = $conn -> real_escape_string(htmlspecialchars($_POST["update_id"]));
  $title = $conn -> real_escape_string(htmlspecialchars($_POST["title"]));
  $body = $conn -> real_escape_string(htmlspecialchars($_POST["body"]));
  $author = $conn -> real_escape_string(htmlspecialchars($_POST["author"]));

  # Create query
  $sql = "UPDATE posts SET title='$title', body='$body', author='$author' WHERE id = '$update_id' ";

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
  $sql = "SELECT * FROM posts WHERE id = $id";

  # Get the result
  $result = $conn -> query($sql);

  # Fetch data to associative array
  $post = $result -> fetch_assoc();

    require "inc/event-query.php"; 
?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>

      <div class="home-content">
        <div class="home-posts">

          <div class="form">
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
              <h2>Edit post</h2>
              <div class="input-field">
                <h4>Title</h4>
                <label for="title">
                  <input
                    type="text"
                    name="title"
                    value="<?php echo $post["title"]; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Author</h4>
                <label for="postauthor">
                  <input
                    type="text"
                    name="author"
                    value="<?php echo $post["author"]; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <h4>Post</h4>
                <label for="body">
                  <textarea 
                  name="body"
                  rows="7"
                  cols="60"><?php echo $post["body"]; ?></textarea>
                </label>
              </div>

            <!-- Hidden id shows this post ID -->
              <input type="hidden" name="update_id" value="<?php echo $post["id"]; ?>">
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
