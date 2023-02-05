

	
	$(document).ready(function(){

		$('#Startdayoperation').show();
		$('#testbutton').click(function(){
			alert("Please work jare");
		});

	$('#startOp').click(function(){
			
			$('#Startdayoperation').show();
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#downtimelog').hide();

			});

	$('#newOps').click(function(){
			$('#Startshiftoperation').show();
			
			$('#Startdayoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#downtimelog').hide();
		});

	$('#newJob').click(function(){
			$('#Newjoboperation').show();
			
			$('#Startshiftoperation').hide();
			$('#Startdayoperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#downtimelog').hide();
		});

	$('#newWei').click(function(){
			$('#startweigh').show();
			
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#Startshiftoperation').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#downtimelog').hide();

		});
	$('#endShift').click(function(){
			$('#endshiftoperation').show();
		//	$('#defaultID').hide();
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#Startshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#downtimelog').hide();

		});
	$('#endDay').click(function(){
		$('#enddayoperation').show();
		$('#defaultID').hide();
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#Startshiftoperation').hide();	
			$('#viewreport').hide();
			$('#downtimelog').hide();

		});
	$('#viewRep').click(function(){
		$('#viewreport').show();
		$('#defaultID').hide();
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#Startshiftoperation').hide();			
			$('#downtimelog').hide();
		});

	$('#downLog').click(function(){
		$('#downtimelog').show();
		$('#defaultID').hide();
			$('#Startshiftoperation').hide();
			$('#Newjoboperation').hide();
			$('#startweigh').hide();
			$('#endshiftoperation').hide();
			$('#enddayoperation').hide();
			$('#viewreport').hide();
			$('#Startshiftoperation').hide();			
		});

	/* code to capture user info and confirm from database*/

			$('#reg_job_button').click(function(){

				var confim_user_input=confirm("You are about to create a new Shift, Are you authorized to do so?");

				if(confim_user_input==true){
					var shift_type =document.getElementById('user_shift_type').value;
					var supervisor_name =document.getElementById('supervisor_name').value;
				alert(shift_type);
				alert(supervisor_name);

						
					
				}else{
					alert("Thanks, Shift already created");
				}


		});





	});
