<?php
# Log In with a registered user
require "inc/config.php";

# If Submit login form
if (isset($_POST["submit"])) {

  # Get data from database
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $pword = mysqli_real_escape_string($conn, $_POST["pword"]);

  # Check if they match


}


?>
<?php include("inc/header.php"); ?>
    <!-- MAIN -->
    <section id="main-section">
      <!-- FLEX CONTAINER -->
      <div class="container">
        <!-- FORM DIV -->
        <div class="form">
          <div class="form-area">
            <form method="post" action="process.php">
              <h2>Welcome</h2>
              <h2>Please Log In</h2>
              <div class="input-field">
                <i class="fas fa-envelope fields-i"></i>
                <input type="email" id="email" placeholder="Enter Email" value="<?php echo isset($_POST["email"]) ? $email : ""; ?>"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <input type="password" id="password" placeholder="**********" />
              </div>
              <div class="input-field">
                <button type="submit" action="">Log in</button>
              </div>
              <div class="help-field">
                <a href="#"><p class="txt">Forgot Username/Password?</p></a>
                <a href="registration.php"><p class="txt">Create a New User</p></a>
              </div>
              <div class="social">
                <h4>Or Log In With</h4>
                <a href="http://facebook.com"
                  ><i class="fab fa-facebook fa-2x" target="_blank"></i
                ></a>
                <a href="http://google.com"
                  ><i class="fab fa-google fa-2x" target="_blank"></i
                ></a>
                <a href="http://linkedin.com"
                  ><i class="fab fa-linkedin fa-2x" target="_blank"></i
                ></a>
              </div>
            </form>
          </div>
          <div class="form-info"><h2>VRK Intranet</h2></div>
        </div>
      </div>
    </section>
  <?php include("inc/footer.php"); ?>