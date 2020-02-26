<?php

  require "inc/config.php";

  $msg = "";
  $msgClass = "";
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  # Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = filesize($_FILES["file"]["tmp_name"]);
      if($check !== false) {
          $msgClass = "alert-success";
          $msg = "File is a valid file - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          $msgClass = "alert-danger";
          $msg = "File is not a valid file.";
          $uploadOk = 0;
      }
  }
  # Check if file already exists
  if (file_exists($target_file)) {
      $msgClass = "alert-danger";
      $msg = "Sorry, file already exists.";
      $uploadOk = 0;
  }
  # Check file size
  if ($_FILES["file"]["size"] > 50000000) {
      $msgClass = "alert-danger";
      $msg = "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  # Allow certain file formats
  if($fileType != "jpg" && $fileType != "pdf" && $fileType != "png" && $fileType != "jpeg") {
      $msgClass = "alert-danger";
      $msg = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadOk = 0;
  }
  # Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      $msgClass = "alert-danger";
      $msg = "Sorry, your file was not uploaded.";
  # if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          $msgClass = "alert-success";
          $msg = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
      } else {
          $msgClass = "alert-danger";
          $msg = "Sorry, there was an error uploading your file.";
      }
  }

require "inc/event-query.php";
?>

<?php include("inc/home-header.php"); ?>
<?php include("inc/navbar.php") ?>

      <div class="home-content">
        <div class="home-posts">
          <div class="form">
           <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
              <h2>Upload a new file</h2>
              <div class="input-field">
                <h4>Add a file</h4>
                  <input
                    type="file"
                    name="file"
                    id="file"
                  />
                <input type="submit" name="submit" value="Upload a new file" class="btn-success">
                  <!-- ERROR/SUCCESS MESSAGE -->
                  <?php if($msg != ""): ?>
                    <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                  <?php endif; ?>
              </div>
            </form>
            <div class="post">
              <h2>Uploaded files</h2>
            <p class="home-txt"><?php echo $_FILES["file"]["name"]; ?></p> 
            </div>
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
