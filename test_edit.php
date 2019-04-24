<html>
<head>
<title>ThaiCreate.Com jQuery Tutorials</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#btn1").click(function(){

			$.post("./database/edit_db.php", { 
			data1: $("#txt1").val(), 
			data2: $("#txt2").val()}, 
				function(result){
					$("#div1").html(result);
				}
			);

		});
	});
</script>

</head>
<body>
<?php
	include_once "./database/condition.php";
	$sql = "SELECT * FROM test_1";
    
	$stmt = $conn->prepare($sql);
	$stmt->execute();
?>

<div align="center">
	<form action="" name="Main" id="Main" method="post">
		<table class="table">
			<tr>
				<th width="50"> <div align="center">ID</div></th>
				<th width="100"> <div align="center">FistName </div></th>
				<th width="100"> <div align="center">LastName </div></th>
				<th width="250"> <div align="center">Email </div></th>
				<th width="100"> <div align="center">Phone </div></th>
				<th width="200"> <div align="center">Option </div></th>
			</tr>
		<?php
		while($result = $stmt->fetch( PDO::FETCH_ASSOC )){	
		?>
			<tr id="<?php echo $result['id']; ?>">
				<td><div name="txtid" id="txtid" align="center"><?php echo $result["id"];?></div></td>
				<td><div align="center" data-target="fname"><?php echo $result["fname"];?></div></td>
				<td><div align="center" data-target="lastName"><?php echo $result["lname"];?></div></td>
				<td><div align="center" data-target="email"><?php echo $result["email"];?></div></td>
				<td><div align="center" data-target="t_number"><?php echo $result["t_number"];?></div></td>
				<td width="45" height="20" align="center">
					<a href="#" data-role="update" data-id="<?php echo $result['id'] ;?>">Update</a>
				</td>
			</tr>
		<?php
		}
		?>
		</table>
	</form>
	
	<!-- Model -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Modal</h4>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<label>FistName</label>
					<input type="text" id="fname" class="form-control" id="<?php echo $result['fname'] ;?>" >
				</div>
				<div class="form-group">
					<label>LastName</label>
					<input type="text" id="lname" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" id="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" id="t_number" class="form-control">
				</div>
				<input type="hidden" id="userId" class="form-control">
			</div>
					
			<!-- Modal footer -->
			<div class="modal-footer">
				<a href="#" id="save" class="btn btn-primary pull-right">Update</a>
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>	
		</div>
		</div>
	</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Database</button>

<input type="text" id="txt1">
<input type="text" id="txt2">
<div id="div1"></div>
<input type="button" id="btn1" value="Load">

</body>
</html>