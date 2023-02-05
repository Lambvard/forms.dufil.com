<?php

include("../dbguy/db.php");

if((isset($_POST['type']))) {
		$staffid=$_POST['staffiduse'];
		$pwd=$_POST['passworduse'];
		$loc=$_POST['Locationuse'];

		//var_dump($_POST);
		$checkstaff=sqlsrv_query($db,"SELECT * FROM dbo.ReportAdmin where staffid='$staffid' and Password='$pwd' and location='$loc'");
		$checkstaff2=sqlsrv_fetch_array($checkstaff);

		if($checkstaff2 > 0){
			//mail("tunde.afolabi@dufil.com","Testing mail","Your staffid is:"+$staffid);
			//mail("tunde.afolabi@dufil.com","Testing mail");





			/*setFrom('from@example.com', 'Mailer');
			$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo('info@example.com', 'Information');
			$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');

			$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

*/

















			echo "Connected";
			session_start();
			$_SESSION['locationtracker']=$loc;
		}else{
			echo"Not Connected";
		}



		
		
}
elseif((isset($_POST['approveid']))) {
		$changer="Approved";
		$ser=$_POST['transactionid'];
		$tra=$_POST['transactiontype'];

		//echo $transactiontype;

		if($tra=="IOU"){
			$transactiontypes=sqlsrv_query($db,"UPDATE IOU.dbo.staff_transactionallog SET transtatus='$changer' where serialnumber='$ser'");
			echo "found";

		}
		elseif ($tra=="Petty Cash") {
			$transactiontypes=sqlsrv_query($db,"UPDATE petty.dbo.staff_transactionallogpetty SET transtatus='$changer' where serialnumber='$ser'");
			echo "found";
		}
		elseif ($tra=="Liquidation") {
			$transactiontypes=sqlsrv_query($db,"UPDATE Liquidation.dbo.staff_transactionallogliquid SET transtatus='$changer' where serialnumber='$ser'");
			echo "found";
		}

		/*elseif ($transactiontype=="Petty Cash") {
			$transactiontypes=sqlsrv_query($db,"UPDATE $transactiontype.dbo.staff_transactionallogpetty SET transtatus='$changer' where serialnumber='$serialnumber'");
			echo 1;
			
		}elseif ($transactiontype=="Liquidation") {
			$transactiontypes=sqlsrv_query($db,"UPDATE $transactiontype.dbo.staff_transactionallogliquid SET transtatus='$changer' where serialnumber='$serialnumber'");
			echo 1;
		}*/
		

}
?>