<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register User</title>
	<link rel="stylesheet" type="text/css" href="../boots/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/tund.css">
	<script type="text/javascript" src="../boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function(){


			$('#viewall').load('allrecordpuller.php');
			//alert("YES");
			/*$('#staffidnewsave').on('input',function(){

				var userinputsave=$('#staffidnewsave').val();

				//alert(userinput);
				if(userinputsave ==""){
					alert("You need to enter the a valid already registerd staff ID");

				}else{
					$.ajax({
						url:'../db/server.php',
						method:'POST',
						data:{searchsave:1,userinputsave:userinputsave},
						dataType:'JSON',
						success: function(saveuser){
								
							if(saveuser=="exist"){
								alert("The Inputed Staff ID already exist in my database ");
							}
							//alert("User exist");
							//$('#firstnamesave').val(saveuser.surname);
							//$('#firstname').val(evuser.firstname);
							//$('#othername').val(evuser.othernames);
							//$('#dept').val(evuser.dept);
							//$('#location').val(evuser.location);
							


						}
						

					});
				}

			});


			$('#upda').click(function(){
					
						var firstnamesave=$('#firstnamesave').val();
						var surnamesave=$('#surnamesave').val();
						var othernamesave=$('#othernamesave').val();
						var deptsave=$('#deptsave').val();
						var location=$('#location').val();
						var staffidnewsave=$('#staffidnewsave').val();


					if(firstnamesave=="" || surnamesave=="" || othernamesave=="" || deptsave=="" || location==""){
							alert("All fields are required before I can save");
					}
					else{
					alert("Are you sure of this operation, This will operation will save the user record");
						$.ajax({
						url:'../db/server.php',
						method:'POST',
						data:{savenewstaff:1,staffidnewsave:staffidnewsave,firstnamesave:firstnamesave,surnamesave:surnamesave,othernamesave:othernamesave,deptsave:deptsave,location:location},
						dataType:'JSON',
						success: function(saveuser){
								
							if(saveuser=="exist"){
								alert("The Inputed Staff ID already exist in my database ");
								$('#surnamesave').prop('disabled', true);

							}else if(saveuser=="successful"){
								alert("Records saved successfully!");

							}else if(saveuser=="notsaved"){
								alert("Record not saved");

							}else if(saveuser=="userexist"){
								alert("The Inputed Staff record already exist in my database");

							}
						
							//$('#firstnamesave').val(saveuser.surname);
							//$('#firstname').val(evuser.firstname);
							//$('#othername').val(evuser.othernames);
							//$('#dept').val(evuser.dept);
							//$('#location').val(evuser.location);
							


						}
						

					});








					}

				
			});*/

			$('#changeop').click(function(){
				alert(Yes);
			});

		});
	</script>
</head>
<body>


	

	
				
				<div id="viewall">
					
				</div>
				

			
</body>
</html>