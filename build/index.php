<?php
require_once(__DIR__ . '/../db/pdo.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body radial-blue>
 
  <div class="container mx-auto mt-8 p-4">
    <?php
    if (isset($_SESSION['error'])) {
      echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
      echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
      unset($_SESSION['success']);
    }


    ?>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mb-5">
      <tr class="bg-gray-600 text-white">
        <th class="py-2 px-6">id</th>
        <th class="py-2 px-6">Name</th>
        <th class="py-2 px-6">Email</th>
        <th class="py-2 px-6">Password</th>
        <th class="py-2 px-6">Actions</th>
      </tr>
      <tbody class="text-gray-600">
        <?php
        $row_number =1;
        $stmt = $pdo->query("SELECT name, email, password, id FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<tr>';
          echo '<td class="py-2 px-6 border-b border-gray-300">' . $row_number++ . '</td>';
          echo '<td class="py-2 px-6 border-b border-gray-300">' . htmlentities($row['name']) . '</td>';
          echo '<td class="py-2 px-6 border-b border-gray-300">' . htmlentities($row['email']) . '</td>';
          echo '<td class="py-2 px-6 border-b border-gray-300">' . htmlentities($row['password']) . '</td>';
          echo '<td class="py-2 px-6 border-b border-gray-300">';
          echo '<a class="text-blue-500 hover:text-blue-800 mr-2" href="edit.php?user_id=' . $row['id'] . '">Edit</a>';
          echo '<a class="text-red-500 hover:text-red-800" href="delete.php?user_id=' . $row['id'] . '">Delete</a>';
          echo '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
    <a href="add.php"
      class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md transition-colors duration-300 ease-in-out">Add
      New</a>
  </div>
</body>

</html>