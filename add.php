<?php
require_once 'pdo.php';
session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(
    array(
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':password' => $_POST['password']
    )
  );
  $_SESSION['success']= 'Record added';
  header("Location: index.php");
  return;
}
?>
<p>Add a new User</p>
<form method="post">
  <p>Name: <input type="text" name="name"/></p>
  <p>Email: <input type="text" name="email"/></p>
  <p>Password: <input type="text" name="password"/></p>
  <input type="submit" value="Add new"/>
  <a href="index.php">Cancel</a>
</form>