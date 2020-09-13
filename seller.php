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
    .choice{
      display: inline-block;
      padding: 1%;
      border-radius: 10%;
    }
    .choice:hover{
      cursor: pointer;
      color: grey;
      background-color: #eeeeee;
    }
    </style>
  </head>
  <body>
    <nav class = "navbar navbar-expand-sm bg-light">
      <a href="seller.php" class="navbar-brand mr-auto ml-3 text-dark" style="font-size: 1.5rem; font-weight: bold;">KartMart</a>
      <ul class="navbar-nav ml-auto" style="font-size: 1.25rem;">
        <li class="nav-item mr-4 ml-4">
          <a class="text-dark" href="seller.php" style="text-decoration: none;">Dashboard</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="text-dark" href="newitem.php" style="text-decoration: none;">Add new item</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="text-dark" href="#" style="text-decoration: none;">Sold items</a>
        </li>
        <li class="nav-item mr-4 ml-4 text-dark">
          <a class="btn btn-outline-dark btn-sm mr-4" href="intro.php?logout=1" role="button">Logout</a>
        </li>
      </ul>
    </nav>
    <div class="container bg-light p-5" id="recent">
      <h2 class="text-dark mr-4">Added by you</h2>
      <br>

      <div class="d-flex">
        <div class="col-4">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo item['description'] ?></h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
        <!-- <div class="col-4">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div> -->
      </div>


      <!-- <div class="container d-flex flex-direction-column justify-content-around">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-dark">Go somewhere</a>
          </div>
        </div>
        <div class="card col-3" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-dark">Go somewhere</a>
          </div>
        </div>
        <div class="card col-3" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-dark">Go somewhere</a>
          </div>
        </div>
      </div> -->

    </div>



  </body>
</html>
