<?php
include '../db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM menu_items WHERE id = ?");
$stmt->execute([$id]);

header("Location: read.php");
?>