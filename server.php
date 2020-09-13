<?php
session_start();

//conn to database
$db = mysqli_connect("localhost", "root", "", "spider3") or die("Can't connect");
$errors_reg = array();
$errors_log = array();
$username_reg = "";
$username_log = "";
$password_log = "";
$email = "";
$password_reg = "";
$confirm = "";
$type = "";

//sign up
if (isset($_POST['signup-btn']))
{
    if(empty($_POST['username'])){
      $errors_reg['username'] = "Username required";
      $username = "";
    }
    else {
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $username_reg = $username;
    }
    if(empty($_POST['email'])){
      $errors_reg['email'] = "Email ID required";
      $email = "";
    }
    else $email = mysqli_real_escape_string($db, $_POST['email']);
    if(empty($_POST['password'])){
      $errors_reg['password'] = "Password required";
      $password = "";
    }
    else {
      $password = mysqli_real_escape_string($db, $_POST['password']);
      $password_reg = $password;
    }
    if(empty($_POST['confirm'])){
      if(!empty($_POST['password']))$errors_reg['confirm'] = "Please confirm your password";
      $confirm = "";
    }
    else $confirm = mysqli_real_escape_string($db, $_POST['confirm']);
    if(empty($_POST['type'])){
      $errors_reg['type'] = "Please specify type of profile";
      $type = "";
    }
    else $type = mysqli_real_escape_string($db, $_POST['type']);

    //check for errors during entry
    if(!empty($_POST['password'])){
      if(!empty($_POST['confirm'])){
        if ($confirm != $password) $errors_reg['mismatch'] = "Password does not match";
      }
      //password setting validation
      if(strlen($password)<7)$errors_reg['length'] = "Password must be at least 7 characters";
      if(ctype_alpha($password))$errors_reg['char'] = "Password must contain at least one number or special character";
    }

    $query = "SELECT * FROM user WHERE email=? OR username=?";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query))
    {
        echo "FAILED";
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "ss", $email, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        if ($user)
        {
            if ($user['email'] == $email) $errors_reg['email_exist'] = "You have already registered with this email ID, please login instead";
            if ($user['username'] == $username) $errors_reg['username_exist'] = "This username already exists. Please enter a different one.";
        }
    }

    //register a user once all errors are rectified
    if (count($errors_reg) == 0)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username,email,password,type) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $query))
        {
            echo "FAILED";
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $type);
            mysqli_stmt_execute($stmt);

            $query = "SELECT * FROM user WHERE username=?";
            $stmt = mysqli_stmt_init($db);
            if (!mysqli_stmt_prepare($stmt, $query))
            {
                echo "FAILED";
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);

                $_SESSION['message'] = "Logged in";
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user['id'];
                $_SESSION['type'] = $type;

                if($type == "seller"){header("location: seller.php"); exit();}
                else {header("location: buyer.php");exit();}
            }
        }
    }
}

//login
if (isset($_POST['login-btn']))
{
  if(empty($_POST['username'])){
    $errors_log['username'] = "Username required";
    $username = "";
  }
  else {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $username_log = $username;
  }
  if(empty($_POST['password'])){
    $errors_log['password'] = "Password required";
    $password = "";
  }
  else {
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password_log = $password;
  }

    //log the user in
    if (count($errors_log) == 0)
    {
        $query = "SELECT * FROM user WHERE username=?";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $query))
        {
            echo "FAILED";
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user)
            {
                if (password_verify($password, $user['password']))
                {
                    $_SESSION['message'] = "Logged in";
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['type'] = $user['type'];

                    if($_SESSION['type'] == "seller")header("location: seller.php");
                    else header("location: buyer.php");
                    exit();
                }
                else
                {
                    $errors_log['cred'] = "Wrong credentials.";
                }
            }
            else {
              $errors_log['cred'] = "You are not a registered member.";
            }
        }
    }
}

// $history;
// //if logged in, prepare customer history
// if(isset($_SESSION['message'])){
//   $query = "SELECT history FROM user WHERE id=?";
//   $stmt = mysqli_stmt_init($db);
//   if(!mysqli_stmt_prepare($stmt,$query)){
//     echo "FAILED";
//   }
//   else{
//     mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);
//     $user = mysqli_fetch_assoc($result);
//     $history = $user['history'];
//     $history = unserialize($history);
//   }
//
// }

//logout
if (isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['message']);
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    unset($_SESSION['type']);
    header("location: intro.php");
    exit();
}

//adding new item
$name = "";
$description = "";
$price = "";
$quantity = "";
$image;
$errors_item = array();

if (isset($_POST['newitem-btn'])){
  if(empty($_POST['name'])){
    $errors_item['name'] = "Product name required";
    $name = "";
  }
  else {
    $name = mysqli_real_escape_string($db, $_POST['name']);
  }
  if(empty($_POST['description'])){
    $errors_item['description'] = "Product description required";
    $description = "";
  }
  else $description = mysqli_real_escape_string($db, $_POST['description']);
  if(empty($_POST['price'])){
    $errors_item['price'] = "Price required";
    $price = "";
  }
  else {
    $price = mysqli_real_escape_string($db, $_POST['price']);
  }
  if(empty($_POST['quantity'])){
    $errors_item['quantity'] = "Quantity is required";
    $quantity = "";
  }
  else $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
  if(empty($_POST['image'])){
    $errors_item['image'] = "Please upload image";
  }
  else $image = mysqli_real_escape_string($db, $_POST['image']);

  //check if product already exists
  $query = "SELECT * FROM item WHERE name=?";
  $stmt = mysqli_stmt_init($db);
  if (!mysqli_stmt_prepare($stmt, $query))
  {
      echo "FAILED here1";
  }
  else
  {
      mysqli_stmt_bind_param($stmt, "s", $name);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $user = mysqli_fetch_assoc($result);
      if ($user)
      {
          if ($user['name'] == $name) $errors_item['name_exist'] = "You have already added this product, please update details there.";
      }
  }

  //add the item once all errors are rectified
  if (count($errors_item) == 0)
  {

      $query = "INSERT INTO item (user_id,name,description,image,price,quantity) VALUES (?,?,?,?,?,?);";
      $stmt = mysqli_stmt_init($db);
      if (!mysqli_stmt_prepare($stmt, $query))
      {
          echo "FAILED";
      }
      else
      {
          mysqli_stmt_bind_param($stmt, "issbii", $_SESSION['id'],$name,$description,$image,$price,$quantity);
          mysqli_stmt_execute($stmt);

          $_SESSION['added'] = "Yes";
      }
  }
}

 ?>
