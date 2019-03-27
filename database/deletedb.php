<?php 
    include_once "./condition.php";

    $id = 1;

    $sql = "delete from test_1 where id=?";

    $stm = $conn->prepare($sql);
    $stm->bindParam("1",$id);

    try {
        $stm->execute();
        echo "delete complete";
    } catch (exception $exc) {
        echo $exc->getTraceAsString();
    }
?>