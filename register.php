<?php 
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = ($_POST["email"]);
    $username =  ($_POST["username"]);
    $password =  ($_POST["password"]);
    $confirm = ($_POST["confirm"]);
    $check = isset ($_POST["check"]);

 //validasi 
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["login_error"] = "Format E-mail Tidak Valid";
            require_once("route.php");
            redirect("register.php");
   } if (strlen($username) < 3) {
    $_SESSION["login_error"] = "Username Minimal 3 Karakter";
   } if ($password != $confirm) {
    $_SESSION["login_error"] = "Password Tidak Sama";
   } if (strlen($password)<6) {
    $_SESSION["login_error"] = "Password Minimal 6 Karakter";
   } if(!$check){
    $_SESSION["login_error"] = "Anda Harus Menyetujui Syarat dan Ketentuan";
   }

    $username = htmlspecialchars($username);
    $email = htmlspecialchars($email);

   if (!empty($error)) {
    foreach ($error as $error) {
       echo "<p style='color:red;'>$error</p>";
    }
   }

    if (empty($error)) {
       $sql = "INSERT INTO user (email, username, password) VALUE (?, ?, ?)";
       $connection = getConnection();
       $stmt = $connection->prepare($sql); //prepared statement 

       try{
        $stmt->execute([$email, $username, $password]);
        if ($stmt -> rowcount()) {
        $_SESSION["login_error"] = "Register Berhasil";
        require_once("route.php");
        redirect("login.php");
        }
       } catch(Exception $e){
            $_SESSION["login_error"] = "Invalid Username or E-mail";
            require_once("route.php");
            redirect("register.php");
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
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="card" style="width: 70vh;">
    <img src="img/header-regis.webp" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">REGISTER</h5>
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
            </div>
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
     <?php if (isset ($_SESSION["login_error"])) :?>
        <?php $login_error = $_SESSION["login_error"];
            unset($_SESSION["login_error"]);
        ?>
        <p style = "color:red;"><?= $login_error ?></p>
        <?php endif; ?>

    <h1>Hello,</h1> <br>
    <p>Hello client, welcome to registration page. 
        Please fill out the form on the side to get more complete features. 
        Please click login below if you already have an account!</p>
     <a href="login.php" type="submit" class="btn btn-primary" id="CTA2"> LOGIN </a> <br>
</div>
</body>
</html>