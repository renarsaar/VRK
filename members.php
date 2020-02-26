<?php
require "inc/config.php";

?>

<?php include("inc/home-header.php"); ?>
    <div class="home-container">
      <div class="header">
        <div class="header-logo">
          <a href="home.php">
            <h1>VRK Intranet</h1>
          </a>
        </div>
        <div class="header-menu">
          <ul>
            <li><a href="addpost.php" class="btn-menu">Add Post</a></li>
            <li><a href="addevent.php" class="btn-menu">Add Event</a></li>
            <li><a href="fileshare.php" class="btn-menu">File Sharing</a></li>
            <li><a href="members.php" class="btn-menu">Members</a></li>
            <a href="home.php"><i class="fas fa-home home-fas"></i></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt home-fas"></i></a>
          </ul>
        </div>
      </div>

      <div class="home-content">
        <div class="home-posts">
          <div class="post">
            <!-- Foreach loop -->
            <h2>Post Header</h2>
            <h5>Created At: 2020-02-19 22:10:05 By: Renar Saaremets</h5>
            <p class="txt-home">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio,
              totam rem! Magni, voluptatibus itaque? Qui ut non vitae similique
              perferendis cupiditate possimus. Odit, vel eaque! Neque deleniti
              eveniet quos soluta!
            </p>
            <a class="btn btn-default" href="post.html">Read more</a>
          </div>
          <div class="post">
            <!-- Foreach loop -->
            <h2>Post Header</h2>
            <h5>Created At: 2020-02-19 22:10:05 By: Renar Saaremets</h5>
            <p class="txt-home">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Excepturi asperiores, architecto, blanditiis at impedit vel et
              quod accusantium iure sed libero quasi nobis doloribus tempore
              nemo. Laudantium illum minus id!
            </p>
            <a class="btn" href="post.html">Read more</a>
          </div>
        </div>

        <div class="home-events">
          <div class="event">
            <h2>Event Header</h2>
            <h5>Event At: 2020-02-24 22:10:05</h5>
            <p class="txt-home">Event paragraph/content</p>
            <a class="btn" href="event.html">View more</a>
          </div>
          <div class="event">
            <h2>Event Header</h2>
            <h5>Event At: 2020-02-24 22:10:05</h5>
            <p class="txt-home">Event paragraph/content</p>
            <a class="btn btn-default" href="event.html">View more</a>
          </div>
        </div>
      </div>
    </div>
    <?php include("inc/footer.php"); ?>
