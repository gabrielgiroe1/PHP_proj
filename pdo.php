<?php
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=first_db_proj',
'mysql', 'mysql');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>