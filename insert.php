<?php
    session_start();
?>
<html>
    <head>
        <?php
            include_once './database/condition.php';
        ?>
    </head>
    <body>
        <?php
        // Echo session variables that were set on previous page
        echo "Favorite color is " . $_SESSION["favcolor"].".<br>";
        echo "Favorite animal is " . $_SESSION["favanimal"].".";
        ?>
        
        <br><br><br><br><br><br><br><br><br><br>
        <form  action=".php" method="get">
        <table border="0" cellspacing="0" cellpadding="5" style="600" align="center">
            <tr>
                <td> ชื่อ : </td>
                <td><input name="fname" type="text"  size="30" maxlength="20"></td>
            </tr>
            
            <tr>
                <td> นามสกุล : </td>
                <td><input name="lname" type="text" size="30" maxlength="20"></td>
            </tr>
            <tr>
                <td>email :</td>
                <td><input name="email" type="text" size="30" maxlength="20"></td>
            </tr>
            <tr>
                <td>Tel :</td>
                <td><input name="tel" type="text" size="30" maxlength="10"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" class="btn btn-success">ยืนยัน</button></td>
            </tr>
        </table>
        </form>

    </body>
</html>