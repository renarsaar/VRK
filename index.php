<?php
# Inc Config File
require_once "inc/config.php";

$msg = "";
$msgClass = "";

# If Submit login form
if (isset($_POST["submit"])) {
  # Check if they match
  $email = htmlspecialchars($_POST["email"]);
  $pword = htmlspecialchars($_POST["pword"]);
  $isValid = true;

  # Check IF fields are empty
  if (empty($email) || empty($pword)) {
    $isValid = false;
    $msgClass = "alert-danger";
    $msg = "Please enter all fields!";
  }

  # Check IF email is valid
  if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $msgClass = "alert-danger";
    $msg = "Please enter a valid E-mail address";
  }

  # IsValid = Search for Email
  if ($isValid) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $stmt -> close();
    # If no rows exists = means that there are no emails found
    if($result -> num_rows == 0) {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "No user found with this Email";
    }
  }

  # IsValid = Login to Home Page
  if ($isValid) {
    $stmt = $conn->prepare("SELECT email, pword FROM users WHERE email = ? AND pword = ?");
    $stmt -> bind_param("ss", $email, $pword);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $stmt -> close();

    # If match = redirect to home.php
    if($result -> num_rows > 0) {
      header('Location: home.php');
    } else {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Email and Password do not match";
    }
  }
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
            <h2>Welcome</h2>
            <h2>Please Log In</h2>

            <!-- ERROR/SUCCESS MESSAGE -->
            <?php if($msg != ""): ?>
              <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>

              <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
              <div class="input-field">
                <i class="fas fa-envelope fields-i"></i>
                <input 
                type="email" 
                id="email" 
                name="email"
                placeholder="Enter Email" 
                value="<?php echo isset($_POST["email"]) ? $email : ""; ?>"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <input 
                type="password" 
                id="password" 
                name="pword"
                placeholder="**********" />
              </div>
              <div class="input-field">
                <button type="submit" name="submit">Log in</button>
              </div>
              </form>
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
            
          </div>
          <div class="form-info"><h2>VRK Intranet</h2></div>
        </div>
      </div>
    </section>
  <?php include("inc/footer.php"); ?>