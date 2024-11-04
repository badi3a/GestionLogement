<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM logements WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: liste.php');
?>
