<?php 
    include_once ("./condition.php");

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
    /* มาจากหน้า index.php
    <?php
            $sql="select * from test_1";

            $stm = $conn->prepare($sql);
            try {
                $stm->execute();
            } catch (exception $exc) {
                echo $exc->getTraceAsString()."<hr>";
            }
        ?>
        <table width="600" border="1" align="center">
            <tr>
                <th><div align="center">ID</div></th>
                <th><div align="center">FirstName</div></th>
                <th><div align="center">LastName</div></th>
                <th><div align="center">Email</div></th>
                <th><div align="center">Talaphone_number</div></th>
            </tr>
                <?php while($row=$stm->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>
                        <th><?php echo $row['id']; ?></th>
                        <th><?php echo $row['fname']; ?></th>
                        <th><?php echo $row['lname']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['t_number']; ?></th>
                    <?php } 
                ?>
            </tr>
            

        </table>
    */
?>