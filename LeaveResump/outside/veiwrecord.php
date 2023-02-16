<?php
include('../server/db.php');
//if (isset($_POST['pulladd'])) {
	$leave_data=[];
	
	$checker4=sqlsrv_query($db_connection,"SELECT * FROM leave.dbo.staff_transactionallogleave");
	$checker5=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.leavenumber");
	$checker5_2=sqlsrv_fetch_array($checker5,SQLSRV_FETCH_ASSOC);
	


?>
        
<!DOCTYPE 
<html>
<head>
	<title></title>


	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<script type="text/javascript" src="../utility/jquery/external/jquery/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../utility/DataTables/datatables.css">
 	<script type="text/javascript" charset="utf8" src="../utility/DataTables/datatables.js"></script>
	
			<script type="text/javascript">
		
		$(document).ready(function(){

			

	/*				$('#recordbox').DataTable({
        			"bprocessing": true,
        			"ServerSide": true,
       				 "ajax":{
       				 	url:'loader.php',
       				 	method:'POST',	
       				 	//dataTable:'JSON',
       				 	error:function(){
       				 		//alert(yesboss.fullname);
       				 	}
       				 }
    				
    				});
			
		});
	*/
	</script>







</head>
<body>
<section class="container-fluid">

	<div class="row">
		<div class="container-fluid" style="background-color: white; border-radius:1px 1px 1px 1px;">
			<table id="recordbox" class="dataTable table table-striped table-bordered" width="100%" cellspacing="0" style="font-size: 11px; outline-offset: inherit;">
			<thead>
        <tr>
            <th>SN</th>
            <th>StaffID</th>
           <th>Staff name</th>
            <th>Department</th>
            <th>Location</th>
            <th>Cadre</th>
            <th>Total leave</th>
             <th>Used leave</th>
              <th>Unused Leave</th>
               <th>Status</th>
        </tr>
    </thead>
   
        
    		<?php
    			$counter=1;
    			while($checkers_6=sqlsrv_fetch_array($checker4,SQLSRV_FETCH_ASSOC)){

    				echo '

			<tr>
			<th>'.$counter.'</th>
			<th id="staffid">'.$checkers_6['staffid'].'</th>
            <th id="fname">'.$checkers_6['fullname'].'</th>
            <th id="dep">'.$checkers_6['staffdept'].'</th>
            <th id="loc">'.$checkers_6['stafflocation'].'</th>
            <th id="cadre">'.$checker5_2['cadre'].'</th>
            <th id="totalleave">'.$checker5_2['leavenumb'].'</th>
            <th id="usedleave">'.$checkers_6['fullname'].'</th>
            <th id="unusedleave">'.$checkers_6['fullname'].'</th>
            <th id="status">'.$checkers_6['leavestatus'].'</th>
            </tr>
	';
	$counter=$counter+1;

}
		



    		?>

    		



           
      
    </table>

		</div>

	</div>
	
	<button class="btn btn">Press</button>

	<div id="mod"> Lagos</div>

</section>











<script type="text/javascript">
	$('#recordbox').DataTable();
</script>
</body>
</html>

