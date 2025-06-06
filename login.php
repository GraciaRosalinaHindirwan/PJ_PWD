<?php
require_once("auth.php");
require_once("koneksi.php");
require_once ("route.php");

if (isLogin()) {
    require_once ("route.php");
    redirect("home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  ($_POST["username"]);
    $password =  ($_POST["password"]);

    $result = loginAttempt($username, $password);

    if ($result) {
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $result["id"];
        redirect("home.php");
  } else {
        $_SESSION["login_error"] = "Invalid Username or Password";
        redirect("login.php");
  }

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<style>
    body{
    background-image: url(img/header-regis.webp);
    background-position: top center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    font-family: "Quicksand";
    }
    .login{
    padding: 30px;
    background-color: #fff2f2e6;
    border-radius: 20px;
    width: 400px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 8px;
    }
</style>

<body>
    <div class="header">
        <img src="img/owhc.png" alt="">
    </div>
    
<div class="container">
    <div class="login">
       <h1 style="color: #7886c7;" class="bi bi-person">Login</h1> <br>
       <?php if (isset ($_SESSION["login_error"])) :?>
        <?php $login_error = $_SESSION["login_error"];
            unset($_SESSION["login_error"]);
        ?>
            <p style = "color:red;"><?= $login_error ?></p>
        <?php endif; ?>
            <form action="login.php" method="post">
                <div class="card-text">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingname" placeholder="username" name="username">
                        <label for="floatingname" class="bi bi-person"> Username</label>
                     </div>
                    <br>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingpw" placeholder="Password" name="password">
                        <label for="floatingpw" class="bi bi-key"> Password</label>
                    </div>

                <div>
                    <button type="submit" class="btn btn-outline-primary" id="CTA">SIGN IN</button></a>
                </div>

                <div class="regis">
                    <p style="color: #2D336B;">Don't Have an Account? 
                        <a href="register.php">Register Here</a></p>
                </div>
            </form> 
    </div>
</div>
</body>
</html>
