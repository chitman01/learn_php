<?php
    include_once './condition.php';

    $fname = "Supawit" ;
    $lname = "Chitp";
    $email = "asdasd@asdsa.com";
    $phone = "08946016501";

    $sql ="insert  into test_1(fname,lname,email,t_number) value(?,?,?,?)";

    $stm = $conn->prepare($sql);
    
    $stm->bindParam("1",$fname);
    $stm->bindParam("2",$lname);
    $stm->bindParam("3",$email);
    $stm->bindParam("4",$phone);

    try {
        $stm->execute();
        echo "insert complete";
    } catch (exception $exc) {
		echo "Connection failed: " . $exc->getMessage()."<br>";
    }
?>