<?php
include("inc/sessions.php");
session_start();

# ...
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
                <input type="email" id="email" placeholder="Enter Email" value="<?php echo isset($_POST["email"]) ? $email : "" ?>"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock fields-i"></i>
                <input type="password" id="password" placeholder="**********" />
              </div>
              <div class="input-field">
                <button type="submit">Log in</button>
              </div>
              <div class="help-field">
                <a href="#"><p class="txt">Forgot Username/Password?</p></a>
                <a href="register.php"><p class="txt">Create a New User</p></a>
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
          <div class="form-info"><h2>VRK SISEVEEB</h2></div>
        </div>
      </div>
    </section>
  </body>
</html>
