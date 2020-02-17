<?php
if (isset($_POST["submit"])) {
  session_start();
  $_SESSION["first_name"] = htmlentities(ucwords($_POST["f_name"]));
  $_SESSION["last_name"] = htmlentities(ucwords($_POST["l_name"]));
  $_SESSION["email"] = htmlentities($_POST["email"]);
  $_SESSION["pword"] = ($_POST["p_word"]);
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="Renar Saaremets, Kristjan Lehtla" />
    <meta
      name="description"
      content="VRK Siseveeb | Logi Sisse | Registreeru"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/83a1148b27.js"
      crossorigin="anonymous"
    ></script>
    <title>VRK Siseveeb | Logi Sisse</title>
  </head>
  <body>
    <!-- MAIN -->
    <section id="main-section">
      <!-- CONTAINER -->
      <div class="container">
        <!-- FORM DIV -->
        <div class="form">
          <div class="form-info">
            <h2>VRK SISEVEEB</h2>
          </div>
          <div class="form-area">
            <!-- ERROR MESSAGE -->
            <?php if($msg != "") :?>
              <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>

            <!-- REGISTER -->
            <form method="post" action="<?php echo($_SERVER["PHP_SELF"]); ?>" >
              <h2>Register a New User</h2>
              <div class="input-field">
                <i class="fas fa-info fields-i"></i>
                <label for="firstname">
                  <input
                    type="text"
                    name="f_name"
                    placeholder="Enter Your Firstname"
                    value="<?php echo isset($_POST["f_name"]) ? $first_name : "" ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-info fields-i"></i>
                <label for="lastname">
                  <input
                    type="text"
                    name="l_name"
                    placeholder="Enter Your Lastname"
                    value="<?php echo isset($_POST["l_name"]) ? $last_name : "" ?>"
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
                    value="<?php echo isset($_POST["email"]) ? $email : "" ?>"
                  />
                </label>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <label for="password">
                  <input
                    type="password"
                    name="p_word"
                    id="password"
                    placeholder="Choose a Password"
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
  </body>
</html>
