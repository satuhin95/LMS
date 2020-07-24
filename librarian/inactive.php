<?php 
require_once '../db.php';

$id = base64_decode($_GET['id']);
 $sql = "update students set status='0' where id ='$id'";
 $result = $db->query($sql);
 Redirect('students.php');
 
