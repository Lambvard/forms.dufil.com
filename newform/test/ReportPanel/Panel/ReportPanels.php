<!DOCTYPE html>
<?php 
include("../dbguy/db.php");
session_start();

//if(!isset($_SESSION['locationtracker'])){
//	header("Location:../index.php?id=yes");
//}
?>
<html>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<title>Report Panel</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="../util/Fonts/css/all.css">
	<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>



	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#downloadreport').hide();
			$('#showreport').hide();
			$('#view').click(function(){
				//alert("YES YES");
				$('#showreport').toggle(1000);
				setInterval(function(){
				$('#viewpourfilter').load('showallreports.php');
				},1000);
			});

			$('#viewdownload').click(function(){
				$('#downloadreport').toggle(1000);
				$('#downloadreport').show();
				//setInterval(function(){
				//$('#viewpourfilter').load('showallreports.php');
				//},1000);
			});




			$('#logoutboy').click(function(){
				if(confirm("Are you sure of this logout operation?")){
					//alert("Small boy like you want to logout");
					window.location.href="logout.php";
				}
			});



				$('button[id^="unid"').click(function(){
						//var serialnumber =$('#adp').val();
						var transactiontype =$(this).val();
						var serialnumber=$(this).attr('name');
					//	alert(serialnumber);
						//alert(transactiontype);
					if(confirm("Do you want to approve this transaction?")){
						//	alert(serialnumber +"    "+transactiontype);

						$.ajax({
							url:'server.php',
							method:'POST',
							data:{
								appr:1,
								serialnumber:serialnumber,
								transactiontype:transactiontype
							},
							dataType:'JSON',

							success: function(ev){
								//if(ev==1){
										alert("Transaction Approved Successfully");

										window.location.reload();
							//	}else{
										//alert(ev.trans);
								//}
							}

						});
					}
					//alert("Waht do you want");
				});




		});





/*			//$('#showreport').hide();
			$('#downloadreport').hide();
			$('#showall').hide();




















			
				//$('#showall').show();
				//$('#showconfirmed').hide();
				//$('#showpending').hide();
				//$('#showall').hide();

				$('#All').click(function(){
					$('#showall').toggle();
					//$('#showconfirmed').hide();
					//$('#showpending').hide();
					//$('#showall').hide();
							setInterval(function(){
							$('#viewpourfilter').load('showallreports.php');
							},1000);
				//	setInterval(function(){
				//	$('#viewpour').load('showallreports.php');
				//	},1000)
					//$.ajax({
					//	url: '';
					//});


			//	$('#pullall').click(function(e){
			//	e.preventDefault();
			//	var fromd=$('#fromsearch').val();
			//	var tod=$('#tosearch').val();
			//	var statusd=$('#statusserach').val();
			//	var locationd=$('#locationsearch').val();

			//		$.ajax({
			//		url: 'showallreports.php',
			//		method: 'POST',
			//		data:{
			//			type:1,
			//			'fromdate':fromd,
			//			'todate':tod,
			//			'statusnow':statusd,
			//			'location':locationd
			//		},
			//		success: function(dataresultpullboy){
			//				if(dataresultpullboy==1){
			//				
			//				}else if(dataresultpullboy=="filterreport"){
			//					alert("Working working");
			//				}
			//			}


				//});



















				});
				$('#pendingrep').click(function(){
					$('#showpending').toggle();
					$('#showconfirmed').hide();
					//$('#showpending').hide();
					$('#showall').hide();

						//setInterval(function(){
						//	$('#showpending').load('showallreports.php');
						//	},1000);





				});
				$('#comfirmedrep').click(function(){
					$('#showconfirmed').toggle();
				//	$('#showconfirmed').hide();
					$('#showpending').hide();
					$('#showall').hide();

				});
				




			});
			$('#viewdownload').click(function(){
				$('#downloadreport').toggle(1000);
				$('#downloadreport').show();

			});


			

					//alert("Your from"+fromd+"and To"+tod+"The status"+statusd+"and location is"+locationd);
			});

				$('#apr').click(function(){
					if(confirm("Are you sure of this approval?")){
						alert("YES");

						$.ajax({});
					}
				});



		});*/
	</script>
</head>
<body>

<style type="text/css">
	li{
		margin:10px; 
		text-decoration:unset;

		/*font-size: 14px;*/
	}

</style>


<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
   <div  class ="container">
    <div class="row">
      <div class="row"><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>

<div style="margin-top: 50px;"></div>
<section class="container">
	<div class="row">
		<ul class="nav nav-pills">
			<li><a href="#" class="active" id="homeboy">Home</a></li>
			<li><a href="#" id="viewrecord">View Records</a></li>
			<li><a href="#" id="downloadrec">Download Records</a></li>
			
			
		</ul>
	</div>
</section>

<section class="container" style="display: none;">
<div class="container">
	<div class="row">
	<table class="">
		<tr><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: red;"></i><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: blue;"></i><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: red;"></i><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td></tr>
		<tr><td><label style="font-size: 16px; font-weight: bold; color: black;">All Submitted Transactions </label></td><td><label style="font-size: 16px; font-weight: bold; color: black; ">Pending approval Transactions </label></td><td><label style="font-size: 16px; font-weight: bold; color: black; ">Already Approved Transactions </label></td></tr>
	</table>
</div>
</div>

<!--<div class="container">
 <div class="row">
    	<div class="row col-sm-3">
    		<div class="row m-auto" style="margin: 0px;">

    			<table>
    				<tr><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: red;"></i></td><td><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td></tr>
    				<tr ><td colspan="2"><label style="font-size: 16px; font-weight: bold; color: black">All Submitted Transactions </label></td></tr
    			</table>   	
    			<label style="font-size: 16px; font-weight: bold; color: black; text-align: center;">All Submitted Transactions </label>		</br>
    		</div>
    	
    	</div>
    <div class="row col-sm-3">
    	<div class="row m-auto " style="margin: 0px;">

    			<table>
    				<tr><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: blue;"></i></td><td><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td></tr>
    				tr ><td colspan="2"></td></tr>
    			</table></br>
    			<label style="font-size: 16px; font-weight: bold; color: black;text-align: center;">All Submitted Transactions </label>
    	</div>
    	
    </div>
    <div class="row col-sm-3">
    	<div class="m-auto" style="margin: 0px;">

    			<table>
    				<tr><td><i class="fa fa-envelope" aria-hidden="true" style="font-size: 40px; color: black;"></i></td><td><label style="font-size: 40px; font-weight: bold;color: black;"> 3</label></td></tr>
    				<tr ><td colspan="2"><label style="font-size: 16px; font-weight: bold; color: black">All Submitted Transactions </label></td></tr>
    			</table></br>
    			<label style="font-size: 16px; font-weight: bold; color: black;text-align: center;">All Submitted Transactions </label> 			
    	</div>
    </div>
    </div>
    //setInterval(function(){
				//	$('#showreport').load('showallreports.php');
				//},1000)
</div>-->
</section>

<section class="container">
	<div class="container">
	<div  class=" row alert alert-info "><b style="">Report:</b></div>
	<div style="font-family:Helvetica, sans-serif;"> This page is for you to perform some super user activities on the already submitted forms in your location, You are expected to search and approve the transactions submitted by your respectives users. Any approved transactions will automatically disappear from the list of records </div>
	</div>
	<div class="container">
	<div class="row">
	<button class="alert alert-danger form-control" style="background-color: purple; color: white;font-size: 20px;" id="view">View Current Transactions</button>
	</div>
	<div class="row" id="showreport">

		<div class="container">
	
			
</div>
	<div class="row" id="showall">
		
		<div class="container">
			<div class="row" id="viewall">
				
				<div class="row" id="viewpour">
					
				</div>
				<div class="row">
				<div class="container" id="viewpourfilter">
					
				</div>
				</div>
			</div>
		</div>







		
	</div>
	<!--<div class="row" id="showpending">
		<h1>Show pending reports here</h1>
		
	</div>
	<div class="row" id="showconfirmed">
		<h1>Show comfirmed reports here</h1>
		
	</div>-->
		</div>

			
	</div>

	<div class="row">
	<button class="alert alert form-control" style="background-color: purple; color: white; font-size: 20px;" id="viewdownload">Approve Transactions</button>

	<div class="" id="downloadreport">
		<form method="POST" action="ReportPanels.php?id=pull" >
			<div class="form-inline">
					<label><b>From:</b></label><input type="date" id="fromsearch" placeholder="From" class="form-control" name="fromdata"><label><b>To:</b></label><input type="date" id="tosearch" placeholder="To" class="form-control" name="todata"><b>Status:</b></label><select class="form-control" id="statusserach" name="statusdata">
						<option>Pending</option>
						<option>Approved</option>


					</select>

						<b>Location:</b></label><select class="form-control" locati name="locationdata">

							<?php 
							//$pullallrecordday=sqlsrv_query($db,"SELECT * FROM liquidation.dbo.companyprofile");
							//while ($pullallrecorddays=sqlsrv_fetch_array($pullallrecordday,SQLSRV_FETCH_ASSOC)) {
									echo '<option>'.$_SESSION['locationtracker'].'</option>';
							//}

							?>
					</select>

					<button name="" class="btn btn-danger" id="pullall">Search Record</button>
				</div>
		</form>
				<!-- Table  -->
	<div class="container">
					

	<div class="row">
 	<table class="table table-stripped"> 
 		<thead style="background-color:#4B026D;color: white;"><tr><td>SN</td><td>StaffID</td><td>Fullname</td><td>Transaction Type</td><td>Location</td><td>Transaction ID</td><td>Amount</td><td>Status</td><td>Change</td></tr></thead>


 		<?php 




//$mycon= new Connector;



	if(isset($_GET['id'])){
		$pick=$_GET['id'];

		if ($pick=="pull") {

			$fromdatas=$_POST['fromdata'];
			$todatas=$_POST['todata'];
			$statusatas=$_POST['statusdata'];
			$locationdatas=$_POST['locationdata'];


			$_SESSION['fromdata']=$_POST['fromdata'];
			$_SESSION['todata']=$_POST['todata'];
			$_SESSION['statusdata']=$_POST['statusdata'];
			$_SESSION['locationdata']=$_POST['locationdata'];
			
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
 		$countboy=1;
 		foreach ($a as $r) {
 			echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$r['staffid'].'</td><td>'.$r['fullname'].'</td><td>'.$r['transtype'].'</td><td>'.$r['stafflocation'].'</td><td>'.$r['serialnumber'].'</td><td>'.$r['staffamount'].'</td><td>'.$r['transtatus'].'</td><td><button class="btn btn-danger" id="unid" name="'.$r['serialnumber'].'" value="'.$r['transtype'].'">Approve</button></td>';
 			$countboy=$countboy+1;
 		}

 		//session_start();

 			




		}

echo '<thead style="color: black;"><tr><td colspan="3"><a href="excelreport.php" target="_blank"><button class="btn btn-danger" >Download Excel</button></a></td><td></td><td colspan="3"></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></thead>';
	}



//if(!isset(_POST['filterreport'])){
	
?>

</table>
</div>
				</div>





	</div>

	</div>
	<div class="row">
	<button class="alert alert-success"  class="btn btn" id="logoutboy">Logout</button>
		</div>
	</div>
</section>



<section class="container">
	<div class="row">
		
	</div>
</section>
</body>
</html>