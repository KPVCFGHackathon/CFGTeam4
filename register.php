<?php include('server.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Sign Up for Free</h1>
          
          <form action="register.php" method="post">
          <?php include('errors.php'); ?>
         <div class="field-wrap">
            <label>
              User Name<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off" />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password_1" required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Re-Enter Password<span class="req">*</span>
            </label>
            <input type="password" name="password_2" required autocomplete="off"/>
          </div>
          
          <button type="submit" name="register" class="button button-block">Register</button>
          <p>
          	Already a Member? <a href="login.php">Login</a>
          </p>
          
          </form>
</div>
</body>
</html>