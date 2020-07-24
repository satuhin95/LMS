<?php

$db=mysqli_connect( 'localhost', 'root',  '',  'lms');
function Redirect($url){
	echo "<script>self.location='{$url}';</script>";
	die();
}

