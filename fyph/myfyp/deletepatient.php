<?php
require 'pdo.php';
$id = $_GET['id'];
$sql = "UPDATE patients
        SET
        deleted = 1
        WHERE patient_id  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>