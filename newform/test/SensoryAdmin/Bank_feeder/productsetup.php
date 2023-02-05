<!DOCTYPE html>
<html>

<head>
<?php include("../dbank/db.php");?>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			//$('#ent').click(function(){
				//alert("Welcome"+" "+$('#usertext').val());
			//$('#valin').val()=$('#usertext').val();

			$('#lod').load('allproduct.php');

			},1000);

			$('#createproduct').click(function(e){

				e.preventDefault();
				var un=$('#pname').val();
				var pn=$('#sname').val();
				var dn=$('#dname').val();


				if(un== "" || pn=="" || dn==""){
					alert("All fields are required!");
					$('#errorlog').html('<b class="alert alert-danger">'+'All fields are required'+'</b>');

				}else{


					$.ajax({
						
						url: '../dbank/server.php',
						method: 'POST',
						data:{
							type:1,
							'productname':un,
							'SKUname':pn,
							'description':dn

						},

						success: function(dataresult){
							var messagesvar="";
							if(dataresult==1){
								messagesvar="New Product has been successfully added!";
								//ssalert("YES");

							}else{
								messagesvar="Yes I am yet to connected";
								//alert("NO");
							}
							$('#errorlog').html('<b class="alert alert-info">'+messagesvar+'</b>');

						}



				});




				}






				
				//alert("YES");

				


			});
		});
	</script>
</head>
<body>

		<div class="container" style="margin-bottom:30px;">
			<div class="row">
				<label style="color: green;"><h1>Setup New Product</h1></label>
			</div>
			<div class="row">
				<label><h3 class="alert alert-secondary">Current Product</h3></label><br>
			</div>
			<div id="lod" class="row" style="overflow: scroll; height: 250px;">
					
					
				</div>

<div class="container">
					<div><label><h2>Register New Product</h2></label></div>
					<div class="form-group row">
						<label>Product Name:</label>
						<input type="text" name="" placeholder="Enter the product name" class="form-control" id="pname" required>
					</div>

					<div class="form-group row">
						<label>SKU Name:</label>
						<input type="text" name="" placeholder="Enter the SKU name" class="form-control" id="sname" required>
					</div>

					<div class="form-group row">
						<label>Description:</label>
						<input type="text" name="" placeholder="Enter product description" class="form-control" id="dname" required>
					</div>
					<div class="form-group row">
						<button class="btn btn-danger" id="createproduct" name="createproduct">Create Product</button>
					</div>
					<div class="row" id="errorlog" ></div>
					
				</div>






		</div>





</body>
</html>
