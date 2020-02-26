<?php
require "inc/config.php";
  # Using OOP

  # Create Query = POSTS
  $sql = "SELECT * FROM users";

  # Get the result
  $result = $conn -> query($sql);

  # Fetch data to associative array
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    require "inc/event-query.php";
?>
<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php") ?>

      <div class="home-content">
        <div class="home-posts">
          <div class="home-members">
            <h2>VRK Intranet Users & Emails</h2>
            <?php foreach ($users as $user): ?>
              <div class="post">
                <p class="txt-home">Username: <?php echo $user["username"]; ?><br>Name: <?php echo $user["firstname"]," ", $user["lastname"]; ?><br>Email:  <?php echo $user["email"]; ?><hr></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="home-events">
          <?php foreach ($events as $event): ?>
            <div class="event">
              <h2><?php echo $event["title"]; ?></h2>
              <h5>Event At: <?php echo $event["event_at"]; ?></h5>
              <p class="txt-home"><?php $event["descr"]; ?></p>
              <a class="btn" href="event.php?id=<?php echo $event["id"]?>">View more</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

<?php include("inc/footer.php"); ?>