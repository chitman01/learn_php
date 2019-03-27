<?php
  header('Content-Type: application/json');
  include_once './condition.php';

  $sql ="INSERT  into test_1(fname,lname,email,t_number) value(?,?,?,?)";

  $params = array($_POST["txtfname"], $_POST["txtlname"], $_POST["txtemail"], $_POST["txtnumber"]);

  $stmt = $conn->prepare($sql);
  $stmt->execute($params);

  if($stmt){
      
      echo json_encode($arr = array('status' => '1','message'=> 'Record add successfully'));
  }
  else
  {
      echo 'Error insert data!';
  }
  $conn = null;

/*
    header('Content-Type: application/json');

    $arr = array(
        "fname"=>$_POST["txtfname"],
        "lname"=>$_POST["txtlname"],
        "email"=>$_POST["txtemail"],
        "t_number"=>$_POST["txtnumber"]);

    echo json_encode($arr);
*/
?>