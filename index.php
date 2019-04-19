<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <title>Document</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="jquery-1.6.4.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#btn1").click(function(){
				$("#div1").load('./add.php')
				event.preventDefault();
				$(this).parent("td").parent("tr").fadeOut();
			});
		});

		$(document).ready(function(){
		$(".delItem").click(function(){
			event.preventDefault();
			var idMember=$(this).attr("href");
			idMember=idMember.replace("#","");
			$(this).parent("td").parent("tr").fadeOut();	//hide
			$.post("./database/delete_db.php",
			{
			id: idMember
			},
			function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
			});
		});
		});

		$(document).ready(function(){
			$(document).on('click','a[data-role=update]',function(){
				//alert($(this).data('id'))
				//alert($(this).data('firstName'))
				var  id = $(this).data('id');
				var  firstName = $('#'+id).children('td[data-target=firstName]').text();
				var  lastName = $('#'+id).children('td[data-target=lastName]').text();
				var  email = $('#'+id).children('td[data-target=email]').text();
				var  t_number = $('#'+id).children('td[data-target=t_number]').text();

				$('#firstName').val(firstName);
				$('#lastName').val(lastName);
				$('#email').val(email);
				$('#t_number').val(t_number);
				$('#userId').val(id);
				$('#myModal').modal('toggle');
			})
		});
		$('#save').click(function(){
			var id = $('#userId').val();
			var firstName = $('firstName').val();
			var lastName = $('#lastName').val();
			var email = $('#email').val();
			var t_number = $('#t_number').val();

			$.ajax({
				url		:	'',
				method	:	'post';
				data 	:	{firstName : firstName , lastName : lastName , email : email , id : id},
				success : function(response) {
								console.log(response);
							}
			})
		})
	</script>

</head>
<body>
<?php
	 include 'scrip_page.php';
?>






<div id="div1"></div>
<input type="button" id="btn1" value="Load">

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
					<a href="#<?=$result['id']?>" class="delItem">delete</a>
					<a href="#" data-role="update" data-id="<?= $result['id'] ?>">update</a>
				</td>
			</tr>
			<!--delete	 https://www.ninenik.com/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9E%E0%B8%B4%E0%B9%88%E0%B8%A1_%E0%B8%A5%E0%B8%9A_%E0%B9%81%E0%B8%81%E0%B9%89%E0%B9%84%E0%B8%82_%E0%B9%81%E0%B8%9A%E0%B9%88%E0%B8%87%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2_%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5_%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2_jquery_ajax_%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%87%E0%B9%88%E0%B8%B2%E0%B8%A2-372.html 
			post 	https://www.w3schools.com/jquery/jquery_ajax_get_post.asp
			-->

			<!-- Model -->
			<div class="modal" id="myModal" role="dialog">
				<div class="modal-dialog">
				<div class="modal-content">
				
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Update Database</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<div class="form-group">
							<label>ID</label>
							<input type="hidden" id="id" class="form-control">
						</div>
						<div class="form-group">
							<label>FistName</label>
							<input type="text" id="fistName" class="form-control">
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
							<input type="text" id="phone" class="form-control">
						</div>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						<a href="#" id="save" class="btn btn-primary pull-left">Update</a>
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
					</div>
					
				</div>
				</div>
			</div>

		<?php
		}
		?>
		</table>
	</form>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Database</button>
		<!-- https://www.youtube.com/watch?v=aujNp92p0Uc 
			http://developer-zone.000webhostapp.com/2017/09/update-data-using-jquery-ajax-php-and-mysql
		-->


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