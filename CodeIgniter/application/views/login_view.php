<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    

    <title>Login form!</title>

  </head>
  <body>
  <form class="form-signin" method="POST" action="<?php echo base_url() . 'index.php/logincontroller/login_post' ?>">

  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label  class="sr-only">User Name</label>
  <input type="text" name="username" class="form-control" placeholder="User Name" required="" autofocus=""><br><br>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required=""><br><br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form>

   
  </body>
</html>