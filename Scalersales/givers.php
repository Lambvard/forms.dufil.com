<?php


					if(isset($_GET['id'])){
							$geter=$_GET['id'];

							if(($geter=="startmeasurement") or ($geter=="startmeasurementsuccess") or ($geter=="scalerfiled2")or ($geter=="scalerfiled2")){
								include("measurement.php");

							}elseif($geter=="viewreport"){
								include("viewanalysis.php");

							}elseif($geter=="crushnoodles" or $geter=="wrongcrushvalue" or $geter=="savesuccessfully" ){
								include("Beamer/crusher.php");

							}elseif($geter=="salesreport"){
								include("salesummary.php");

							}
							elseif($geter=="salesdetails" or $geter=="calsales" or $geter=="transactionsuccessful" or $geter=="transactionunsuccessful"){
								include("sales.php");

							}
							elseif($geter=="stock"){
								include("inventory.php");

							}elseif($geter=="scalerfiled"){
								include("Beamer/beamer.php");
							}elseif($geter=="changepass" or $geter=="successpasswordchange" or $geter=="wrongpasswordchange" or $geter=="Invalidpassword" ){
								include("changepassword.php");
							}elseif ($geter=="salesreturnmodule") {
								include("salesreturnmodule.php");
							}elseif ($geter=="truckid_trans" or $geter=="savedbefore" or $geter=="returnsavesuccessfully") {
								include("Beamer/salesbeamer.php");
							}
						}






















?>