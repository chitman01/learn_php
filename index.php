<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>Document</title>


	<script type="text/javascript" src="jquery-1.6.4.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){

			$("#btn1").click(function(){
				$("#div1").load('./add.php');
			});
		});
	</script>


</head>
<body>
<?php
	 include 'scrip_page.php';
?>

<script type="text/javascript">
		$(document).ready(function() {
			$("#btn_delete").click(function() {
					$.ajax({
					   type: "POST",
					   url: "./database/delete_db.php",
					   data: $("#Main").serialize(),
					   success: function(arr) {
							alert(arr.message);
					   }
					 });
			});
		});
</script>

<div id="div1"></div>
<input type="button" id="btn1" value="Load">

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
		while($result = $stmt->fetch( PDO::FETCH_ASSOC ))
		{
		?>
			<tr>
				<td name="txtid" id="txtid"><div align="center"><?php echo $result["id"];?></div></td>
				<td><div align="center"><?php echo $result["fname"];?></div></td>
				<td><div align="center"><?php echo $result["lname"];?></div></td>
				<td><div align="center"><?php echo $result["email"];?></div></td>
				<td><div align="center"><?php echo $result["t_number"];?></div></td>
				<td><div align="center">
				<input type="button" name="btn_delete" id="btn_delete" value="delete">
				<input type="button" name="btn_delete" id="btn_delete" value="delete">
					</div></td>
			</tr>
		<?php
		}
		?>
		</table>
	</form>
	
	<br>
		Total <?php echo $num_rows;?> Record : <?php echo $num_pages;?> Page :
	<?php
		if($prev_page)
		{
			echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page'><< Back</a> ";
		}

		for($i=1; $i<=$num_pages; $i++){
			if($i != $page)
			{
				echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
			}
			else
			{
				echo "<b> $i </b>";
			}
		}
		if($page!=$num_pages)
		{
			echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page'>Next>></a> ";
		}
		$conn = null;
	?>

</div>


</body>
</html>