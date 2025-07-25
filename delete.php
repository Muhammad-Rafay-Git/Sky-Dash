<?php
include 'connection.php';

$id = $_GET['id'];

$delete = "DELETE FROM management WHERE id = $id";
mysqli_query($conn, $delete);

header('Location: index.php');
?>