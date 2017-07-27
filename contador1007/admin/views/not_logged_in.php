

<!-- login form box -->
<!-- <form method="post" action="index.php" name="loginform">

    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

    <input type="submit"  name="login" value="Log in" />

</form> -->


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>1007 admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/log.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  </head>

  <body>


    <div class="container">

    

      <form class="form-signin" role="form" form method="post" action="index.php" name="loginform">
        <h2 class="form-signin-heading"></h2>
        <input id="login_input_username" placeholder="user" class="login_input form-control" type="text" name="user_name" required autofocus>
        <input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" placeholder="Pass" required>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Log in">Sign in</button>
      </form>

    <?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

    </div> <!-- /container -->
    
  </body>



