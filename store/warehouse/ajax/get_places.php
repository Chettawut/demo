<?php
	header('Content-Type: application/json');
	include('../../../conn.php');

	$sql = "SELECT placescode,places,status ";
	$sql .= "FROM places  ";   

	$query = mysqli_query($conn,$sql);

	// echo $sql;

	$json_result=array(
        "placescode" => array(),
		"places" => array(),
		"status" => array()
		
		);
		
        while($row = $query->fetch_assoc()) {
            array_push($json_result['placescode'],$row["placescode"]);
			array_push($json_result['places'],$row["places"]);
			array_push($json_result['status'],$row["status"]);
        }
        echo json_encode($json_result);



?>