<?php 
require_once "../db.php";
$id = base64_decode($_GET['id']);

$sql = "DELETE FROM `books` WHERE id ='$id'";
$result = $db->query($sql);
Redirect('manage_book.php');

