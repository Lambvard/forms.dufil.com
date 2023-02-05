<?php 

include('../Connector/database_connect.php');
$nw=Date("Y-m-d");
#include('../Connector/call_call.php');

#$add_mail= new pull_department();

#var_dump($add_mail);

#$conect_entry=sqlsrv_query($db_connection,"SELECT entry_type FROM visitorManagement.dbo.EntryType");
#$conect_dept=sqlsrv_query($db_connection,"SELECT Department_name FROM visitorManagement.dbo.department_data");
$connect_table=sqlsrv_query($db_connection,"SELECT * FROM VisitorManagement.dbo.recordlog where dater='$nw'");


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../util/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/ico/icofont.css">
	<script type="text/javascript" src="../util//jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../util/test/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="../util/test/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../util/test/dataTables.bootstrap5.min.css"/>
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>

<!--<link rel="stylesheet" type="text/css" href="../util/datatable/css/dataTables.bootstrap.min.css"/>
 
  <script type="text/javascript" src="../util/datatable/js/jquery.datatables.min.js"></script>
-->
  <script type="text/javascript">
            $(document).ready( function () {
              $('#table').DataTable({

              });


              $('#checkout').click(function(){
                var test=confirm("You are about to off-board the staff/visitor");
                if(test== true){
                  alert("I am off-boarding the staff");

                  $.ajax({
                     url:'../DataConnect/server.php',
                     method:'POST',
                     //data:{updatedata:1},
              dataType:'JSON',

              success: function(ev){
                alert(ev);
                location.reload();


              }

          });

                }else{
                  alert("The staff is still on-board");
                }
              });

            } );

  </script>
</head>
<body >
	<section class="container-fluid">
	<div style="" class="mt-5">
    <div class="row" style="width: 100%; height: 400px;overflow-x: hidden;overflow-y: auto;">
		<table class="table col-sm-8" id="table" style="color: white;  font-family: Serif fonts; font-size: 13px; width: 100%; ">
  <thead>

      <tr>
            <th>SN</th>
            <th>Type</th>
           <th>Fullname</th>
            <th>Address</th>
            <th>Purpose</th>
            <th>Destination</th>
            <th>Department</th>
             <th>Date</th>
              <th>Time_in</th>
               <th>Status</th>
               <th>Out</th>
                 <th>Time_out</th>
        </tr>



    <?php
     $counter=1;
      while ($pul=sqlsrv_fetch_array($connect_table,SQLSRV_FETCH_ASSOC)) {
       
        echo '
        <tr>
          <th>'.$counter.'</th>
          <th id="SN">'.$pul['typeofuser'].'</th>
            <th id="fname">'.$pul['fullname'].'</th>
            <th id="dep">'.$pul['address'].'</th>
            <th id="loc">'.$pul['purpose'].'</th>
            <th id="cadre">'.$pul['whoto'].'</th>
            <th id="totalleave">'.$pul['dept'].'</th>
            <th id="usedleave">'.$pul['dater'].'</th>
            <th id="unusedleave">'.$pul['timer_in'].'</th>
            <th id="status">'.$pul['status'].'</th>
           <a href="#" ><th id="status"><i class="icofont-2checkout-alt" style="font-size:16px;" id="checkout" ></i></th></a>
           <th id="unusedleave">'.$pul['timer_out'].'</th>
            </tr>
      ';

  $counter=$counter+1;
      }

    ?>  
  </tbody>
</table>

	</div>
</div>
	</section>

</body>
</html>