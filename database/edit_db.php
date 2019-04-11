<?php 
    include_once "./condition.php";

    $sql = "DELETE from test_1 where id=?";
    $params =array($_POST["id"]);


?>