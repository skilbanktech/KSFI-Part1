<?php session_start();?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">



<head id="Head">

<meta content="First Education Loans in India, Fast Education Loans" name="description">

<meta content="Financial Consultancy, Education Loans" name="keywords">

<meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT">

<meta content="KSFi Ltd" name="AUTHOR">

<meta content="DOCUMENT" name="RESOURCE-TYPE">

<meta content="GLOBAL" name="DISTRIBUTION">

<meta content="INDEX, FOLLOW" name="ROBOTS">

<meta content="1 DAYS" name="REVISIT-AFTER">

<meta content="GENERAL" name="RATING">

<meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER">

<title>Education Loans KSF Pvt Ltd.</title>

<link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css">

<link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css">

<script language="javascript" src="js/contactus.js" type="text/javascript"> </script>

<script language="javascript" src="js/paging.js" type="text/javascript"> </script>

<script language="javascript" src="js/common.js" type="text/javascript"> </script>





<style type="text/css">



.auto-style2 {

	background-image: url('images/rtoutline.jpg');

}

.auto-style3 {

	margin-left: 2px;

	margin-bottom: 2px;

}

.auto-style4 {

	margin-left: 0px;

}

.verticalmenu

{

	/*font: bold 12px arial, helvetica, sans-serif; */

	font-weight:bold;

	font-size:21px;

	background:#99CCFF;

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



<div align="center">

	<form id="Form" action="send_AppStatus.php" autocomplete="off" enctype="multipart/form-data" method="post" name="Form" onsubmit="return validateStatusForm(this)" style="height: 100%;">

		<?php include('./common/common_mainmenu.php'); ?>
					<!-- #BeginEditable "Content" -->

					<table width="100%"><tbody><tr><td height="20" class="heading" >Disbursed Loans Search Result</td></tr></tbody></table>

					

					



					<table id="box-table-a" align="center" border="1" cellpadding="3" cellspacing="3" style="width: 570px; height: 24px; margin-left: 20px;">

					<thead>

					

					



					<tr>

						 <th class="formHeader" style="width: 100px">Processing Fees</th>


						<th class="formHeader">Reference ID</th>

						<th class="formHeader">First Name</th>

						<th class="formHeader">Last Name</th>

						<th class="formHeader" style="width: 85px">City</th>

						<th class="formHeader" style="width: 85px">Mobile</th>

                                                <th class="formHeader" style="width: 85px">Email</th>

						<th class="formHeader" style="width: 100px">Application Date</th>

                                               

                                                <th class="formHeader" style="width: 100px">Loan Amount</th>

                                                 <th class="formHeader" style="width: 100px">Application Status</th>
												 

                                               
                                               

                                               



						</tr></thead>

	<?php

			$reference_id =$_POST['referenceID'];

			$name = $_POST['name'];

			$location = $_POST['location'];

			$mobile = $_POST['mobile'];

			$email = $_POST['email'];

			$fdate = $_POST['fdate'];

                        $tdate = $_POST['tdate'];

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

		//$_SESSION['usertype']=='Partner' 

		   

		   



	/* NOT Used now	if($restrictapp!="")

                    {

                $select_query="Select * from student_details s,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id

                                    where s.reference_id=c.reference_id and app_status='Loan Disbursed'

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'and s.city like '%".$location."%'

                                    and mobile like '%".$mobile."%' and s.email like '%".$email."%' 

                                    and DATE(app_date) between '".$fdate."' and '".$tdate."'                          

                                    and partnername='".$_SESSION['internal_email']."' order by app_date desc;";

               // echo $select_query;

		}

		else if($_SESSION['usertype'] == 'student'){

		

                $select_query = "Select * from student_details s,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id

                                    where s.reference_id=c.reference_id and app_status='Loan Disbursed'

                                    and s.reference_id like '%".$reference_id."%' and firstname like '%".$name."%' and s.city like '%".$location."%'

                                    and mobile like '%".$mobile."%' and s.email like '%".$_SESSION['email']."%' and s.email like '%".$email."%'  

                                    and DATE(app_date) between '".$fdate."' and '".$tdate."' order by app_date desc;";

                

		}

			else

			{ */

    /* 10-july-2013            

                $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id and app_status='Loan Disbursed' 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and s.city like '%".$location."%' and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                    order by app_date desc;";



                echo $select_query;

     

     */

		//}

		

                 // -------------- to get " assignCity "   --------- 6/7/2013 -------Tanu------------

                        $selectUserDetail="select user_id,firstname,lastname,username,usertype,password,location,role,mobile 

                                        from login_details where username='".$_SESSION['internal_email']."'";

                        $userDetail_record=mysql_query($selectUserDetail);

                        $row_user= mysql_fetch_row($userDetail_record);



                        if($row_user)

                        {

                            $col = array('user_id','firstname','lastname','username','usertype','password','location','role','mobile');

                            $fetch = array_combine($col,$row_user); 

                        }

                        $assignCity=$fetch['location'];

           
//<----------------------get the id's of applicants  based on selecting processing fees status-------------------->
                      
                         if($restrictapp!="")

                            { echo($assignCity);

                              if($assignCity!="")

                              { 

                                  

                                $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                     and s.city like '%".$location."%' and s.city in (select location from login_details)

                                    order by app_date desc;";



                           

                              }

                              else

                              {

                               $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 

                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                     and s.city like '%".$location."%'  order by app_date desc;";



                              }

                            }

                          else

                              {	

                               $select_query="Select * from student_details s ,course_details c inner join collegeaddressdetail ca on ca.reference_id = c.reference_id 

                                    where s.reference_id=c.reference_id 
                                    and s.reference_id like '%".$reference_id."%' and firstname like'%".$name."%'

                                    and s.city like '%".$location."%' and mobile like '%".$mobile."%'

                                    and s.email like '%".$email."%' and DATE(app_date) between '".$fdate."' and '".$tdate."'

                                    order by app_date desc;";



                         

                              }

                

                              

		



		 $query="select username from login_details where role='Partner' or role='Field Officer'";

                $record=mysql_query($query);

                $option="";

                while($row1 = @mysql_fetch_assoc($record))

                {

                    $username=$row1["username"];

                    $option.="<OPTION VALUE=\"$username\">".$username;

                }

		

		



		$select_record=mysql_query($select_query);

			//$select_Row=mysql_fetch_row($select_record);

			while ($row = @mysql_fetch_assoc($select_record) ) {

						

					$refid= $row['reference_id'];	
					
					 $select_query="SELECT Processing_Fees='YES'  FROM credit_appraisal_analysisdetails WHERE reference_id=$refid ";
						
						$result=mysql_query($select_query);
						if($result)
						{
						
							$fetch=mysql_fetch_array($result);
							
							$fetch['Processing_Fees'];
							
							if($fetch['Processing_Fees']=='Yes')
							{
								$pf="Paid";
							}
							else
							{
								$pf="Not Paid";
							}
						}
						else
						{
							$pf="Not Paid";
						}



	      print '<tr>'
	      
		     .'<td><a href="./verification/credit_appraisal_memo.php?id='. $row['reference_id'].'" >'. $pf .'</a></td>'
             
	     	.'<td>'. $row['reference_id'] .'</td>'	

			.'<td>'. $row['firstname'] .'</td>'

			.'<td>'. $row['lastname'] .'</td>'				

			.'<td>'. $row['city'] .'</td>'

			.'<td>'. $row['mobile'] .'</td>'

                        .'<td>'. $row['email'] .'</td>'				

			            .'<td>'. $row['app_date'] .'</td>'

			           

                        .'<td>'. $row['amount'] .'</td>'

                        .'<td>'. $row['app_status'] .'</td>';
						
						 

                     

	     print '</tr>';	     

    }

						

?>

</table>

<div id="pageNavPosition" align="center"> </div>

			<table align="center">

			<tbody>

			<tr><td height="20"></td></tr>

			<tr>

                          <!--    <td><input disabled="disabled" name="btnSubmit" type="submit" value="Submit" />

			<input name="btnBack" type="button" value="Back" onclick="location.href='searchStatus.php'" /></td> -->

                        

                        



                               <td align="center" style="height: 22px">

                                   <input type='submit' name="btnBack"

                           value='Back' onclick="setaction('processingFees.php');" >



                           



                           



                              
                             



			</td>

                        </tr>

			<tr><td height="50"></td></tr></tbody></table>

<!-- #EndEditable -->

			

			



					<table border="0" cellpadding="0" cellspacing="0" width="978">

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