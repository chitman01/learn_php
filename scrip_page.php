<?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   include './database/condition.php';

    $sql = "SELECT count(*) FROM test_1";
    //$sql = "SELECT * FROM test_1";
    
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$num_rows = $stmt->fetchColumn();

	$per_page = 2;   // Per Page
	$page  = 1;
	
	if(isset($_GET["Page"]))
	{
		$page = $_GET["Page"];
	}

	$prev_page = $page-1;
	$next_page = $page+1;

	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{
		$num_pages =1;
	}
	else if(($num_rows % $per_page)==0)
	{
		$num_pages =($num_rows/$per_page) ;
	}
	else
	{
		$num_pages =($num_rows/$per_page)+1;
		$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{
		$row_end = $num_rows;
	}
	$sql = "SELECT * FROM test_1";
    
	$stmt = $conn->prepare($sql);
	$stmt->execute();

?>