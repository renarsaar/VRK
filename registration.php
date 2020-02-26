<?php
require "inc/config.php";

$msg = "";
$msgClass = "";

# Register a new User
if(isset($_POST["submit"])) {
  $firstname = htmlspecialchars(ucwords($_POST["firstname"]));
  $lastname = htmlspecialchars(ucwords($_POST["lastname"]));
  $username = htmlspecialchars($_POST["username"]);
  $email = htmlspecialchars($_POST["email"]);
  $pword = htmlspecialchars($_POST["pword"]);
  $confirm_pword = htmlspecialchars($_POST["confirm_pword"]);
  // $hashed_pword = password_hash($pword, PASSWORD_DEFAULT);
  
  $isValid = true;

  # Check IF fields are empty
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($pword) || empty($confirm_pword)) {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Please enter all fields!";
  # Password atleast 6 characters
    } elseif (strlen($pword) < 6) {
      $isValid = false;
      $msgClass = "alert-danger";
      $msg = "Password must be atleast 6 characters";
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
    # sql = prepared sql statement
    if ($isValid) {
      $sql = $conn -> prepare("SELECT * FROM users WHERE email = ?");
      $sql -> bind_param("s", $email);
      $sql -> execute();
      $result = $sql -> get_result();
      $sql -> close();
      # If any rows exists = means that there are the same emails
      if($result -> num_rows > 0) {
        $isValid = false;
        $msgClass = "alert-danger";
        $msg = "Email is already taken";
      }
    }

    
  # isValid = True = Insert Records
    if ($isValid) {
      $insertSQL = "INSERT INTO users(firstname, lastname, username, email, pword) VALUES (?, ?, ?, ?, ?)";
      $sql = $conn -> prepare($insertSQL);
    # "s" = corresponding variable has type string
      $sql -> bind_param("sssss", $firstname, $lastname, $username, $email, $pword);
      $sql -> execute();
      $sql -> close();

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
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
              <h2>Register a New User</h2>
              <div class="input-field">
                <i class="fas fa-info fields-i"></i>
                <label for="firstname">
                  <input
                    type="text"
                    name="firstname"
                    placeholder="Enter Your First name"
                    value="<?php echo isset($_POST["firstname"]) ? $firstname : ""; ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-info fields-i"></i>
                <label for="lastname">
                  <input
                    type="text"
                    name="lastname"
                    placeholder="Enter Your Last name"
                    value="<?php echo isset($_POST["lastname"]) ? $lastname : ""; ?>"
                  />
                </label>
              </div>
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
              <a href="index.php"><p class="txt">Login Page</p></a>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include("inc/footer.php"); ?>