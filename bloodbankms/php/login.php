<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>  
    <div class="container">
      <div class="img">
        <img src="../images/login2.png">
      </div>
      <div class="login-container">
        <form method="post" action="login.php">
          <h2>Login</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fa-solid fa-user"></i>
            </div>
            <div>
              <h5>Username</h5>
              <input class="input" type="text" name="username">
            </div>
          </div>
          <div class="input-div two">
            <div class="i">
              <i class="fa-solid fa-lock"></i>
            </div>
            <div>
              <h5>Password</h5>
              <input class="input" type="password" name="password">
            </div>
          </div>
          <button type="submit" class="btn" name="login_admin">Login</button>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="../js/login.js"></script>
</body>
</html>
