<?phpsession_start();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html lang="en-US" xmlns="http://www.w3.org/1999/xhtml"><!-- #BeginTemplate "webtemplate.dwt" --><head id="Head"><meta content="First Education Loans in India, Fast Education Loans" name="description"><meta content="Financial Consultancy, Education Loans" name="keywords"><meta content="&amp;copy; 2011 KSFi Ltd." name="COPYRIGHT"><meta content="KSFi Ltd" name="AUTHOR"><meta content="DOCUMENT" name="RESOURCE-TYPE"><meta content="GLOBAL" name="DISTRIBUTION"><meta content="INDEX, FOLLOW" name="ROBOTS"><meta content="1 DAYS" name="REVISIT-AFTER"><meta content="GENERAL" name="RATING"><meta content="RevealTrans(Duration=0,Transition=1)" http-equiv="PAGE-ENTER"><title>Education Loans KSF Pvt Ltd.</title><link id="KSFSkin" href="css/skin.css" rel="stylesheet" type="text/css"><link id="KSFSkin" href="css/ksfi.css" rel="stylesheet" type="text/css"><script language="javascript" src="js/contactus.js" type="text/javascript"> </script><script language="javascript" src="js/paging.js" type="text/javascript"> </script><script language="javascript" src="js/loanApplication.js" type="text/javascript"> </script><script language="javascript" src="js/common.js" type="text/javascript"> </script><script src="js/jquery.min.js"></script><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" /><script type="text/javascript">         $(function () {             $('input:radio[id$=AppStep1]').click(function () {                 if (this.checked) {                     $('div[id$=Applicantpanel]').show('slow');                 }                 else {                     $('div[id$=Applicantpanel]').hide('slow');                 }             });           });                                 function ValidationDocumentUpload(theForm)      {			            if (theForm.txtsubmit.value== 1)			 {    							var typeOfDoc = document.getElementsByName('DocType1');					var ischecked_method = false;					for ( var i = 0; i < typeOfDoc.length; i++) {						if(typeOfDoc[i].checked) {							ischecked_method = true;							break;						}					}					if(!ischecked_method)   { //payment method button is not checked						alert("Please Select Type of Document");																		return false;					}			   }        if (theForm.file != undefined)		{			   if (theForm.txtsubmit.value== 1)			   {				return validateDocUploadForm(theForm);			   }				else				{				 return true;				}		}		        			return true;		}                 function deletebutton(fld,fld1,fld2)    {	 $conf= confirm("Do you want to delete this file permanently");	   if($conf)	   {		  buttonClick(0);		   		   window.location.href="delate_documentupload.php?mydoc="+fld2;		  //setactionforform('delate_documentupload.php?mydoc='+fld2,'DocumentForm');	  }  	}          function buttonClick(isdocumenttobevalidated)    {			        document.getElementById('txtsubmit').value = isdocumenttobevalidated;        return true;						     }       </script>    <style type="text/css">.auto-style2 {	background-image: url('./images/rtoutline.jpg');}.auto-style3 {	margin-left: 2px;	margin-bottom: 2px;}.verticalmenu{	/*font: bold 12px arial, helvetica, sans-serif; */	font-weight:bold;	font-size:21px;	background:#99CCFF;}.pg-normal {                color: black;                font-weight: normal;                text-decoration: none;                    cursor: pointer;    }.pg-selected {                color: black;                font-weight: bold;                        text-decoration: underline;                cursor: pointer;}</style><style type="text/css">#loader {  display: none;  position: fixed;  top: 0;  left: 0;  right: 0;  bottom: 0;  width: 100%;  background: rgba(0,0,0,0.75) url(images/200.gif) no-repeat center center;  z-index: 10000;}</style></head><body id="Body"><div align="center"><?php  include('./common/common_mainmenu.php'); //sub-menuinclude('./common/common_submenu.php');?><form id="DocumentForm" autocomplete="off" enctype="multipart/form-data" method="post" class="form" name="Form" onsubmit="return ValidationDocumentUpload(this)" >							<!-- #BeginEditable "Content" -->					<?php										//database connection	include('./connection.php');    include('common/class_Common.php');						      $objCommon=new Common();                  if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ($_SESSION['usertype'] == 'Agency') || ($_SESSION['usertype'] == 'Institute'))            {				                        				if(isset($_GET['id']))				   {					 $reference_id= $_GET['id'];					 					 $_SESSION['AppID']=$reference_id;					   				  }			  				  else if(isset($_SESSION['AppID']))				  {				      $reference_id=$_SESSION['AppID'];				  }           			               }            else             {            $reference_id=$_SESSION['id'];            $email = $_SESSION['email'];            }        //$reference_id=$_SESSION['id'];//$email = $_SESSION['email'];	$squery =  "SELECT * FROM document_details where reference_id='".$reference_id."' order by doc_date asc";	$sresult =  mysql_query($squery);	$selectcob1 =  "SELECT reference_id FROM coapplicant_details  WHERE coborrowerid=1 and reference_id='".$reference_id."' ";	$resultcob1 =  mysql_query($selectcob1);		$count1 = mysql_num_rows($resultcob1);			$selectcob2 =  "SELECT reference_id FROM coapplicant_details  WHERE coborrowerid=2 and reference_id='".$reference_id."' ";	$resultcob2 =  mysql_query($selectcob2);		$count2 = mysql_num_rows($resultcob2);			    $Color_Photo=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Color Photo','reference_id',$reference_id);		$Photo_ID=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Photo ID','reference_id',$reference_id);		$ResidenceProof=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Residence Proof','reference_id',$reference_id);		$DateofBirthProof=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Date of Birth Proof','reference_id',$reference_id);		$SignatureVerification=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Signature Verification','reference_id',$reference_id);		$IncomeProof=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Income Proof','reference_id',$reference_id);		$MonthsBankStatement=$objCommon->checkRecordexists('doc_type','document_details','doc_type','3 Months Bank Statement','reference_id',$reference_id);		$RelationshipProofApplicant=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Relationship Proof-Applicant','reference_id',$reference_id);		$ResidenceOwnershipProof=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Residence Ownership Proof','reference_id',$reference_id);		$ApplicationForm=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Application Form','reference_id',$reference_id);		$FeesStructure=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Fees Structure','reference_id',$reference_id);		$PreviousAcademicDocument=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Previous Academic Document','reference_id',$reference_id);		$ProofofAdmission=$objCommon->checkRecordexists('doc_type','document_details','doc_type','Proof of Admission','reference_id',$reference_id);			$loantype = $objCommon->checkRecordexists('loantype','student_details','reference_id',$reference_id);		               if($loantype=='Others')						{											              $otherloans='yes';					}					else					{						$otherloans='No';											}		/*        echo $squery;	$row= mysql_fetch_row($sresult);if	($row){	$col = array('reference_id','updation_date','username','internal_email','status','comments');	$comb = array_combine($col,$row);}*/?>  <div class="heading">List of Documents Sent Earlier	</div>							<table id="box-table-a" class="auto-style4" style="width: 938px">									<thead>									<tr>								    <th  width="150px">Action</th>								   	<th  width="150px">Date</th>									<th  width="200px">Borrower Type</th>									<th  width="200px">Application Step</th>									<th  width="700px">Document Type</th>                                    <th  width="700px">Document</th>																		<th  width="700px">Document Name</th>																		                                    <th  width="700px">Email</th>									</tr>																<?php									while ($row = mysql_fetch_array($sresult) ) 		{						if($row['autogenerated'] == 1)		{		    $autogenerated=$row['autogenerated'];		}		else		{		$autogenerated=0;		}		        $doc_name = $row['doc_name'];				$reference_id_encoded = rtrim(strtr(base64_encode($reference_id), '+*', '-_'), '=');				$doc = rtrim(strtr(base64_encode($row['doc_id']), '+*', '-_'), '=');									    print '<tr>';?>         		 	     <td><input type="button" name="mydoc" value="Delete" id="<?php echo $row['doc_id'];?>" 		 onclick="deletebutton(this,<?php echo $autogenerated; ?>,'<?php echo $doc; ?>')"  <?php if($autogenerated==1) { ?> disabled='disabled'<?php } ?> ></td>		 		      <?php   	  print '<td>'. $row['doc_date'] .'</td>'			.'<td>'. $row['usertype'].'</td>'		.'<td>'. $row['app_step'].'</td>'		.'<td>'. $row['doc_type'] .'</td>'        .'<td><a  target="_blank" href="open_uploadedDocument.php?reference='.$reference_id_encoded.'&doc='.$doc_name.'">'.$row['doc_name'].'</a></td>'; ?>        <td>	    <?php echo $row['typeofproof']; if($row['subdoctype1']!=''){ echo "-".$row['subdoctype1']; } if($row['subdoctype2']!=''){ echo "-".$row['subdoctype2']; } ?>						</td>	    <?php		print '<td>'. $row['email'] .'</td>'              .'</tr>';        }	        ?>													</thead>									</table>																											<div id="pageNavPosition" align="center"> </div>					<table align="center">					<tr><td height="20"></td></tr>								<tr>									<td class="heading"> 									Document Center</td>								</tr>								<tr><td height="10"></td></tr>								<tr><td class="servicesText">Follow the below mentioned steps to send document:</td></tr>								<tr><td>								<ul type="1">								<li>Scan the document to be sent or uploaded.</li>								<li>After scanning save it in your computers hard drive, (i.e C/D/E drive) or desktop.</li>								<li>Select the usertype i.e Applicant, 								Co-Applicant1 or Co-Applicant 2 whose document is to be send.</li>								<li>Selct the type of document.</li>								<li>Click on the browse button below, and select the scanned and saved document from respective drive (i.e step 2).</li>								<li>After the name of document and path appears in the browse section below, click on to "send document" button.</li>								<li>Confirmation is available through mail in your registered mail id.</li>                                                                								</ul></td></tr>								<tr><td>								<table>								<tr>								<td style="height: 26px">Reference ID</td>																<td style="height: 26px">:</td>																<td colspan="7" style="height: 26px"><input id="refid" name="refid" size="20" type="text" readonly="readonly"                                                               value="<?php echo $reference_id; ?>"></td>                                 </tr>								<tr>								<td>Application Step:</td>																<td>:</td>																<td colspan="3">								<input id="AppStep1" name="AppStep" type="radio" checked="true" value="Application Docs" onclick="EnabledApp1(this)">Application Docs</td> 																<td>&nbsp;</td> 																<td><input id="AppStep2" name="AppStep" type="radio" value="Approval Docs" onclick="EnabledApprovalDoc(this)">Approval Docs</td> 																<td colspan="2"> <input id="AppStep3" name="AppStep" type="radio" value="Disbursement" onclick="EnabledDisabledApp4(this)">Disbursement</td>                                 </tr>								<tr>								<td>Applicant Type</td>																<td>:</td>																<td colspan="7"><input id="App1" name="AppType" type="radio" checked="checked" value="Applicant" onclick="EnabledDisabledApp1(this)">Applicant                              							  							                                  <input id="App2" name="AppType" type="radio" value="Co-Borrower 1"  <?php if($count1=='') { ?>  disabled='disabled'<?php } ?>onclick="EnabledDisabledApp2(this)">Co-Applicant 1                                                               <input id="App3" name="AppType" type="radio" value="Co-Borrower 2" <?php if($count2=='') { ?>  disabled='disabled'<?php } ?> onclick="EnabledDisabledApp2(this)">Co-Applicant 2                                <!--<input id="App4" name="AppType" type="radio" value="Loan" onclick="EnabledDisabledApp4(this)">Loan  --></td>                                 </tr>								<tr>								<td rowspan="7" valign="top">Type of Document:</td>								<td rowspan="7" valign="top">:</td>								<td><input id="ColorPhoto" name="DocType1" type="radio" value="Color Photo" 								<?php if($Color_Photo=='') {  ?> checked="checked" <?php } else {  ?>disabled='disabled'<?php } ?>								>Color Photo</td> 								<td colspan="3"><input id="RelProofApplicant" name="DocType1" type="radio" value="Relationship Proof-Applicant">Relationship Proof-Applicant</td>                                 <td colspan="2">								<input id="CollateralDoc" name="DocType1" type="radio" value="Collateral Document" disabled="disabled">Collateral Document</td>                               <td> 							   <input id="DemandProNote" name="DocType1" type="radio" value="Demand Promissing Note" disabled="disabled">Demand Promissing Note</td>                                </tr>                                <tr>								<td><input id="PhotoID" name="DocType1" type="radio" value="Photo ID" 								<?php if($Photo_ID!='') {  ?>disabled='disabled'<?php } ?>>Photo ID</td> 								<td colspan="3">								<input id="ResiOwnershipProof" name="DocType1" type="radio" value="Residence Ownership Proof"<?php if($ResidenceOwnershipProof!='') {  ?>disabled='disabled'<?php } ?>>Residence Ownership Proof</td>                                 <td colspan="2">								<input id="ProcChequeDetail" name="DocType1" type="radio" value="Processing Fee Cheque" disabled="disabled">Processing Fee Cheque</td>                               <td> 							   <input id="LoanAgreement" name="DocType1" type="radio" value="Loan Agreement" disabled="disabled">Loan Agreement</td>                                </tr> <tr>								<td><input id="ResidenceProof" name="DocType1" type="radio" value="Residence Proof"								>Residence Proof</td> 								<td colspan="3"><input id="ApplicationForm" name="DocType1" type="radio" value="Application Form">Application Form</td>                                 <td colspan="2">								<input id="VerificationDocs" name="DocType1" type="radio" value="Verification Docs" disabled="disabled">Verification Docs</td>                               <td> 							   <input id="LoanSumSchedule" name="DocType1" type="radio" value="Loan Summary Schedule" disabled="disabled">Loan Summary Schedule</td>                                </tr><tr>								<td><input id="DoBProof" name="DocType1" type="radio" value="Date of Birth Proof"								<?php if($DateofBirthProof!='') {  ?>disabled='disabled'<?php } ?>>Date of Birth Proof</td>                                 								<td colspan="3"><?php if($otherloans=='No') {  ?><input id="FeesStructure" name="DocType1" type="radio" value="Fees Structure" <?php if($FeesStructure!='') {  ?>disabled='disabled'<?php } ?>>Fees Structure<?php } ?></td>                                  <td colspan="2">								&nbsp;</td>                               <td> 							   <input id="PayRecieptCheque" name="DocType1" type="radio" value="Payment Reciept Dated Cheque(PDC)" disabled="disabled">Post Dated Cheque(PDC)</td>									</tr>                                <tr>								<td><input id="SignatureVeri" name="DocType1" type="radio" value="Signature Verification" <?php if($SignatureVerification!='') {  ?> disabled='disabled'<?php } ?>>Signature Verification</td> 								<td colspan="3"><?php if($otherloans=='No') {  ?><input id="AcademicDoc" name="DocType1" type="radio" value="Previous Academic Document" <?php if($PreviousAcademicDocument!='') {  ?> disabled='disabled'<?php } ?>>Previous Academic Document<?php } ?></td>                                  <td colspan="2">								&nbsp;</td>                               <td> 							   <input id="SecurityPDC" name="DocType1" type="radio" value="Security PDC" disabled="disabled">Security 							   Post Dated Cheque</td>									</tr>                                <tr><td> <input id="IncomeProof" name="DocType1" type="radio" value="Income Proof"  								>Income Proof</td> 								<td colspan="3"><?php if($otherloans=='No') {  ?><input id="ProofofAdmi" name="DocType1" type="radio" value="Proof of Admission" <?php if($ProofofAdmission!='') {  ?> disabled='disabled'<?php } ?>>Proof of Admission<?php } ?></td>                                 <td colspan="2">								&nbsp;</td>                               <td> 									<input id="PaymentReceipt" name="DocType1" type="radio" value="Payment Receipt" disabled="disabled">Payment Receipt</td>                                	</tr>                                <tr><td><input id="MonthBankBal" name="DocType1" type="radio" value="3 Months Bank Statement">3 Months Bank Statement 								                                                                                             	</tr>																<?php 	if($otherloans=='No')//show if educational loans 								            {  ?>									 <tr> 									 									  <td>&nbsp;</td><td>&nbsp;</td>									 <td><input id="employmentdoc" name="DocType1" type="radio" value="Employment document">Employment Document</td>								                                                             <td>							   &nbsp;</td>                                	</tr>                               <?php } ?>                                </table>								</td>								</tr>								<tr>								<td>								<input type="file"  name="file" id="file"   size="42" >								</td>								</tr>								<tr><td height="10"></td></tr>								<tr>																   <td align="center">			                     <?php  if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')  )                                       { ?>						                      <a href="DisplaySearchResult.php"><input name="btnBack" type="button" value="Back to Search Results " /></a> 					                      	<?php } ?>																		<input name="submit" type="submit" style="font-size:16px;height:25px;width:140px" value="Send Document" onclick="spin(); ">                                                                        <?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner')){ ?>                                                                        <input name="btnBack" type="button" style="font-size:16px;height:25px;width:100px" value="Back" onclick="history.back(-1)"></input> <?php } ?></td>								</tr>								<tr><td height="10"></td>                                                                </tr>                                                                <tr><td>                                     <input type="hidden" name="no" value="<?php if(($_SESSION['usertype'] == 'Employee') || ($_SESSION['usertype'] == 'Partner') || ( $_SESSION['usertype'] == 'Institute')|| ( $_SESSION['usertype'] == 'Agency'))                                                                {                                                                  echo $_SESSION['AppID'];                                                                 }                                                                 else                                                                {                                                                 }                                                                 ?>"></input>                                                                    </td>                                                                    </tr>                                                                    <tr>					<td>					<input id="txtsubmit" name="txtsubmit" type="hidden">					</td>				</tr>							</table>												<!-- #EndEditable -->					<table border="0" cellpadding="0" cellspacing="0" width="978">						<tr>							<td class="line" colspan="2" height="1">							<img alt="" height="1" src="./images/pixel.gif" width="1"></td>						</tr>						<tr class="bgfooter">							<td colspan="1" height="25" width="22">							<img alt="" height="1" src="./images/pixel.gif" width="22"></td>							<td id="dnn_BottomPane" align="left" class="footer" nowrap="nowrap">							<table border="0" cellpadding="0" cellspacing="0" width="100%">								<tr>									<td align="left" class="normal">									<a class="Normal" href="disclaimer.html" target="_self">									Disclaimer</a>&nbsp;&nbsp; |&nbsp;&nbsp;									<a class="Normal" href="privacypolicy.html" target="_self">									Privacy Policy</a></td>								</tr>							</table>							</td>						</tr>						<tr>							<td class="line" colspan="2" height="1">							<img alt="" height="1" src="./images/pixel.gif" width="1"></td>						</tr>					</table>										<table border="0" cellpadding="0" cellspacing="0" width="978">						<tr>							<td height="20px" width="27px"></td>							<td align="left" class="footer">							<div class="skinfooter"> Copyright &copy; 2011 KSFi Pvt Ltd.</div>							</td>						</tr>					</table>					</td>					<td background="./images/rtoutline.jpg" class="rtbgborder" width="12px">					</td>				</tr>			</table>		</div>			</form>		 </div><script type="text/javascript"><!--    var pager = new Pager('box-table-a',10);     pager.init();     pager.showPageNav('pager', 'pageNavPosition');     pager.showPage(1);//--></script><div id="loader"></div><!-- Latest compiled and minified JavaScript --><script>function spin(){		var spinner = $('#loader');    	buttonClick(1); 	var typeOfDoc = document.getElementsByName('DocType1');					var ischecked_method = false;					for ( var i = 0; i < typeOfDoc.length; i++) {						if(typeOfDoc[i].checked) {							ischecked_method = true;							break;						}					}							var file=document.getElementById('file').value;		//proceed if the file is uploaded	if(file!=''&& (ischecked_method == true))	{	setactionforform('send_document.php','DocumentForm'); 	spinner.show();		}		  }</script></body><!-- #EndTemplate --></html>