<?php
session_start();

//conn to database
$db = mysqli_connect("localhost", "root", "", "spider3") or die("Can't connect");
$errors = array();
$username = "";

//sign up
if (isset($_POST['signup-btn']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm = mysqli_real_escape_string($db, $_POST['confirm']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    //check for errors during entry
    if (empty($username)) $errors['username'] = "Username required";
    if (empty($email)) $errors['email'] = "Email ID required";
    if (empty($password)) $errors['password'] = "Password required";
    if (empty($type)) $errors['type'] = "Please specify type of profile";
    if ($confirm != $password) $errors['mismatch'] = "Password does not match";
    //password setting validation
    if(strlen($password)<7)$errors['length'] = "Password must be at least 7 characters";
    if(ctype_alpha($password))$errors['char'] = "Password must contain at least one number or special character";


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
            if ($user['email'] == $email) $errors['email_exist'] = "You have already registered with this email ID, please login instead";
            if ($user['username'] == $username) $errors['username_exist'] = "This username already exists. Please enter a different one.";
        }
    }

    //register a user once all errors are rectified
    if (count($errors) == 0)
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
            $_SESSION['message'] = "Logged in";
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];
            $_SESSION['type'] = $user['type'];

            if($_SESSION['type'] == "seller")header("location: seller.php");
            else header("location: buyer.php");
            exit();
        }
    }
}

//login
if (isset($_POST['login-btn']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //check error
    if (empty($username)) $errors['username'] = "Username required";
    if (empty($password)) $errors['password'] = "Password required";

    //log the user in
    if (count($errors == 0))
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
                    $errors['cred'] = "Wrong credentials.";
                }
            }
        }
    }
}




 ?>
