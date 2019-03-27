
<form action="" name="frmMain" id="frmMain" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">Name</th>
    <td><input type="text" name="txtfname" id="txtfname" size="20"></td>
    </tr>
  <tr>
    <th width="120">LName</th>
    <td><input type="text" name="txtlname" id="txtlname" size="20"></td>
    </tr>
  <tr>
    <th width="120">Email</th>
    <td><input type="text" name="txtemail" id="txtemail" size="10"></td>
    </tr>
  <tr>
    <th width="120">Telephone Number</th>
    <td><input type="text" name="txtnumber" id="txtnumber" size="10"></td>
    </tr>
  </table>
  <br>
  <input type="button" name="btnSend" id="btnSend" value="Send">
</form>

<script type="text/javascript">
		$(document).ready(function() {
			$("#btnSend").click(function() {
					$.ajax({
					   type: "POST",
					   url: "./database/add_db.php",
					   data: $("#frmMain").serialize(),
					   success: function(arr) {
							alert(arr.message);
					   }
					 });
			});
		});
</script>