<?php
    include_once './condition.php';

    $sql = "create table test_1(
        id int NOT NULL AUTO_INCREMENT,
        fname varchar(20),
        lname varchar(20),
        email varchar(20),
        t_number varchar(30),
        PRIMARY KEY (ID)
        )";


    $stm = $conn->prepare($sql);

    try {
        $stm->execute();
        //echo "complete";
    } catch (exception $exc) {
		echo "Connection failed: " . $e->getMessage()."<br>";
    }
?>