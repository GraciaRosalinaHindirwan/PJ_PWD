<?php 
require_once("koneksi.php");

session_start();

function isLogin(): bool {
    //cek login
    if (isset ($_SESSION["id"])) { 
        return true; 
    }

    return false;
}

 function loginAttempt(string $username, string $password): bool
{
  $connection = getConnection();
  $stmt = $connection->prepare("SELECT id, username FROM user WHERE username = :username AND password = :password");
  $stmt->execute([
    'username' => $username,
    'password' => $password
  ]);

  $result = $stmt->fetch(PDO::FETCH_OBJ);

  if (!$result) {
    return false;
  }

  $_SESSION["id"] = $result->id;
  $_SESSION["username"] = $result->username;

  return true;
}

?>