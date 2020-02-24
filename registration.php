<?php
require "inc/config.php";

$msg = "";
$msgClass = "";

# Register a new User
if(isset($_POST["submit"])) {
  $username = htmlspecialchars(ucwords($_POST["username"]));
  $email = htmlspecialchars($_POST["email"]);
  $pword = htmlspecialchars($_POST["pword"]);
  $confirm_pword = htmlspecialchars($_POST["confirm_pword"]);
  
  $isValid = true;

  # Check IF fields are empty
    if (empty($username) || empty($email) || empty($pword) || empty($confirm_pword)) {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Please enter all fields!";
    }
    
  # Check IF pword matches confirm_pword 
    if ($isValid && ($pword != $confirm_pword))  {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Passwords are not matching!";
    }

  # Check IF email is valid
    if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Please enter a valid E-mail address";
    }

  # isValid = True = Check IF email already exists
    # stmt = prepared statement
    if ($isValid) {
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
      $stmt -> bind_param("s", $email);
      $stmt -> execute();
      $result = $stmt -> get_result();
      $stmt -> close();
      # If any rows exists = means that there are the same emails
      if($result -> num_rows > 0) {
        $isValid = false;
        $msgClass = "alert-danger";
        $msg = "Email is already taken";
      }
    }

  # isValid = True = Insert Records
    if ($isValid) {
      $insertSQL = "INSERT INTO users(username, email, pword) VALUES (?, ?, ?, ?)";
      $stmt = $conn -> prepare($insertSQL);
    # "s" = corresponding variable has type string
      $stmt -> bind_param("sss", $username, $email, $pword);
      $stmt -> execute();
      $stmt -> close();

      $msgClass = "alert-success";
      $msg = "Account created!<br> You may now log in using your E-mail address";
    }

    
}

?>
<?php include("inc/header.php"); ?>

    <!-- MAIN -->
    <section id="main-section">
      <!-- CONTAINER -->
      <div class="container">
        <!-- FORM DIV -->
        <div class="form">
          <div class="form-info">
            <h2>VRK Intranet</h2>
          </div>

          <div class="form-area">
            <!-- ERROR/SUCCESS MESSAGE -->
            <?php if($msg != "") :?>
              <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>

            <!-- REGISTER -->
            <form method="post" action="">
              <h2>Register a New User</h2>
              <div class="input-field">
                <i class="fas fa-info fields-i"></i>
                <label for="username">
                  <input
                    type="text"
                    name="username"
                    placeholder="Enter Your Username"
                    value="<?php echo isset($_POST["username"]) ? $username : ""; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope fields-i"></i>
                <label for="email">
                  <input
                    type="email"
                    name="email"
                    placeholder="Enter Your Email"
                    value="<?php echo isset($_POST["email"]) ? $email : ""; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <label for="pword">
                  <input
                    type="password"
                    name="pword"
                    id="password"
                    placeholder="Choose a Password"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <label for="confirm_pword">
                  <input
                    type="password"
                    name="confirm_pword"
                    id="confirm_pword"
                    placeholder="Confirm your Password"
                  />
                </label>
              </div>
              <div class="input-field">
                <button type="submit" name="submit">Register a New User</button>
              </div>
            </form>
            <div class="help-field">
              <a href="login.php"><p class="txt">Login Page</p></a>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include("inc/footer.php"); ?>