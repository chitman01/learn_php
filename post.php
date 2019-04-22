<?php
  include_once "./database/condition.php";

  $sql = "SELECT * FROM test_1";
    
	$stmt = $conn->prepare($sql);
	$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


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
			<tr>
				<td><div name="txtid" id="txtid" align="center"><?php echo $result["id"];?></div></td>
				<td><div align="center" data-target="firstName"><?php echo $result["fname"];?></div></td>
				<td><div align="center" data-target="lastName"><?php echo $result["lname"];?></div></td>
				<td><div align="center" data-target="email"><?php echo $result["email"];?></div></td>
				<td><div align="center" data-target="t_number"><?php echo $result["t_number"];?></div></td>
				<td width="45" height="20" align="center">
					<a href="#<?=$result['id']?>" data-role="update" data-id="<?php echo $result['id'] ;?>">Update</a>
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
					<input type="text" id="firstName" class="form-control">
				</div>
				<div class="form-group">
					<label>LastName</label>
					<input type="text" id="lastName" class="form-control">
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

</body>

<script>
		$(document).ready(function(){

			$(document).on('click','a[data-role=update]',function(){
				//alert($(this).data('id'));
				//alert($(this).data('firstName'))
				var id  = $(this).data('id');
				var firstName = $('#'+id).children('td[data-target=firstName]').text();
				var lastName = $('#'+id).children('td[data-target=lastName]').text();
				var email = $('#'+id).children('td[data-target=email]').text();
				var t_number = $('#'+id).children('td[data-target=t_number]').text();

				$('#firstName').val(firstName);
				$('#lastName').val(lastName);
				$('#email').val(email);
				$('#t_number').val(t_number);
				$('#userId').val(id);
                $('#myModal').modal('toggle');
			});
		
		});
	</script>

</html>