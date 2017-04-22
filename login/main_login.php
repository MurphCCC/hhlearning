<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="../css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="../js/materialize.min.js"></script>
  </head>

  <body>
    <div class="container">
    <div class="row">
      <form class="form-signin col s6 center" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="input-field col s6 center"><input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
        <!-- The checkbox remember me is not implemented yet...
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.2.1.min.js"></script>
        <!-- The AJAX login script -->
    <script src="js/login.js"></script>

  </body>
</html>
