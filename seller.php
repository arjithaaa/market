<?php
include ("server.php");
if(!isset($_SESSION['id'])){header("location: intro.php"); exit();}
else if($_SESSION['type'] != "seller")header("location: intro.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
    body{
      background-color: #eeeeee;
      padding-bottom: 6%;
    }
    nav{
      margin-bottom: 5%;
    }
    .arrange{
      display: flex;
      flex-wrap: wrap;
    }
    .arr-item{
      flex-basis: 33.333333%;
      padding: 2%;
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
    <div class="container p-3">
      <h2>Added By You</h2>
    </div>

    <div class="container arrange bg-light p-5" id="recent">
      <?php
      { $i = 0;
        while ($view_added = mysqli_fetch_assoc($result_added)){
          echo "<div class='arr-item'>
            <div class='card h-75'>
              <img src='...' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>{$view_added['name']}</h5>
                <p class='card-text'>{$view_added['description']}<br>Price: {$view_added['price']} Rs<br>Quantity: {$view_added['quantity']}</p>
                <a href='edit.php?item={$view_added['item_id']}' class='btn btn-dark'>Edit</a>
              </div>
            </div>
          </div>";
          $i = 1;
        }
        if($i == 0)echo "<p class='text-dark'>You have not added any items yet!</p>";
      }
        ?>
      </div>
</div>
  </body>
</html>
