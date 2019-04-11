<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        include_once "./condition.php";
        $sql = "SELECT * from test_1 where id=?";
        $params =array($_POST["id"]);
    ?>
    
<div align="center">
	<form action="" name="Main" id="Main" method="post">
		<table width="800" border="1">
			<tr>
				<th width="50"> <div align="center">ID </div></th>
				<th width="100"> <div align="center">Name </div></th>
				<th width="100"> <div align="center">LastName </div></th>
				<th width="250"> <div align="center">Email </div></th>
				<th width="100"> <div align="center">Phone </div></th>
				<th width="200"> <div align="center">Option </div></th>
			</tr>
            <?php
                $result["id"] = $stmt->fetch( PDO::FETCH_ASSOC )
                //https://www.ninenik.com/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9E%E0%B8%B4%E0%B9%88%E0%B8%A1_%E0%B8%A5%E0%B8%9A_%E0%B9%81%E0%B8%81%E0%B9%89%E0%B9%84%E0%B8%82_%E0%B9%81%E0%B8%9A%E0%B9%88%E0%B8%87%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2_%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5_%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2_jquery_ajax_%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%87%E0%B9%88%E0%B8%B2%E0%B8%A2-372.html
                //https://www.thaicreate.com/tutorial/ajax-edit-update-record.html
                //https://www.w3schools.com/php/showphpfile.asp?filename=demo_db_select_pdo
            ?>
            <tr>
                <td><div name="txtid" id="txtid" align="center"><?php echo $result["id"];?></div></td>
                <td><div align="center"><?php echo $result["fname"];?></div></td>
                <td><div align="center"><?php echo $result["lname"];?></div></td>
                <td><div align="center"><?php echo $result["email"];?></div></td>
                <td><div align="center"><?php echo $result["t_number"];?></div></td>
            </tr>
            

</body>
</html>