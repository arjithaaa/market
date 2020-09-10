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
      padding: 5% 0;
    }

    .width{
      width: 60%;
    }
    </style>
  </head>
  <body>
    <div class="container p-5 bg-light d-flex justify-content-around width">
      <div class="register d-flex flex-column justify-content-center">
        <form>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="pwd" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="conpwd">Confirm Password</label>
            <input type="password" class="form-control" id="conpwd" placeholder="Confirm password">
          </div>
          <button type="submit" class="btn btn-dark w-50">Submit</button><br>
          <a href="#">Already a user? Login.</a>
        </form>
      </div>
      <div class="login d-flex flex-column justify-content-center">
        <form>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="pwd" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-dark w-50">Submit</button><br>
          <a href="#">Not a user? Register.</a>
        </form>
      </div>
    </div>
  </body>
</html>
