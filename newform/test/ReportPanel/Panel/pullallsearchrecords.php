	<?php 

include("../dbguy/db.php");


//$mycon= new Connector;



	if(isset($_POST['id'])){
	

	

			$fromdatas=$_POST['fromdata'];
			$todatas=$_POST['todata'];
			$statusatas=$_POST['statusdata'];
			$locationdatas=$_POST['locationdata'];
			
			//echo $fromdatas."</br>";
			//echo $todatas."</br>";
			//echo $statusatas."</br>";
			//echo $locationdatas."</br>";
			//$locser=$_SESSION['locationtracker'];

//$nowdate=Date("Y-m-d");
			//transtatus='$statusatas' and transtype='$locationdatas' and
	$pullallrecord=sqlsrv_query($db,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM iou.dbo.staff_transactionallog where transtatus='$statusatas' and stafflocation='$locationdatas' and subdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM liquidation.dbo.staff_transactionallogliquid where transtatus='$statusatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM petty.dbo.staff_transactionallogpetty where transtatus='$statusatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
		");	

 		//$countboy=1;

	$a=array();
 	while($viewallrep=sqlsrv_fetch_array($pullallrecord,SQLSRV_FETCH_ASSOC)){
 		//	echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$viewallrep['staffid'].'</td><td>'.$viewallrep['fullname'].'</td><td>'.$viewallrep['transtype'].'</td><td>'.$viewallrep['stafflocation'].'</td><td>'.$viewallrep['serialnumber'].'</td><td>'.$viewallrep['staffamount'].'</td><td>'.$viewallrep['transtatus'].'</td><td><button class="btn btn-danger" id="apr"><input type="hidden" value="'.$viewallrep['serialnumber'].'" id="adp"><input type="hidden" value="'.$viewallrep['transtype'].'" id="adpt">Approve</button></form></td>';

 		$a[]=$viewallrep;

 			//$countboy=$countboy+1;
 		}
 		foreach ($a as $r) {

 			$ve['newstaffid']	=$r['staffid'];
 			$ve['newfullname']	=$r['fullname'];
 			$ve['newtransactiontype']	=$r['transtype'];
 			$ve['newlocation']	=$r['stafflocation'];
 			$ve['newserialnumber']	=$r['serialnumber'];
 			$ve['newstaffamount']	=$r['staffamount'];
 			$ve['newstatus']	=$r['transtatus'];
 			//$ve['']	=$r['transtatus'];
 			//$ve['']	=$r['transtatus'];


 			//echo '<tr style="font-size:13px;"><td></td><td>'.$r['staffid'].'</td><td>'.$r['fullname'].'</td><td>'.$r['transtype'].'</td><td>'.$r['stafflocation'].'</td><td>'.$r['serialnumber'].'</td><td>'.$r['staffamount'].'</td><td>'.$r['transtatus'].'</td><td><button class="btn btn-danger" id="aprv" name="'.$r['serialnumber'].'">Approve</button></td>';
 		}

 			echo json_encode($ve);

		}


	



//if(!isset(_POST['filterreport'])){
	
?>
