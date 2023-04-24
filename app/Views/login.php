<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- styles -->
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css');?>" />
    <!-- styles -->
    <title>Login | Online Shop</title>
  </head>

  <body>
<!-- partial:index.partial.html -->
<div class="login-form-wrap">
  <h2>Login</h2>
  <form  action="<?=base_url('/login/auth');?>" method="post" id="LoginForm" class="login-form">
    <p>
        <input type="text" id="username" name="username" placeholder="username" required>
    </p>
    <p>
        <input type="password" id="password" name="password" placeholder="password" required>
    </p>
    <p>
        <input type="submit" class="login" value="Login">
    </p>
  </form>
  <div class="create-account-wrap">
  </div>
</div>
  </body>
</html>