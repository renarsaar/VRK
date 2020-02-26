<?php
require "inc/config.php";

# Check for submit
if (isset($_POST["submit"])) {
  # Get form data
  $update_id = mysqli_real_escape_string($conn, $_POST["update_id"]);
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $body = mysqli_real_escape_string($conn, $_POST["body"]);
  $author = mysqli_real_escape_string($conn, $_POST["author"]);

  $query = "UPDATE posts SET title='$title', body='$body', author='$author' WHERE id = '{$update_id}' ";

  if (mysqli_query($conn, $query)) {
    header ("Location: home.php");
  } else {
    echo "ERROR: ".mysqli_error($conn);
  }
}

// die($query); to dispaly error
    # Get ID
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    # Create query
    $query = "SELECT * FROM posts WHERE id = $id";
  
    # Get the result
    $result = mysqli_query($conn, $query);
  
    # Fetch data
    # ASSOCIATIVE ARRAY = ["name" => "renar"]
    $post = mysqli_fetch_assoc($result);
  
    # Free result
    mysqli_free_result($result);
  
    # Close connection
    mysqli_close($conn);

# BOTTOM ONE NEED TO CORRESPOND TOP ONE







  # Using OOP

  $id = mysqli_real_escape_string($conn, $_GET["id"]);

  # Create Query = SINLGE POST
  $sql3 = "SELECT * FROM posts WHERE id = $id";

  # Get the result
  $result3 = $conn -> query($sql3);

  # Fetch data to associative array
  $post = mysqli_fetch_assoc($result3);


    # Create Query = EVENTS
    $sql2 = "SELECT * FROM events";

    # Get the result
    $result2 = $conn -> query($sql2);

    # Fetch data to associative array
    $events = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    # Close Connection
    $conn -> close();


?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php"); ?>

      <div class="home-content">
        <div class="home-posts">
          <div class="post">
            <h2>Edit post</h2>
            <!-- form to edit -->
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="">
            
           

            
            
            <!-- Hidden id shows this post ID -->
            <input type="hidden" name="delete_id" value="<?php echo $post["id"]; ?>">
            <input type="submit" name="submit" value="Edit" class="btn">
            </form>
          </div>
        </div>

        <div class="home-events">
        <?php foreach($events as $event) : ?>
            <div class="event">
              <h2><?php echo $event["title"]; ?></h2>
              <h5>Event At: <?php echo $event["event_at"]; ?></h5>
              <p class="txt-home"><?php echo $event["desc"]; ?></p>
              <a class="btn" href="event.php?id=<?php echo $event["id"]; ?>">View more</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php include("inc/footer.php"); ?>
