<div class="home-container">
      <div class="header">
        <div class="header-logo">
          <ul>
            <li>
              <a href="home.php">
                <h1>VRK Intranet</h1>
              </a> 
            </li>
            <li>
              <h2>Hi, <?php echo $_SESSION["username"]; ?></h2>
            </li>
          </ul>
        </div>
        <div class="header-menu">
          <ul>
            <li><a href="addpost.php" class="btn-menu">Add Post</a></li>
            <li><a href="addevent.php" class="btn-menu">Add Event</a></li>
            <li><a href="fileshare.php" class="btn-menu">File Sharing</a></li>
            <li><a href="members.php" class="btn-menu">Members</a></li>
            <a href="home.php"><i class="fas fa-home home-fas"></i></a>
            <a href="index.php"><i class="fas fa-sign-out-alt home-fas"></i></a>
          </ul>
        </div>
      </div>