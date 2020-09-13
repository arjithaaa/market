<?php include ("server.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>KartMart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
    body{
      background-color: #292b2c;
      margin-bottom: 3%;
    }

    .width{
      width: 60%;
    }
    </style>
  </head>
  <body>
    <!-- login top bar -->
    <nav class = "navbar navbar-expand-sm bg-light mb-5 pb-3">
      <a href="intro.php" class="navbar-brand mr-auto ml-3 text-dark" style="font-size: 1.5rem; font-weight: bold;">KartMart</a>
      <?php if (count($errors_log) > 0): ?>
        <div class="ml-auto alert alert-dark d-flex pl-0 pt-2 pr-2 pb-0">
          <ul>
            <?php foreach ($errors_log as $error): ?>
              <li>
                <?php echo $error; ?>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>

      <ul class="navbar-nav ml-auto" style="font-size: 1.25rem;">
        <li class="nav-item">
          <form action="register.php" method="post">
            <div style="display: inline-block; font-size: 1rem;">
              <label for="username">Username</label>
              <input type="text" class="form-control"  name="username" placeholder="Enter username" value="<?php echo $username_log ?>">
            </div>
            <div style="display: inline-block; font-size: 1rem;">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $password_log ?>">
            </div>
            <button type="submit" class="btn btn-dark btn-sm" name="login-btn">Sign in</button><br>
          </form>
        </li>
      </ul>
    </nav>

    <div class="container p-5 bg-light d-flex justify-content-center width m-auto">
      <!-- new user registration -->
      <div class="register d-flex flex-column justify-content-center w-100">
        <form action="register.php" method="post">
          <?php if (count($errors_reg) > 0): ?>
            <div class="ml-auto alert alert-dark d-flex">
              <ul>
                <?php foreach ($errors_reg as $error): ?>
                  <li>
                    <?php echo $error; ?>
                  </li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php endif ?>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email ?>">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $username_reg ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $password_reg ?>">
          </div>
          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" name="confirm" placeholder="Confirm password" value="<?php echo $confirm ?>">
          </div>
          <div class="form-group d-flex flex-direction-column">
            <label for="type">Choose profile type</label>
            <div class="ml-auto d-flex flex-direction-column justify-content-around">
              <div class="">
                <input type="radio" id="seller" name="type" value="seller">
                <label for="seller" class="mr-5">Seller</label><br>
              </div>
              <div class="">
                <input type="radio" id="buyer" name="type" value="buyer">
                <label for="buyer" class="mr-5">Buyer</label><br>
              </div>
            </div>
          </div>
          <button type="submit" name="signup-btn" class="btn btn-dark w-100">Sign up</button><br>
        </form>
      </div>
    </div>
  </body>
</html>
