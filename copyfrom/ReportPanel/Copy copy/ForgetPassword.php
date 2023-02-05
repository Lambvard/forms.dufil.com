<html>
<head>
<style type="text/css">


	.main-section{
		margin: 100px auto;
		margin-top: 100px;
		padding: 0px;
	} 

.modal-content: {
	    height: 200px;
	    width: 200px; 
		opacity: 100% 50%;
		padding: 0px 10px;
		box-shadow: 0px 5px 10px;

        }

	.Image img{
		height: 100px;
		width: 15px 5px 30px;
		border-radius: 10spx solid; 
		box-shadow:  #06695F;
		padding: 15px 5px 30px;	
		padding-bottom: 50px;

	}


	.text-area{
		padding: 0px 8px 10px;
       	margin: 0px;
       	position: relative;
	}


	 .text-area::before: {

       	padding: 0px 5px 10px;
       	margin: 0px;
       	position: relative;
       	padding-top: 20px;
       }


.text-area input{
height: 20px;
border: 0px;
border-radius: 2px;
font-size: 10px;
font-family: sans-serif;
padding-left: 10px;
padding: 12px 10px 12px;
}


	button{
	width :80px;
	margin: 8px 0px 8px;
}



.btn{
	font-size: 20px;
	font-style:italic;
	font-family: cursive;
	padding: 7px;
	padding-bottom: 0px;
	border: 0px;
	border-radius: 5px;
	border-bottom: 4px solid;
}
.btn:hover .btn:focus

}


.GoBack{
	padding: 2px 0px 10px;
}


a{
	padding: 3px 0px 10px;
}


p{
	font-size: 15px;
	font-family: cursive;
}
	
	
</style>

<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<title>
		
	</title>
</head>
<body>

<div class="modal-dialog text-center">
	<div class=" col-8 main-section">
<div class="modal-content">
	<div class="col-12 Image">
		<img src="SensoryPage/../image/NewDprima2.png">
	</div>

	<form class="col-11" style="padding-right: 0%;" method="POST">


		<div class ="text-area">
			<input type="text" name="Username" placeholder="Enter Username" class="form-control">
		</div>
		<div class="text-area">
			<input type="text" name="EmailID" placeholder="Enter Email" class="form-control">	
		</div>
		<button type="submit" value="login" class="btn btn-primary">Submit</button>
	</form>
	<div class="GoBack"><a href="Admin.php" style="text-decoration: none;">Go back to Admin page</a>
	<p><marquee> Copyright by Dufil MIS OTA</marquee></p>
</body>