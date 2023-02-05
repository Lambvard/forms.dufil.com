
	var counter=0;


$('#buttongroup').click(function(){
							
		//$('#buttongroups').css('display','block');
									
if(counter>=10){
	alert("You have exceeded the maximum items in a document");

}else{	
							//start of the transaction Id generation
			if(counter==0){

			$('#buttongroups').css('display','block');

				var stafffullname = $('#staffidproliq').val();
				var staffid = $('#staffidproliqhid').val();
				var advance_collected = $('#takenproliq').val();
				var cash_refunded = $('#superproliq').val();
				var staff_location = $('#stafflocproliqhid').val();

							

					$.ajax({
						url:'db/server.php',
						method:'POST',
						data:{savetransactiondetails:1,
								stafffullname:stafffullname,
								staffid:staffid,
								advance_collected:advance_collected,
								cash_refunded:cash_refunded,
								staff_location:staff_location
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								$('#keeptransactionid').val(checkuserdetails.resultpull);

							}

					});
					alert(counter);	

					$('#bider').append('<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog'+counter+'" required><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+counter+'" required></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref'+counter+'" required></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num'+counter+'" min="1" required></div><div class="col-2" style=""><select class="form-control" id="use'+counter+'" required><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>');




			}else{//end of if

					alert(counter);	
					$('#bider').append('<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog'+counter+'" required><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+counter+'" required></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref'+counter+'" required></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num'+counter+'" min="1" required></div><div class="col-2" style=""><select class="form-control" id="use'+counter+'" required><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>');



							//end of the transaction Id generation


							//start save individual transaction

							

					var Description = $('#des'+counter+'').val();
					var reference = $('#ref'+counter+'').val();
					var amount = $('#num'+counter+'').val();
					var transaction_type = $('#use'+counter+'').val();
					var transactionallid=$('#keeptransactionid').val();
							//var staff_location = $('#stafflocproliqhid').val();

							alert(Description + reference + amount + transaction_type+ transactionallid);

						$.ajax({

							url:'db/server.php',
							method:'POST',
							data:{saveindividualrecord:1,
								Description:Description,
								reference:reference,
								amount:amount,
								transaction_type:transaction_type,
								transactionallid:transactionallid
								},
							dataType:'JSON',

							success: function(checkuserdetails){
							//	alert(checkuserdetails.saved_record_yes);

							}

						});



					
					
							

		}
						 
											//if($('#grouptab').length == 0){
												

								//var num_count=counter;	
counter++;

}
//counter++;
										
});

						//save the whole transaction
								$('#buttongroups').click(function(){

									alert("You have entered   " + counter + "  number of transaction");
									var transactionallidfinal=$('#keeptransactionid').val();

									//var store_data=[];





							$.ajax({

							url:'db/server.php',
							method:'POST',
							data:{endtransaction:1,
								transactionallidfinal:transactionallidfinal
								},
							dataType:'JSON',

							success: function(checkuserdetails){
							alert(checkuserdetails);
							$('#buttongroup').css('display','none');
							$('#buttongroups').css('display','none');
							$('#buttongroupdownload').css('display','block');
							//$('#buttongrouplogout').css('display','block');
							$('#useidfor').val(checkuserdetails);

							}

						});


									
				

									});

					//end of save whole transaction
