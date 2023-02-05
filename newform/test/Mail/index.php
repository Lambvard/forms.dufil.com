<!DOCTYPE html>
<html>
<head>
	<title>Mail Logger</title>
</head>
<body>


<section>
	<div>
		<form method="POST" action="servermail.php">
			<div><input type="text" name="to" placeholder="to:"></div>
			<div><input type="text" name="copy" placeholder="copy:"></div>
			<div><input type="text" name="subject" placeholder="subject:"></div>
			<textarea cols="30" rows="6" placeholder="Body" name="body">
				
			</textarea>
			<div><button>Submit</button></div>
		</form>
	</div>
</section>
</body>
</html>