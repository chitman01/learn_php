<?php 
    header('Content-Type: application/json');
    include_once "./condition.php";

    $sql = "DELETE from test_1 where id=?";

    $params =array($_POST["txt_id"]);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    if($stmt){
        
        echo json_encode($arr = array('status' => '1','message'=> 'Delete successfully'));
    }
    else
    {
        echo 'Error delete data!';
    }
    $conn = null;

/*
?>