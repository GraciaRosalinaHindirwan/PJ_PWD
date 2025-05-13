
<?php

$connection = null;

function getConnection()
{
  global $connection;

  if (!$connection) {
    try {
      $dbhost = 'localhost';
      $dbname = 'owhc';
      $dbuser = 'root';
      $dbpass = '';
      $connection = new PDO(
        "mysql:host=$dbhost;dbname=$dbname",
        $dbuser,
        $dbpass
      );
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage() . "<br/>";
      die();
    }
  }

  return $connection;
}
