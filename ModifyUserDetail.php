<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php ob_start(); session_start();?>
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
<link type="text/css" href="css/cupertino/jquery-ui-1.8.16.custom.css" rel="stylesheet" >
<script language="javascript" src="js/copy_state.js" type="text/javascript"> </script>
<script language="javascript" src="js/loanApplication.js" type="text/javascript">
 </script>
<script language="javascript" src="js/jquery-1.6.2.min.js" type="text/javascript">
 </script>
 <script language="javascript" src="js/common.js" type="text/javascript">
 </script>
<script language="javascript" src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript">
 </script>
		<script language="javascript" type="text/javascript">
function  AddList(list,text)
{
 var list =document.getElementById(list);
 var selectCity=document.getElementById(text)
 var li =document.createElement("option");
 li.id = selectCity.value;
 li.value=selectCity.value;
 li.innerHTML=selectCity.value;
 list.appendChild(li);
}

</script>

<style type="text/css">
.auto-style2 {
	background-image: url('images/rtoutline.jpg');
}
.auto-style3 {
	margin-left: 2px;
	margin-bottom: 2px;
}
.auto-style4 {
	text-align: left;
}
</style>
</head>

<body id="Body">

<div align="center">
<form id="Form" action="updateUser.php" method="post" name="Form" onsubmit="return validateInternalLoginFormOnSubmit(this)"><div align="center" class="skinwrapper">
			<?php include('./common/common_mainmenu.php'); ?>			<!-- #BeginEditable "Content" -->
<?php
        //database connection
	include('./connection.php');

         

         

            $id=$_POST['myradio'];

          
        
         
	$select_query = "Select user_id,firstname,lastname,username,usertype,password,state,district,city,location,role,mobile,activeStatus from login_details where user_id = '$id'";
	$select_record=mysql_query($select_query); 
	//or die(mysql_error());
	
	$row= mysql_fetch_row($select_record);
        
	if($row){   
	$col = array('user_id','firstname','lastname','username','usertype','password','state','district','city','location','role','mobile','activeStatus');
	$fetch = array_combine($col,$row); 
        
	}		

                

 ?>
					<table align="center" Width="700px">
								<tr><td colspan="3"></td></tr>
								<tr>
									<td class="heading" colspan="3">Login Details</td></tr>
								<tr>
									<td>UserType</td>
									<td>:</td>
				<td><select id="cmbUser" name="cmbUser" size="1"  onchange="PopulateRoles(this,'cmbUsertype')" margin-left="11px">
           <option value=''>Select</option>
	   <?php require "connection.php";// connection to database 
	$q=mysql_query("select distinct usertype from roles");	
	while($n=mysql_fetch_array($q)){ $usertype=trim($n["usertype"]);?>
        <option <?php if($row){ if($fetch['usertype'] == $usertype){ echo "selected='selected'";} }?> 
           value="<?php echo $usertype; ?>"><?php echo $usertype; ?></option><?php } ?>
                                    </select>
                                </td>
								</tr>
                                                                <tr>
									<td>Role</td>
									<td>:</td>
									<td>                                                                       
                                      <select name="cmbUsertype" id="cmbUsertype">
					<?php if($row) { if($fetch['role']!=""){ print '<option value="'.$fetch['role'].'">'.$fetch['role'].'</option>'; }} ?>
	                                </select></td>
								</tr>
								<tr>
									<td>First/Company Name</td>
									<td>:</td>
									<td>
									<input id="firstname" name="firstname" size="40" type="text"
                                                               value="<?php if($row) { echo $fetch['firstname']; } ?>"></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td>:</td>
									<td>
									<input name="lastname" size="40" type="text" value="<?php if($row) { echo $fetch['lastname']; } ?>"></td>
								</tr>
                                                               
                                                               

                                                                <tr>
						<!--	<td>Location</td>
							<td>:</td>
							<td>
							<input name="location" size="40" type="text" value="<?php if($row) { echo $fetch['location']; } ?>"></td>
                                                        </tr>  -->
                                                         <tr>
							<td>State</td>
							<td>:</td>
							<td>
							<select id="countrySelect"  name="country" onchange="populateState('countrySelect','stateSelect'); populateCity('countrySelect','citySelect')" size="1"							         value="<?php if($row) { echo $fetch['state']; } ?>" >
							</select></td>
						</tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td><select id="stateSelect"  name="state" size="1"  value="<?php if($row) { echo $fetch['district']; } ?>" >
							</select><script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
							</td>
						</tr>
						<tr>
							<td>City</td>
							<td>:</td>
							<td><select id="citySelect"  name="city" size="1" onchange="EnabledCityList('btnAdd')" 							value="<?php if($row) { echo $fetch['city']; } ?>">
							</select>
							<script type="text/javascript">initCountry('','countrySelect','stateSelect','citySelect');</script>
							<input name="btnAdd" type="button" id="btnAdd" value="ADD" onclick="AddList('listofcity','citySelect')" disabled="disabled"></td>
						</tr>
						         <tr>						                                               
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>																		
                         <select multiple="multiple" name="listofcity[]" id="listofcity">
                          <?php  if($row) { $Citylist= $fetch['location'];
                               if($Citylist !="")
                               {
								 $array = explode(',', $Citylist); //split string into array seperated by ', '
								foreach($array as $value) //loop over values
								{?><option  id="ul1"><?php echo $value;?></option>
							  <?php }}} ?>  </select>
									</td>
								</tr>


                                                        <tr>
									<td>Mobile</td>
									<td>:</td>
									<td>
									<input name="mobile" size="40" type="text" value="<?php if($row) { echo $fetch['mobile']; } ?>"></td>
								</tr>

								<tr>
									<td>Email</td>
									<td>:</td>
									<td>
									<input name="email" size="40" type="text" value="<?php if($row) { echo $fetch['username']; } ?>"></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>:</td>
									<td>
									<input name="password" size="40" type="password" value="<?php if($row) { echo $fetch['password']; } ?>"></td>
							   	</tr>                               								                     			
																			                     			

						<tr>
							<td align="center" colspan="3">
							<input id="submit" name="submit" type="submit" value="Submit">
							
							

                                                         <input name="btnBack" type="button" value="Back" onclick="history.back(-1)"></td>
						</tr>
                                                <tr><td><input type="hidden" name="no" value="<?php echo $_POST['myradio']; ?>">
								 <input type="hidden" name="userid" value="<?php if($row) { echo $fetch['user_id']; } ?>"> </td></tr>
						<tr>
							<td height="20"></td>
						</tr>
					</table>					
					
					

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
						</tr>
						<tr class="bgfooter">
							<td colspan="1" height="25" width="22">
							<img alt="" height="1" src="images/pixel.gif" width="22"></td>
							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="left" class="normal">
									<a class="Normal" href="disclaimer.html" target="_self">
									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;
									<a class="Normal" href="privacypolicy.html" target="_self">
									Privacy Policy</a></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td class="line" colspan="2" height="1">
							<img alt="" height="1" src="images/pixel.gif" width="1"></td>
						</tr>
					</table>
					
					

					<table border="0" cellpadding="0" cellspacing="0" width="978">
						<tr>
							<td height="20px" width="27px"></td>
							<td align="left" class="footer">
							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>
							</td>
						</tr>
					</table>
					</td>
					<td background="images/rtoutline.jpg" class="rtbgborder" width="12px">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>

</body>

</html>
<?php ob_flush(); ?>