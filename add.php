<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD</title>
    <?php 
        include './database/condition.php'
    ?>
</head>
<body>
    <div align="center">
        <h1>add page</h1>
    </div>
    <div>
        <?php 
            
    $sql="select * from test_1";

    $stm = $conn->prepare($sql);

    try {
        $stm->execute();
        echo "complete";
    } catch (exception $exc) {
        echo $exc->getTraceAsString();
    }
    

    while($row=$stm->fetch(PDO::FETCH_ASSOC)){
        echo "<br>";
        echo "id    : ".$row['id']."<br>";
        echo "fname : ".$row['fname']."<br>";
        echo "lname : ".$row['lname']."<br>";
        echo "email : ".$row['email']."<br>";
        echo "phone : ".$row['t_number']."<br>";
        echo "---------------------------------------"."<br>";
    }
        ?>
    </div>
</body>
</html>