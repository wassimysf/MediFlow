<?php
 $dsn = 'mysql:host=localhost;dbname=hsis';
 $username = 'root';
 $password = '';
 $options = array(
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
 );
     $pdo = new PDO($dsn, $username, $password, $options);

?>