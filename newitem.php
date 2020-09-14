<?php
include ("server.php");
if(!isset($_SESSION['id'])){header("location: intro.php"); exit();}
else if($_SESSION['type'] != "seller")header("location: intro.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add new item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
    body{
      background-color: #fff;
    }
    .bg{
      background-color: #eeeeee;
    }
    </style>
  </head>
  <body>
    <nav class = "navbar navbar-expand-sm bg-light">
      <a href="seller.php?dashboard=1" class="navbar-brand mr-auto ml-3 text-dark" style="font-size: 1.5rem; font-weight: bold;">KartMart</a>
      <ul class="navbar-nav ml-auto" style="font-size: 1.25rem;">
        <li class="nav-item mr-4 ml-4">
          <a class="text-dark" href="seller.php?dashboard=1.php" style="text-decoration: none;">Dashboard</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="text-dark" href="newitem.php?unset=1" style="text-decoration: none;">Add new item</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="text-dark" href="sold.php?display=1" style="text-decoration: none;">Sold items</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="btn btn-outline-dark btn-sm mr-4" href="intro.php?logout=1" role="button">Logout</a>
        </li>
      </ul>
    </nav>
    <div class="container bg p-5 mt-5">
      <div class="d-flex flex-column justify-content-center w-100">
        <form action="newitem.php" method="post" enctype="multipart/form-data">
          <?php if (count($errors_item) > 0): ?>
            <div class="alert alert-dark">
              <ul>
                <?php foreach ($errors_item as $error): ?>
                  <li>
                    <?php echo $error; ?>
                  </li>
                <?php
        endforeach ?>
              </ul>
            </div>
            <?php
    endif ?>
    <?php if(isset($_SESSION['added'])): ?>
    <div class="alert alert-dark">
      <p>Item added</p>
    </div>
  <?php endif ?>
          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" name="name" placeholder="Enter product name" value = "<?php if(!isset($_SESSION['added']))echo $name ?>">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter product description" value = "<?php if(!isset($_SESSION['added']))echo $description ?>">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" placeholder="Enter price per item" value = "<?php if(!isset($_SESSION['added']))echo $price ?>">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" value = "<?php if(!isset($_SESSION['added']))echo $quantity ?>">
          </div>
          <div class="form-group">
            <label for="image">Upload image</label>
            <input type="file" class="form-control pb-5 pt-3" name="image">
          </div>
          <button type="submit" name="newitem-btn" class="btn btn-dark w-100">Add new item</button><br>
        </form>
      </div>
    </div>
  </body>
</html>
