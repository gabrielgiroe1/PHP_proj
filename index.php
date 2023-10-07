<?php
require_once "pdo.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  if (isset($_SESSION['error'])){
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])){
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
  }
  echo('<table border="1">'."\n");
  $stmt= $pdo->query("SELECT name, email, password, id FROM users");
  while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
    echo '<tr><td>';
    echo(htmlentities($row['name']));
    echo '</td>'.'<td>';
    echo(htmlentities($row['email']));
    echo '</td>'.'<td>';
    echo(htmlentities($row['password']));
    echo '</td>'.'<td>';
    echo('<a href="edit.php?user_id='.$row['id'].'">Edit</a> /');
    echo('<a href="delete.php?user_id='.$row['id'].'">Delete</a>');
    echo("\n</form>\n");
    echo("</td></tr>");
  }
  ?>
  </table>
  <a href = "add.php">Add New </a>
</body>
</html>