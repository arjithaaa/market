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
      background-color: #fff;
    }
    label, input{
      display: inline-block;
      width: 5%;
    }
    </style>
  </head>
  <body>
    <nav class = "navbar navbar-expand-sm bg-light">
      <a href="intro.php" class="navbar-brand mr-auto ml-3 text-dark" style="font-size: 1.5rem; font-weight: bold;">KartMart</a>
      <ul class="navbar-nav ml-auto" style="font-size: 1.25rem;">
        <li class="nav-item">
          <form action="intro.php">
            <div style="display: inline-block; font-size: 1rem;">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter username">
            </div>
            <div style="display: inline-block; font-size: 1rem;">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark btn-sm">Sign in</button><br>
          </form>
        </li>
      </ul>
    </nav>
    <div class="jumbotron bg-light m-5 d-flex pb-0 pt-5">
      <div class="container">
        <h1 class="display-4">Welcome to KartMart!</h1>
        <p class="lead">Buy and sell items without any hassle, in the comfort of your own home!</p>
        <hr class="my-4">
        <p><strong>Register</strong> and join us today!</p>
        <br>
        <a class="btn btn-dark btn-lg mr-4 w-25" href="register.php" role="button">Join now</a>
      </div>
      <div class="container d-flex">
        <img src="images/cart.jpg" alt="" class = "w-50 ml-auto h-75">
        <div class="d-flex flex-column">
          <img src="images/phone.jpg" alt="" class = "w-100 ml-auto">
          <img src="images/laptop.jpg" alt="" class = "w-100 ml-auto">
        </div>
      </div>
    </div>
  </body>
</html>
