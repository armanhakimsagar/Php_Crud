<?php

	include("function.php");
	
	header('Content-Type: application/json');

	$pdo = Database::connect();

    $sql = 'SELECT * FROM abc';
       
    $insert = project_View::view($sql); 

    echo json_encode($insert); 


?>