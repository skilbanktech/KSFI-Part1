<?php session_start();?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<!-- #BeginTemplate "webtemplate.dwt" -->
<head id="Head">
<meta content="First Education Loans in India, Fast Education Loans" name="description" />
<meta content="Financial Consultancy, Education Loans" name="keywords" />
<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT" />
<meta content="KSFi Ltd" name="AUTHOR" />
<meta content="DOCUMENT" name="RESOURCE-TYPE" />
<meta content="GLOBAL" name="DISTRIBUTION" />
<meta content="INDEX, FOLLOW" name="ROBOTS" />
<meta content="1 DAYS" name="REVISIT-AFTER" />
<meta content="GENERAL" name="RATING" />
<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER" />
<title>Education Loans KSF Pvt Ltd.</title>
<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css" />
<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>
<script language="javascript" src="js/paging.js" type="text/javascript"> </script>
<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}   
.pg-normal {
                color: black;
                font-weight: normal;
                text-decoration: none;    
                cursor: pointer;    
}
.pg-selected {
                color: black;
                font-weight: bold;        
                text-decoration: underline;
                cursor: pointer;
}
</style>
</head>
<body id="Body">
<noscript></noscript>
<div align="center">
	<form id="Form"  autocomplete="off" enctype="multipart/form-data" method="post" name="Form" style="height: 100%;">
		
		<?php include('./common/common_mainmenu.php'); ?>
		
			
					<!-- #BeginEditable "Content" -->
					<table width="100%"><tbody><tr><td height="20" class="heading" >
						Customer Communication Search Result</td></tr></tbody></table>
					
					

					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px;">
					<thead>					
					<tr>
						<th class="formHeader">Select</th>
						<th class="formHeader">Reference ID</th>
						<th class="formHeader">Payment ID</th>
						<th class="formHeader">Payment Type</th>
						<th class="formHeader" style="width: 85px">Presentation Date</th>
						<th class="formHeader" style="width: 85px">Amount</th>
                                                <th class="formHeader" style="width: 85px">Account No.</th>
						<th class="formHeader" style="width: 100px">Presentation Status</th>
      						</tr></thead>
	<?php
			$payType =$_POST['payType'];
						$fdate = $_POST['fdate'];
                        $tdate = $_POST['tdate'];
                        $PresentationStatus=$_POST['presentationStatus'];
			//database connection
			include('./connection.php');                      
                        if($fdate != "")
                        {
                            $fdate = $_POST['fdate'];
                        }
                        else
                        {
                            $fdate="2010-01-01";
                        }
                        
                        

                        if($tdate != "")
                        { 
                            $fdate = $_POST['fdate'];
                        }
                        else
                        {
                           $tdate=getdate();
                           // echo getdate();                          
                            $tdate= date('Y')."-".date('m')."-".date('d');
                            //$tdate="2012-05-18";                          
                        }
         
         

		//to send the information into the database		
		//set the authority for roles
		$select_rolerights="select * from rolerights where role='".$_SESSION['Currentrole']."'";
		$record_roleright=mysql_query($select_rolerights);
		$btnassign="";
		$btnreAssign="";
		$restrictapp="";
		$btnSendDoc="";
		$btnApplicationStatus="";
		$btnApplication="";
		$btnModify="";
		while ($row_rolerights = @mysql_fetch_assoc($record_roleright))
		{		 			
		 		if($row_rolerights['rights_id']=="1")  //assign SendDoc
		 		{
		 		$btnSendDoc=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="2")//assign ApplicationStatus
		 		{
		 		$btnApplicationStatus=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="3") //assign view Application
		 		{
		 		$btnApplication=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="4")//Assign Modify
		 		{
		 		$btnModify=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="5") //btnassign
		 		{
		 		 $btnassign=$row_rolerights['rights_id'];
		 		}	 
		 		else if($row_rolerights['rights_id']=="7") //restrictApp
		 		{
		 		 $restrictapp=$row_rolerights['rights_id'];
		 		}
		 		else if($row_rolerights['rights_id']=="8")	//reassign
		 		{
		 		$btnreAssign=$row_rolerights['rights_id'];
		 		}	 					 		
		}
			
			

if($restrictapp!=""){	
		$select_query="Select p.reference_id,p.check_id,p.paymentype,p.presentationdate,p.amount,p.accountno,p.presentationstatus from student_details s,pdcheck_details p 
		where s.reference_id=p.reference_id and s.app_status='Loan Disbursed' and p.presentationstatus='$PresentationStatus'
        and DATE(p.presentationdate) between '".$fdate."' and '".$tdate."' and s.partnername='".$_SESSION['internal_email']."' order by p.presentationdate desc;" ;
       }else
		{
		$select_query="Select p.reference_id,p.check_id,p.paymentype,p.presentationdate,p.amount,p.accountno,p.presentationstatus from student_details s,pdcheck_details p 
		where s.reference_id=p.reference_id and s.app_status='Loan Disbursed' and p.presentationstatus='$PresentationStatus'
        and DATE(p.presentationdate) between '".$fdate."' and '".$tdate."' order by p.presentationdate desc;" ;
          }
                
                

                //echo $select_query;		
		$select_record=mysql_query($select_query);
			//$select_Row=mysql_fetch_row($select_record);
			while ($row = @mysql_fetch_assoc($select_record) ) {						
	      print '<tr>'
	       .'<td><input type="checkbox" checked="checked" name="check_list[]" value="'.$row['reference_id'].'.'.$row['check_id'].'" id="'.$row['reference_id'].'.'. $row['check_id'].'" 
	        ></td>'
	       
	       

			.'<td>'. $row['reference_id'] .'</td>'	
			.'<td>'. $row['check_id'] .'</td>'
			.'<td>'. $row['paymentype'] .'</td>'				
			.'<td>'. $row['presentationdate'] .'</td>'
			.'<td>'. $row['amount'] .'</td>'			
			.'<td>'. $row['accountno'] .'</td>'
			.'<td>'. $row['presentationstatus'] .'</td>';
	     print '</tr>';	     
    }					
?>
</table>
<div id="pageNavPosition" align="center"> </div>
			<table align="center" >
			<tbody>
			<tr><td height="20"></td></tr>
			<tr>
                          <!--    <td><input disabled="disabled" name="btnSubmit" type="submit" value="Submit" />
			<input name="btnBack" type="button" value="Back" onclick="location.href='searchStatus.php'" /></td> -->
                        
                        

                               <td align="center" style="height: 22px">
                                   <input type='submit' name="btnBack"
                           value='Back' onclick="setaction('Search_CustCommunication.php');" >

                            <input type='submit' name="btnSendMail"
                           value='Send Mail'  onclick="setaction('Send_CustomerMail.php');"> 
                                                                                   
                                                                                   

			</td>
                        </tr>
			<tr><td height="50"></td></tr></tbody></table>
<!-- #EndEditable -->
			
			

					<table border="0" cellpadding="0" cellspacing="0" width="978" >
						<tbody>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="images/pixel.gif" width="22" /></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</tbody>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1" /></td>
						</tr>
					</tbody>
					</table>
					
					

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tbody>
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</tbody>
					</table>
					</td>
					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript"><!--
    var pager = new Pager('box-table-a',10); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);
//--></script>
</body>

<!-- #EndTemplate -->

</html>