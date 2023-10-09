<?php
require_once(__DIR__ . '/../db/pdo.php');
session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  if (strlen($_POST['name']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1) {
    $_SESSION["error"] = "Please fill in all fields";
    header('Location: index.php');
    return;
  }

  if (strpos($_POST['email'], '@') === false) {
    $_SESSION['error'] = 'This is not a valid email';
    header('Location: index.php');
    return;
  }


  $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(
    array(
      ':name' => $_POST['name'],
      ':email' => $_POST['email'],
      ':password' => $_POST['password']
    )
  );
  $_SESSION['success'] = 'Record added';
  header("Location: index.php");
  return;
}
?>
<p>Add a new User</p>
<form method="post">
  <p>Name: <input type="text" name="name" /></p>
  <p>Email: <input type="text" name="email" /></p>
  <p>Password: <input type="text" name="password" /></p>
  <input type="submit" value="Add new" />
  <a href="index.php">Cancel</a>
</form>