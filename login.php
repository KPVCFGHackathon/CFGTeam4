<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Log In</h1>
          
          <form action="login.php" method="post">
          <?php include('errors.php') ;?>

          <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" name="login" class="button button-block">Log in</button>
          <p>
          	Haven't Registered Yet ? <a href="register.php">Sign Up</a>
            <a href="LINK TO MAIN PAGE HERE">Go Anonymous </a>
          </p>
          </form>
</div>
</body>
</html>