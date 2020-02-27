<?php
require "inc/config.php";
session_start();

  # Create Query = POSTS
  $sql = "SELECT * FROM users";

  # Get the result
  $result = $conn -> query($sql);

  # Fetch data to associative array
  $users = $result -> fetch_all(MYSQLI_ASSOC);

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

        <?php include("inc/event-loop.php"); ?>
      </div>
    </div>

<?php include("inc/footer.php"); ?>