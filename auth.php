<?php 
require_once("koneksi.php");

try {
  session_start();
} catch (\Throwable $th) {
  //throw $th;
}

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
  $stmt = $connection->prepare("SELECT id, username, password FROM user WHERE username = :username");

  $stmt->execute([
    'username' => $username,

  ]);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
    return false;
  }

$hash_password = $result['password'];
if (VerifyPassword($password, $hash_password)) {
  $_SESSION["id"] = $result["id"];
  $_SESSION["username"] = $result["username"];
  return true;
} else {
  return false;
}

  // $_SESSION["id"] = $result->id;
  // $_SESSION["username"] = $result->username;

  // return true;
}

function getLoggedUser(){
  if (isLogin()) {
    $id = $_SESSION["id"];
    $connection = getConnection();
    $sql = "SELECT email, username FROM user WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt -> execute([$id]);
    $result = $stmt->fetch();

    return $result;
  } 
  return false;
} 

function hashPassword( string $password){
  $hash = password_hash($password, PASSWORD_DEFAULT);
 return ($hash);
}

function VerifyPassword( string $password, string $password_hash){
  return password_verify($password, $password_hash);
}

?>