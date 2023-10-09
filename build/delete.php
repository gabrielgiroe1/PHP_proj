<?php
require_once(__DIR__ . '/../db/pdo.php');
session_start();
if (isset($_POST['delete']) && isset($_POST['user_id'])) {
  $sql = "DELETE FROM users WHERE id = :zip";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':zip' => $_POST['user_id']));
  $_SESSION['success'] = "Record deleted";
  header('Location: index.php');
  return;
}
$stmt = $pdo->prepare("SELECT name, id FROM users where id = :xyz");
$stmt->execute(array(':xyz' => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
  $_SESSION['error'] = "Bad ID number";
  header('Location: index.php');
  return;
}
?>
<p>Confirm deleting
  <?= htmlentities($row['name']) ?>
</p>
<form method="post">
  <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
  <input type="submit" value="Delete" name="delete" />
  <a href="index.php">Cancel</a>
</form>