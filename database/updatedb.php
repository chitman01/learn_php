<?php 
    include_once "./condition.php";

    $id = 1;
    $fname = "Supawit" ;
    $lname = "Chitp";
    $email = "asdasd@asdsa.com";
    $phone = "9999999";

    $sql = "update test_1 set fname=? ,lname=? ,email=? ,t_number=? where id=?";

    $stm = $conn->prepare($sql);
    $stm->bindParam("1",$fname);
    $stm->bindParam("2",$lname);
    $stm->bindParam("3",$email);
    $stm->bindParam("4",$phone);

    $stm->bindParam("5",$id);

    try {
        $stm->execute();
        echo "update complete";
    } catch (exception $exc) {
        echo $exc->getTraceAsString();
    }
?>