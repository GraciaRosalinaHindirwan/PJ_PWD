<?php 
session_start();
include_once("koneksi.php");
require_once("route.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST["email"]);
    $username =  ($_POST["username"]);
    $password =  ($_POST["password"]);
    $confirm = ($_POST["confirm"]);
    $check = isset ($_POST["check"]);

 //validasi
 $errors = array();
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors[] = "Invalid email address format";
   } if (strlen($username) < 3) {
   $errors[] = "Username must be at least 3 characters";
   } if ($password != $confirm) {
   $errors[] = "Password mismatch.";
   } if (strlen($password)<6) {
   $errors[] = "Password must be at least 6 characters.";
   } if(!$check){
   $errors[] = "You need to agree to the Terms and Conditions";
   }

    $username = htmlspecialchars($username);
    $email = htmlspecialchars($email);

   if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("register.php"); 
        exit(); 
   } else {
        try {
            $connection = getConnection();
            $sql = "INSERT INTO user (email, username, password) VALUE (?, ?, ?)";
            $stmt = $connection->prepare($sql); //prepared statement 
            $stmt->execute([$email, $username, $password]);
            $_SESSION["success_message"] = "Register success";
            redirect("login.php");
            exit();

        } catch (PDOException $e) {
            $_SESSION['errors'] = "something is wrong";
            redirect("register.php");
            exit();
            
        }
   }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="card" style="width: 70vh;">
    <img src="img/header-regis.webp" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">REGISTER</h5> <br>
<form action="register.php" method="POST">
        <div class="card-text">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingemail" placeholder="name@example.com" name="email" required>
                <label for="floatingemail" class="bi bi-envelope"> Email</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" required>
                <label for="floatingUsername" class="bi bi-person"> Username</label>
            </div> <br>
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput" class="bi bi-key"> Password</label>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required>
                </div>
                <div class="col">
                    <label for="formGroupExampleInput" class="bi bi-key"> Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="confirm" required>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="check" required>
                        <label class="form-check-label" for="gridCheck">agree to the Terms & Condition</label>
                    </div>
                </div>
            </div>
            <button href="#" type="submit" class="btn btn-primary" id="CTA"> SIGN UP </button>
        </div>
            
    </div>
</div>
</form>


<div class="info">
    <?php
            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                echo '<div class="alert alert-danger" role="alert">';
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div>' . htmlspecialchars($error) . '</div>';
                    }
                echo '</div>';
                unset($_SESSION['errors']); 
            }?>
    
         <?php if (isset ($_SESSION["success_message"])) :?>
            <?php $success_message = $_SESSION["success_message"];
                unset($_SESSION["success_message"]);
            ?>
            <p style = "color:red;"><?= $success_message ?></p>
            <?php endif; ?>
    <h1>Hello,</h1> <br>
    <p>Hello client, welcome to registration page. 
        Please fill out the form on the side to get more complete features. 
        Please click login below if you already have an account!</p>
     <a href="login.php" type="submit" class="btn btn-primary" id="CTA2"> LOGIN </a> <br>
</div>
</body>
</html>