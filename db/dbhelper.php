<?php
require_once ('config.php');
function execute($sql) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	mysqli_query($conn, $sql);


	mysqli_close($conn);
}

function executeResult($sql) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	$resultset = mysqli_query($conn, $sql);
	if(isset($resultset) && $resultset !=null){
		$data = mysqli_fetch_assoc($resultset);
	}

	mysqli_close($conn);

	return $data;
}
function test($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');
	$resultset = mysqli_query($conn, $sql);
	mysqli_close($conn);
	return $resultset;
}

