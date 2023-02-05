<?php


					if(isset($_GET['id'])){
							$geter=$_GET['id'];

							if($geter=="Adminregistration" or $geter=="Adminregistration/registeredsucessfully" or $geter=="Adminregistration/alreadyregisterduser"){
								include("../Distributor/Registration.php");

							}elseif($geter=="AdminAccount" or $geter=="AdminAccount/fetchresult"){
								include("../Distributor/AccountMaintenance.php");

							}elseif($geter=="editreport"){
								include("../Distributor/AccountMaintenance.php");

							}
							elseif($geter=="AdminViewReport"){
								include("../Distributor/ViewAdminReport.php");

							}
							elseif($geter=="AdminAnalyseReport"){
								include("../Distributor/AnalyseReport.php");

							}elseif($geter=="ComplainLog"){
								include("../Distributor/AdminComplainLog.php");
							}elseif ($geter=="") {
								//include("../Distributor/Adjustmentindex.php");
							}elseif($geter=="Adjust"){
								include("../Distributor/AdjustmentForm.php");

							}
						}






















?>