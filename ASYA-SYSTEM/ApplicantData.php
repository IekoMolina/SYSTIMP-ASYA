<?php
	session_start();
	
	$flag=0;
	$message = NULL;
	if(isset($_POST['submit'])){
		
		$firstname=$_POST['firstname'];	
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$dateapplied ='CURDATE()';
		$appstatus = 6001;
		$positiondesired = $_POST['positiondesired'];
		
		$expectedsalary=$_POST['expectedsalary'];
			
		$residenceaddress=$_POST['residenceaddress'];
		
		if (empty($_POST['provincialaddress'])){
			$provincialaddress	=NULL;
		}else
			$provincialaddress	=$_POST['provincialaddress'];
		
		$emailaddress=$_POST['emailaddress'];
		$mobileno=$_POST['mobileno'];
		
		if (empty($_POST['telephoneno'])){
			$telephoneno	="NULL";
		}else
			$telephoneno	=$_POST['telephoneno'];
		
		$citizenship=$_POST['citizenship'];
		$gender = $_POST['gender'];
		$civilstatus=$_POST['civilstatus'];
		$religion = $_POST['religion'];
		$birthdate=$_POST['birthdate'];
		$birthplace = $_POST['birthplace'];
		$licensed=$_POST['licensed'];
		
		$interview = NULL;
		$evaluation = NULL;
		$contract = NULL;
		$approveddate = NULL;
		
		if (empty($_POST['spousename'])){
			$spousename	=NULL;
		}else
			$spousename	=$_POST['spousename'];
		
		if (empty($_POST['spouseoccupation'])){
			$spouseoccupation	=NULL;
		}else
			$spouseoccupation	=$_POST['spouseoccupation'];
		
		if (empty($_POST['spousecompany'])){
			$spousecompany	=NULL;
		}else
			$spousecompany	=$_POST['spousecompany'];
		
		if (empty($_POST['spousecompanyno'])){
			$spousecompanyno	="NULL";
		}else
			$spousecompanyno	=$_POST['spousecompanyno'];
		
		$schoolname1	=$_POST['schoolname1'];
		$schooladdress1	=$_POST['schooladdress1'];
		
		if (empty($_POST['schooldegree1'])){
			$schooldegree1	=NULL;
		}else
			$schooldegree1	=$_POST['schooldegree1'];
		
		if (empty($_POST['schoolhonorsrecieved1'])){
			$schoolhonorsrecieved1	=NULL;
		}else
			$schoolhonorsrecieved1	=$_POST['schoolhonorsrecieved1'];
		
		$schoolstartyear1	=$_POST['schoolstartyear1'];
		$schoolendyear1	=$_POST['schoolendyear1'];
		
		$schoolname2	=$_POST['schoolname2'];
		$schooladdress2	=$_POST['schooladdress2'];
		
		if (empty($_POST['schooldegree2'])){
			$schooldegree2	=NULL;
		}else
			$schooldegree2	=$_POST['schooldegree2'];
		
		if (empty($_POST['schoolhonorsrecieved2'])){
			$schoolhonorsrecieved2	=NULL;
		}else
			$schoolhonorsrecieved2	=$_POST['schoolhonorsrecieved2'];
		
		$schoolstartyear2	=$_POST['schoolstartyear2'];
		$schoolendyear2	=$_POST['schoolendyear2'];
		
		$schoolname3	=$_POST['schoolname3'];
		$schooladdress3	=$_POST['schooladdress3'];
		
		if (empty($_POST['schooldegree3'])){
			$schooldegree3	=NULL;
		}else
			$schooldegree3	=$_POST['schooldegree3'];
		
		if (empty($_POST['schoolhonorsrecieved3'])){
			$schoolhonorsrecieved3	=NULL;
		}else
			$schoolhonorsrecieved3	=$_POST['schoolhonorsrecieved3'];
		
		$schoolstartyear3	=$_POST['schoolstartyear3'];
		$schoolendyear3	=$_POST['schoolendyear3'];
		
		if (empty($_POST['schoolname4'])){
			$schoolname4	=NULL;
		}else
			$schoolname4	=$_POST['schoolname4'];
		
		if (empty($_POST['schooladdress4'])){
			$schooladdress4	=NULL;
		}else
			$schooladdress4	=$_POST['schooladdress4'];
		
		if (empty($_POST['schooldegree4'])){
			$schooldegree4	=NULL;
		}else
			$schooldegree4	=$_POST['schooldegree4'];
		
		if (empty($_POST['schoolhonorsrecieved4'])){
			$schoolhonorsrecieved4	=NULL;
		}else
			$schoolhonorsrecieved4	=$_POST['schoolhonorsrecieved4'];
		
		if (empty($_POST['schoolstartyear4'])){
			$schoolstartyear4	="NULL";
		}else
		$schoolstartyear4	=$_POST['schoolstartyear4'];
	
		if (empty($_POST['schoolendyear4'])){
			$schoolendyear4	="NULL";
		}else
		$schoolendyear4	=$_POST['schoolendyear4'];
		
		if (empty($_POST['previouscompany1'])){
			$previouscompany1	=NULL;
		}else
			$previouscompany1	=$_POST['previouscompany1'];
		
		if (empty($_POST['previouscompanycontactnumber1'])){
			$previouscompanycontactnumber1	="NULL";
		}else
			$previouscompanycontactnumber1	=$_POST['previouscompanycontactnumber1'];
		
		
		if (empty($_POST['previouscompanyaddress1'])){
			$previouscompanyaddress1	=NULL;
		}else
			$previouscompanyaddress1	=$_POST['previouscompanyaddress1'];
		
		if (empty($_POST['positionheld1'])){
			$positionheld1	=NULL;
		}else
			$positionheld1	=$_POST['positionheld1'];
		
		if (empty($_POST['reasonforleaving1'])){
			$reasonforleaving1	=NULL;
		}else
			$reasonforleaving1	=$_POST['reasonforleaving1'];
		
		if (empty($_POST['salaryrecieved1'])){
			$salaryrecieved1	="NULL";
		}else
			$salaryrecieved1	=$_POST['salaryrecieved1'];
		
		if (empty($_POST['employmentstartdate1'])){
			$employmentstartdate1	="NULL";
		}else
			$employmentstartdate1	=$_POST['employmentstartdate1'];
		
		if (empty($_POST['employmentenddate1'])){
			$employmentenddate1	="NULL";
		}else
			$employmentenddate1	=$_POST['employmentenddate1'];
	
		if (empty($_POST['previouscompany2'])){
			$previouscompany2	=NULL;
		}else
			$previouscompany2	=$_POST['previouscompany2'];
		
		if (empty($_POST['previouscompanycontactnumber2'])){
			$previouscompanycontactnumber2	="NULL";
		}else
			$previouscompanycontactnumber2	=$_POST['previouscompanycontactnumber2'];
		
		if (empty($_POST['previouscompanyaddress2'])){
			$previouscompanyaddress2	=NULL;
		}else
			$previouscompanyaddress2	=$_POST['previouscompanyaddress2'];
		
		if (empty($_POST['positionheld2'])){
			$positionheld2	=NULL;
		}else
			$positionheld2	=$_POST['positionheld2'];
		
		if (empty($_POST['reasonforleaving2'])){
			$reasonforleaving2	=NULL;
		}else
			$reasonforleaving2	=$_POST['reasonforleaving2'];
		
		if (empty($_POST['salaryrecieved2'])){
			$salaryrecieved2	="NULL";
		}else
			$salaryrecieved2	=$_POST['salaryrecieved2'];
		
		if (empty($_POST['employmentstartdate2'])){
			$employmentstartdate2	="NULL";
		}else
			$employmentstartdate2	=$_POST['employmentstartdate2'];
		
		if (empty($_POST['employmentenddate2'])){
			$employmentenddate2	="NULL";
		}else
			$employmentenddate2	=$_POST['employmentenddate2'];
		
		if (empty($_POST['examtitle1'])){
			$examtitle1	=NULL;
		}else
			$examtitle1	=$_POST['examtitle1'];
		
		if (empty($_POST['examdate1'])){
			$examdate1	="NULL";
		}else
			$examdate1	=$_POST['examdate1'];
		
		if (empty($_POST['examvenue1'])){
			$examvenue1	=NULL;
		}else
			$examvenue1	=$_POST['examvenue1'];
		
		if (empty($_POST['examrating1'])){
			$examrating1	=NULL;
		}else
			$examrating1	=$_POST['examrating1'];
		
		if (empty($_POST['examtitle2'])){
			$examtitle2	=NULL;
		}else
			$examtitle2	=$_POST['examtitle2'];
		
		if (empty($_POST['examdate2'])){
			$examdate2	="NULL";
		}else
			$examdate2	=$_POST['examdate2'];
		
		if (empty($_POST['examvenue2'])){
			$examvenue2	=NULL;
		}else
			$examvenue2	=$_POST['examvenue2'];
		
		if (empty($_POST['examrating2'])){
			$examrating2	=NULL;
		}else
			$examrating2	=$_POST['examrating2'];
		
		if (empty($_POST['membershiporganization1'])){
			$membershiporganization1	=NULL;
		}else
			$membershiporganization1	=$_POST['membershiporganization1'];
		
		if (empty($_POST['membershipposition1'])){
			$membershipposition1	=NULL;
		}else
			$membershipposition1	=$_POST['membershipposition1'];
		
		if (empty($_POST['membershipaddress1'])){
			$membershipaddress1	=NULL;
		}else
			$membershipaddress1	=$_POST['membershipaddress1'];
		
		if (empty($_POST['membershipdate1'])){
			$membershipdate1	="NULL";
		}else
			$membershipdate1	=$_POST['membershipdate1'];
		
		if (empty($_POST['membershiporganization2'])){
			$membershiporganization2	=NULL;
		}else
			$membershiporganization2	=$_POST['membershiporganization2'];
		
		if (empty($_POST['membershipposition2'])){
			$membershipposition2	=NULL;
		}else
			$membershipposition2	=$_POST['membershipposition2'];
		
		if (empty($_POST['membershipaddress2'])){
			$membershipaddress2	=NULL;
		}else
			$membershipaddress2	=$_POST['membershipaddress2'];
		
		if (empty($_POST['membershipdate2'])){
			$membershipdate2	="NULL";
		}else
			$membershipdate2	=$_POST['membershipdate2'];
		
		if (empty($_POST['trainingtitle1'])){
			$trainingtitle1	=NULL;
		}else
			$trainingtitle1	=$_POST['trainingtitle1'];
		
		if (empty($_POST['trainingdate1'])){
			$trainingdate1	="NULL";
		}else
			$trainingdate1	=$_POST['trainingdate1'];
		
		if (empty($_POST['trainingvenue1'])){
			$trainingvenue1	=NULL;
		}else
			$trainingvenue1	=$_POST['trainingvenue1'];
		
		if (empty($_POST['trainingresourceperson1'])){
			$trainingresourceperson1	=NULL;
		}else
			$trainingresourceperson1	=$_POST['trainingresourceperson1'];
		
		if (empty($_POST['trainingtitle2'])){
			$trainingtitle2	=NULL;
		}else
			$trainingtitle2	=$_POST['trainingtitle2'];
		
		if (empty($_POST['trainingdate2'])){
			$trainingdate2	="NULL";
		}else
			$trainingdate2	=$_POST['trainingdate2'];
		
		if (empty($_POST['trainingvenue2'])){
			$trainingvenue2	=NULL;
		}else
			$trainingvenue2	=$_POST['trainingvenue2'];
		
		if (empty($_POST['trainingresourceperson2'])){
			$trainingresourceperson2	=NULL;
		}else
			$trainingresourceperson2	=$_POST['trainingresourceperson2'];
	
		if (empty($_POST['familyname1'])){
			$familyname1	=NULL;
		}else
			$familyname1	=$_POST['familyname1'];
		
		if (empty($_POST['familyrelation1'])){
			$familyrelation1	=NULL;
		}else
			$familyrelation1	=$_POST['familyrelation1'];
		
		if (empty($_POST['familyoccupation1'])){
			$familyoccupation1	=NULL;
		}else
			$familyoccupation1	=$_POST['familyoccupation1'];
		
		if (empty($_POST['familycompany1'])){
			$familycompany1	=NULL;
		}else
			$familycompany1	=$_POST['familycompany1'];
		
		if (empty($_POST['familyresidence1'])){
			$familyresidence1	=NULL;
		}else
			$familyresidence1	=$_POST['familyresidence1'];
		
		if (empty($_POST['familycontactno1'])){
			$familycontactno1	="NULL";
		}else
			$familycontactno1	=$_POST['familycontactno1'];
		
		if (empty($_POST['familyname2'])){
			$familyname2	=NULL;
		}else
			$familyname2	=$_POST['familyname2'];
		
		if (empty($_POST['familyrelation2'])){
			$familyrelation2	=NULL;
		}else
			$familyrelation2	=$_POST['familyrelation2'];
		
		if (empty($_POST['familyoccupation2'])){
			$familyoccupation2	=NULL;
		}else
			$familyoccupation2	=$_POST['familyoccupation2'];
		
		if (empty($_POST['familycompany2'])){
			$familycompany2	=NULL;
		}else
			$familycompany2	=$_POST['familycompany2'];
		
		if (empty($_POST['familyresidence2'])){
			$familyresidence2	=NULL;
		}else
			$familyresidence2	=$_POST['familyresidence2'];
		
		if (empty($_POST['familycontactno2'])){
			$familycontactno2	="NULL";
		}else
			$familycontactno2	=$_POST['familycontactno2'];
		
		if (empty($_POST['familyname3'])){
			$familyname3	=NULL;
		}else
			$familyname3	=$_POST['familyname3'];
		
		if (empty($_POST['familyrelation3'])){
			$familyrelation3	=NULL;
		}else
			$familyrelation3	=$_POST['familyrelation3'];
		
		if (empty($_POST['familyoccupation3'])){
			$familyoccupation3	=NULL;
		}else
			$familyoccupation3	=$_POST['familyoccupation3'];
		
		if (empty($_POST['familycompany3'])){
			$familycompany3	=NULL;
		}else
			$familycompany3	=$_POST['familycompany3'];
		
		if (empty($_POST['familyresidence3'])){
			$familyresidence3	=NULL;
		}else
			$familyresidence3	=$_POST['familyresidence3'];
		
		if (empty($_POST['familycontactno3'])){
			$familycontactno3	="NULL";
		}else
			$familycontactno3	=$_POST['familycontactno3'];
		
		if (empty($_POST['sssno'])){
			$sssno	="NULL";
		}else
			$sssno	=$_POST['sssno'];
		
		if (empty($_POST['philhealthno'])){
			$philhealthno	="NULL";
		}else
			$philhealthno	=$_POST['philhealthno'];
		
		if (empty($_POST['tinno'])){
			$tinno	="NULL";
		}else
			$tinno	=$_POST['tinno'];
		
		if (empty($_POST['pagibigno'])){
			$pagibigno	="NULL";
		}else
			$pagibigno	=$_POST['pagibigno'];
		
		$referencename1=$_POST['referencename1'];	
		$referenceposition1=$_POST['referenceposition1'];
		$referencecompany1=$_POST['referencecompany1'];
		$referencecontactno1=$_POST['referencecontactno1'];
		
		$referencename2=$_POST['referencename2'];	
		$referenceposition2=$_POST['referenceposition2'];
		$referencecompany2=$_POST['referencecompany2'];
		$referencecontactno2=$_POST['referencecontactno2'];
		
		$referencename3=$_POST['referencename3'];	
		$referenceposition3=$_POST['referenceposition3'];
		$referencecompany3=$_POST['referencecompany3'];
		$referencecontactno3=$_POST['referencecontactno3'];
		
		$charactername1=$_POST['charactername1'];	
		$characterrelation1=$_POST['characterrelation1'];
		$charactercompany1=$_POST['charactercompany1'];
		$charactercontactno1=$_POST['charactercontactno1'];
		
		$charactername2=$_POST['charactername2'];	
		$characterrelation2=$_POST['characterrelation2'];
		$charactercompany2=$_POST['charactercompany2'];
		$charactercontactno2=$_POST['charactercontactno2'];
		
		$charactername3=$_POST['charactername3'];	
		$characterrelation3=$_POST['characterrelation3'];
		$charactercompany3=$_POST['charactercompany3'];
		$charactercontactno3=$_POST['charactercontactno3'];
		
		
		
		//convert positiondesired to number
		
			if($positiondesired == "Audit Assistant"){
					$positiondesired = "5001";
				}
			else if($positiondesired == "Design Manager"){
					$positiondesired = "5002";
				}
			else if($positiondesired == "CADD Architect"){
					$positiondesired = "5003";
				}
			
		// first character capital
		$firstname = ucfirst($firstname);
		$middlename = ucfirst($middlename);
		$lastname = ucfirst($lastname);
		
		if (!isset($message)){
		require_once('../mysql_connect.php');
		$query = " insert into applicants (FIRSTNAME, MIDDLENAME, LASTNAME, DATEAPPLIED, APPSTATUS, APPPOSITION, EXPECTEDSALARY, RESIDENCEADDRESS, PROVINCIALADDRESS, EMAIL, MOBILENO, TELEPHONENO, CITIZENSHIP, GENDER, CIVILSTATUS, RELIGION, BIRTHDATE, BIRTHPLACE, LICENSED, SPOUSENAME, SPOUSEOCCUPATION, SPOUSECOMPANY, SPOUSECOMPANYNO, SCHOOLNAME1, SCHOOLADDRESS1, SCHOOLDEGREE1, SCHOOLHONORSRECIEVED1, SCHOOLSTARTYEAR1, SCHOOLENDYEAR1, SCHOOLNAME2, SCHOOLADDRESS2, SCHOOLDEGREE2, SCHOOLHONORSRECIEVED2, SCHOOLSTARTYEAR2, SCHOOLENDYEAR2, SCHOOLNAME3, SCHOOLADDRESS3, SCHOOLDEGREE3, SCHOOLHONORSRECIEVED3, SCHOOLSTARTYEAR3, SCHOOLENDYEAR3, SCHOOLNAME4, SCHOOLADDRESS4, SCHOOLDEGREE4, SCHOOLHONORSRECIEVED4, SCHOOLSTARTYEAR4, SCHOOLENDYEAR4, PREVIOUSCOMPANY1, PREVIOUSCOMPANYCONTACTNUMBER1, PREVIOUSCOMPANYADDRESS1, POSITIONHELD1, REASONFORLEAVING1, SALARYRECIEVED1, EMPLOYMENTSTARTDATE1, EMPLOYMENTENDDATE1, PREVIOUSCOMPANY2, PREVIOUSCOMPANYCONTACTNUMBER2, PREVIOUSCOMPANYADDRESS2, POSITIONHELD2, REASONFORLEAVING2, SALARYRECIEVED2, EMPLOYMENTSTARTDATE2, EMPLOYMENTENDDATE2, EXAMTITLE1, EXAMDATE1, EXAMVENUE1, EXAMRATING1, EXAMTITLE2, EXAMDATE2, EXAMVENUE2, EXAMRATING2, MEMBERSHIPORGANIZATION1, MEMBERSHIPPOSITION1, MEMBERSHIPADDRESS1, MEMBERSHIPDATE1, MEMBERSHIPORGANIZATION2, MEMBERSHIPPOSITION2, MEMBERSHIPADDRESS2, MEMBERSHIPDATE2, TRAININGTITLE1, TRAININGDATE1, TRAININGVENUE1, TRAININGRESOURCEPERSON1, TRAININGTITLE2, TRAININGDATE2, TRAININGVENUE2, TRAININGRESOURCEPERSON2, FAMILYNAME1, FAMILYRELATION1, FAMILYOCCUPATION1, FAMILYCOMPANY1, FAMILYRESIDENCE1, FAMILYCONTACTNO1, FAMILYNAME2, FAMILYRELATION2, FAMILYOCCUPATION2, FAMILYCOMPANY2, FAMILYRESIDENCE2, FAMILYCONTACTNO2, FAMILYNAME3, FAMILYRELATION3, FAMILYOCCUPATION3, FAMILYCOMPANY3, FAMILYRESIDENCE3, FAMILYCONTACTNO3, SSSNO, PHILHEALTHNO, TINNO, PAGIBIGNO, REFERENCENAME1, REFERENCEPOSITION1, REFERENCECOMPANY1, REFERENCECONTACTNO1, REFERENCENAME2, REFERENCEPOSITION2, REFERENCECOMPANY2, REFERENCECONTACTNO2, REFERENCENAME3, REFERENCEPOSITION3, REFERENCECOMPANY3, REFERENCECONTACTNO3, CHARACTERNAME1, CHARACTERRELATION1, CHARACTERCOMPANY1, CHARACTERCONTACTNO1, CHARACTERNAME2, CHARACTERRELATION2, CHARACTERCOMPANY2, CHARACTERCONTACTNO2, CHARACTERNAME3, CHARACTERRELATION3, CHARACTERCOMPANY3, CHARACTERCONTACTNO3) 
		VALUES('{$firstname}','{$middlename}','{$lastname}', CURDATE(), '{$appstatus}','{$positiondesired}','{$expectedsalary}','{$residenceaddress}','{$provincialaddress}','{$emailaddress}','{$mobileno}',{$telephoneno},'{$citizenship}','{$gender}','{$civilstatus}','{$religion}','{$birthdate}','{$birthplace}','{$licensed}','{$spousename}','{$spouseoccupation}','{$spousecompany}',{$spousecompanyno},'{$schoolname1}','{$schooladdress1}','{$schooldegree1}','{$schoolhonorsrecieved1}','{$schoolstartyear1}','{$schoolendyear1}','{$schoolname2}','{$schooladdress2}','{$schooldegree2}','{$schoolhonorsrecieved2}','{$schoolstartyear2}','{$schoolendyear2}','{$schoolname3}','{$schooladdress3}','{$schooldegree3}','{$schoolhonorsrecieved3}','{$schoolstartyear3}','{$schoolendyear3}','{$schoolname4}','{$schooladdress4}','{$schooldegree4}','{$schoolhonorsrecieved4}',{$schoolstartyear4},{$schoolendyear4},'{$previouscompany1}',{$previouscompanycontactnumber1},'{$previouscompanyaddress1}','{$positionheld1}','{$reasonforleaving1}',{$salaryrecieved1},{$employmentstartdate1},{$employmentenddate1},'{$previouscompany2}',{$previouscompanycontactnumber2},'{$previouscompanyaddress2}','{$positionheld2}','{$reasonforleaving2}',{$salaryrecieved2},{$employmentstartdate2},{$employmentenddate2},'{$examtitle1}',{$examdate1},'{$examvenue1}','{$examrating1}','{$examtitle2}',{$examdate2},'{$examvenue2}','{$examrating2}','{$membershiporganization1}','{$membershipposition1}','{$membershipaddress1}',{$membershipdate1},'{$membershiporganization2}','{$membershipposition2}','{$membershipaddress2}',{$membershipdate2},'{$trainingtitle1}',{$trainingdate1},'{$trainingvenue1}','{$trainingresourceperson1}','{$trainingtitle2}',{$trainingdate2},'{$trainingvenue2}','{$trainingresourceperson2}','{$familyname1}','{$familyrelation1}','{$familyoccupation1}','{$familycompany1}','{$familyresidence1}',{$familycontactno1},'{$familyname2}','{$familyrelation2}','{$familyoccupation2}','{$familycompany2}','{$familyresidence2}',{$familycontactno2},'{$familyname3}','{$familyrelation3}','{$familyoccupation3}','{$familycompany3}','{$familyresidence3}',{$familycontactno3},{$sssno},{$philhealthno},{$tinno},{$pagibigno},'{$referencename1}','{$referenceposition1}','{$referencecompany1}','{$referencecontactno1}','{$referencename2}','{$referenceposition2}','{$referencecompany2}','{$referencecontactno2}','{$referencename3}','{$referenceposition3}','{$referencecompany3}','{$referencecontactno3}','{$charactername1}','{$characterrelation1}','{$charactercompany1}','{$charactercontactno1}','{$charactername2}','{$characterrelation2}','{$charactercompany2}','{$charactercontactno2}','{$charactername3}','{$characterrelation3}','{$charactercompany3}','{$charactercontactno3}')";
		$result = mysqli_query($dbc,$query);
		//echo $query;
		$message='</font>Applicant Added</b><br>';
		
		$flag=1;
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Aug 2016 23:46:09 GMT -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Applicant</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <!--right slidebar-->
     <link href="css/slidebars.css" rel="stylesheet">

      <!--Form Wizard-->
      <link rel="stylesheet" type="text/css" href="css/jquery.steps.css" />
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

  <body>
  
  
  

  <section id="container" >
      <!--header start-->
      <header class="header dark-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >ASYA<span></span></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="username">Jhon Doue</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a href="login.php"> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
	  
		<body>

			<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="ApplicantScreen.php"><img src="asyalogo.png"/> </a>
					</div>
				</div>
				<!-- /.container-fluid -->
			</nav>

			<header>
			</header>	
				<a class="anchor" name="appinfo"></a>
				<div class="row filldiv" style="overflow: auto;">
				<div class="col-lg-12">
				<!--progress bar start-->
				<section class="panel">
				<div class="panel-body">
                    <form id="wizard-validation-form" action="#">
									
                    <h3>Personal Information</h3>
                    <section>
					<div class="panel-body" style="overflow-y: scroll;">
					<div class="row" style="margin-left:20px;margin-top:20px;">
					<form class="form-horizontal tasi-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<div class="bio-row">
									
				
                    <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">First Name</label>
								<div class="col-sm-8">
									<input type="text" required name="firstname" class="form-control">
								</div>
						</div>
					</div>
					</div>
				
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Last Name</label>
								<div class="col-sm-8">
									<input type="text" required name="lastname" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Middle Name</label>
								<div class="col-sm-8">
									<input type="text" required name="middlename" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					
					
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position Desired</label>
								<div class="col-sm-8">
								   <select required name="positiondesired">
										  <option disabled selected value>Select...</option>

										  <?php
										  $arr = array('Audit Assistant', 'Design Manager','CADD Architect');
										  for($i=0; $i<count($arr); $i++) {
											echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
											}
										  ?>

									</select>
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Expected Salary</label>
								<div class="col-sm-8">
									<input type="number" required name="expectedsalary" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Residence Address</label>
								<div class="col-sm-8">
									<input type="text" required name="residenceaddress" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Provincial Address</label>
								<div class="col-sm-8">
									<input type="text" name="provincialaddress" class="form-control">
								</div>
						</div>
					</div>
					</div>
				
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Email Address</label>
								<div class="col-sm-8">
									<input type="email" required name="emailaddress" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Mobile No</label>
								<div class="col-sm-8">
									<input type="number" name="mobileno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Citizenship</label>
								<div class="col-sm-8">
									<input type="text" required name="citizenship" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Telephone No</label>
								<div class="col-sm-8">
									<input type="number" name="telephoneno" class="form-control">
								</div>
						</div>
					</div>
					</div>


					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Gender</label>
								<div class="col-sm-8">
									<select required name="gender">
										  <option disabled selected value>Select...</option>

										  <?php
										  $arr = array('Male','Female');
										  for($i=0; $i<count($arr); $i++) {
											$element = $arr[$i];
											echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
											}
										  ?>
									</select>
								</div>
						</div>
					</div>
					</div>
					
						<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Civil Status</label>
								<div class="col-sm-8">
								   <select required name="civilstatus">
										  <option disabled selected value>Select...</option>

										  <?php
										  $arr = array('Single','Married', 'Divorced');
										  for($i=0; $i<count($arr); $i++) {
											echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
											}
										  ?>
									</select>
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Religion</label>
								<div class="col-sm-8">
									<input type="text" required name="religion" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
						<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Birthdate</label>
								<div class="col-sm-8">
									<input type="date" required name="birthdate" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Licensed</label>
								<div class="col-sm-8">
									<select required name="licensed">
										  <option disabled selected value>Select...</option>

										  <?php
										  $arr = array('Yes', 'No');
										  for($i=0; $i<count($arr); $i++) {
											echo "<option value=\"{$arr[$i]}\">".$arr[$i].'</option>';
											}
										  ?>
									</select>
								</div>
						</div>
					</div>
					</div>
					
						
						<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Birthplace</label>
								<div class="col-sm-8">
									<input type="text" required name="birthplace" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<h3>Spouse Information</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Name</label>
								<div class="col-sm-8">
									<input type="text" name="spousename" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Occupation</label>
								<div class="col-sm-8">
									<input type="text" name="spouseoccupation" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" name="spousecompany" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company No.</label>
								<div class="col-sm-8">
									<input type="number" name="spousecompanyno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<h3>Educational Attainment</h3>
					
					<h4>Elementary</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">School Name</label>
								<div class="col-sm-8">
									<input type="text" required name="schoolname1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" required name="schooladdress1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Degree</label>
								<div class="col-sm-8">
									<input type="text" name="schooldegree1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
								<div class="col-sm-8">
									<input type="text" name="schoolhonorsrecieved1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolstartyear1" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolendyear1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h4>Secondary</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">School Name</label>
								<div class="col-sm-8">
									<input type="text" required name="schoolname2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" required name="schooladdress2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Degree</label>
								<div class="col-sm-8">
									<input type="text" name="schooldegree2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
								<div class="col-sm-8">
									<input type="text" name="schoolhonorsrecieved2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolstartyear2" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolendyear2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h4>Tertiary/College</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">School Name</label>
								<div class="col-sm-8">
									<input type="text" required name="schoolname3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" required name="schooladdress3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Degree</label>
								<div class="col-sm-8">
									<input type="text" name="schooldegree3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
								<div class="col-sm-8">
									<input type="text" name="schoolhonorsrecieved3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolstartyear3" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Year</label>
								<div class="col-sm-8">
									<input type="number" required name="schoolendyear3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h4>Post Graduate</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">School Name</label>
								<div class="col-sm-8">
									<input type="text" name="schoolname4" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" name="schooladdress4" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Degree</label>
								<div class="col-sm-8">
									<input type="text" name="schooldegree4" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Honors Recieved</label>
								<div class="col-sm-8">
									<input type="text" name="schoolhonorsrecieved4" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Year</label>
								<div class="col-sm-8">
									<input type="number" name="schoolstartyear4" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Year</label>
								<div class="col-sm-8">
									<input type="number" name="schoolendyear4" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					 <h3>Employment Record</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Company Name</label>
								<div class="col-sm-8">
									<input type="text" name="previouscompany1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact Number</label>
								<div class="col-sm-8">
									<input type="number" name="previouscompanycontactnumber1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" name="previouscompanyaddress1" class="form-control">
								</div>
						</div>
					</div>
					</div>  
					
						
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position Held</label>
								<div class="col-sm-8">
									<input type="text" name="positionheld1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Reason for Leaving</label>
								<div class="col-sm-8">
									<input type="text" name="reasonforleaving1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Salary Recieved</label>
								<div class="col-sm-8">
									<input type="number" name="salaryrecieved1" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Date</label>
								<div class="col-sm-8">
									<input type="date" name="employmentstartdate1" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Date</label>
								<div class="col-sm-8">
									<input type="date" name="employmentenddate1" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Company Name</label>
								<div class="col-sm-8">
									<input type="text" name="previouscompany2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact Number</label>
								<div class="col-sm-8">
									<input type="number" name="previouscompanycontactnumber2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" name="previouscompanyaddress2" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					 
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position Held</label>
								<div class="col-sm-8">
									<input type="text" name="positionheld2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Reason for Leaving</label>
								<div class="col-sm-8">
									<input type="text" name="reasonforleaving2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Salary Recieved</label>
								<div class="col-sm-8">
									<input type="number" name="salaryrecieved2" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Start Date</label>
								<div class="col-sm-8">
									<input type="date" name="employmentstartdate2" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">End Date</label>
								<div class="col-sm-8">
									<input type="date" name="employmentenddate2" class="form-control">
								</div>
						</div>
					</div>
					</div> 
					
					<h3>Government Exam Taken</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Title of Exam</label>
								<div class="col-sm-8">
									<input type="text" name="examtitle1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date</label>
								<div class="col-sm-8">
									<input type="date" name="examdate1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Venue</label>
								<div class="col-sm-8">
									<input type="text" name="examvenue1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Rating</label>
								<div class="col-sm-8">
									<input type="text" name="examrating1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Title of Exam</label>
								<div class="col-sm-8">
									<input type="text" name="examtitle2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date</label>
								<div class="col-sm-8">
									<input type="date" name="examdate2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Venue</label>
								<div class="col-sm-8">
									<input type="text" name="examvenue2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Rating</label>
								<div class="col-sm-8">
									<input type="text" name="examrating2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h3>Memberships/Affiliations and Associations</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Organization</label>
								<div class="col-sm-8">
									<input type="text" name="membershiporganization1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position</label>
								<div class="col-sm-8">
									<input type="text" name="membershipposition1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" name="membershipaddress1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date of Membership</label>
								<div class="col-sm-8">
									<input type="date" name="membershipdate1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Organization</label>
								<div class="col-sm-8">
									<input type="text"  name="membershiporganization2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position</label>
								<div class="col-sm-8">
									<input type="text" name="membershipposition2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Address</label>
								<div class="col-sm-8">
									<input type="text" name="membershipaddress2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date of Membership</label>
								<div class="col-sm-8">
									<input type="date" name="membershipdate2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<h3>Special Training/Seminars Attended</h3>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Title of Training</label>
								<div class="col-sm-8">
									<input type="text" name="trainingtitle1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date</label>
								<div class="col-sm-8">
									<input type="date" name="trainingdate1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Venue</label>
								<div class="col-sm-8">
									<input type="text" name="trainingvenue1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Resource Person</label>
								<div class="col-sm-8">
									<input type="text" name="trainingresourceperson1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Title of Training</label>
								<div class="col-sm-8">
									<input type="text" name="trainingtitle2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Date</label>
								<div class="col-sm-8">
									<input type="date" name="trainingdate2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Venue</label>
								<div class="col-sm-8">
									<input type="text" name="trainingvenue2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					 <div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Resource Person</label>
								<div class="col-sm-8">
									<input type="text" name="trainingresourceperson2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h3>Family Background</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Name</label>
								<div class="col-sm-8">
									<input type="text" name="familyname1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" name="familyrelation1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Occupation</label>
								<div class="col-sm-8">
									<input type="text" name="familyoccupation1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" name="familycompany1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Residence</label>
								<div class="col-sm-8">
									<input type="text" name="familyresidence1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" name="familycontactno1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Name</label>
								<div class="col-sm-8">
									<input type="text" name="familyname2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" name="familyrelation2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Occupation</label>
								<div class="col-sm-8">
									<input type="text" name="familyoccupation2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" name="familycompany2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Residence</label>
								<div class="col-sm-8">
									<input type="text" name="familyresidence2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" name="familycontactno2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">3. Name</label>
								<div class="col-sm-8">
									<input type="text" name="familyname3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" name="familyrelation3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Occupation</label>
								<div class="col-sm-8">
									<input type="text" name="familyoccupation3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" name="familycompany3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Residence</label>
								<div class="col-sm-8">
									<input type="text" name="familyresidence3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" name="familycontactno3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					
					<h3>Other Information</h3>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">SSS No.</label>
								<div class="col-sm-8">
									<input type="number" name="sssno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Philhealth No.</label>
								<div class="col-sm-8">
									<input type="number" name="philhealthno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">TIN No.</label>
								<div class="col-sm-8">
									<input type="number" name="tinno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Pag-Ibig No.</label>
								<div class="col-sm-8">
									<input type="number" name="pagibigno" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h3>Background Check Authorization</h3>
					
					<h4>Employment References</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="referencename1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position</label>
								<div class="col-sm-8">
									<input type="text" required name="referenceposition1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="referencecompany1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="referencecontactno1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="referencename2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position</label>
								<div class="col-sm-8">
									<input type="text" required name="referenceposition2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="referencecompany2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="referencecontactno2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">3. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="referencename3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Position</label>
								<div class="col-sm-8">
									<input type="text" required name="referenceposition3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="referencecompany3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="referencecontactno3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<h4>Character References</h4>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">1. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="charactername1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" required name="characterrelation1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="charactercompany1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="charactercontactno1" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">2. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="charactername2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" required name="characterrelation2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="charactercompany2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="charactercontactno2" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">3. Name</label>
								<div class="col-sm-8">
									<input type="text" required name="charactername3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Relation</label>
								<div class="col-sm-8">
									<input type="text" required name="characterrelation3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Company</label>
								<div class="col-sm-8">
									<input type="text" required name="charactercompany3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<div class="bio-row">
					<div class="form-horizontal tasi-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="number" required name="charactercontactno3" class="form-control">
								</div>
						</div>
					</div>
					</div>
					
					<br></br>
				
						<input type="submit" name="submit" value="submit" />
						
						<?php echo $message; ?>
						
				</form>
					<br></br>
			  </section>
			  </div>
			</div>
		  </section>
	  </section>  

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
	
	    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>
	  
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>


  <!--Form Validation-->
  <script src="js/bootstrap-validator.min.js" type="text/javascript"></script>

  <!--Form Wizard-->
  <script src="js/jquery.steps.min.js" type="text/javascript" style="overflow: auto;"></script>
  <script src="js/jquery.validate.min.js" type="text/javascript" style="overflow: auto;"></script>


  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/jquery.stepy.js"></script>


  <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab'
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function () {
          var form = $("#wizard-validation-form");
          form.validate({
              errorPlacement: function errorPlacement(error, element) {
                  element.after(error);
              }
          });
          form.children("div").steps({
              headerTag: "h3",
              bodyTag: "section",
              transitionEffect: "slideLeft",
              onStepChanging: function (event, currentIndex, newIndex) {
                  form.validate().settings.ignore = ":disabled,:hidden";
                  return form.valid();
              },
              onFinishing: function (event, currentIndex) {
                  form.validate().settings.ignore = ":disabled";
                  return form.valid();
              },
              onFinished: function (event, currentIndex) {
                  alert("Submitted!");
              }
          });


      });
  </script>  

</body>

</html>

<!-- Mirrored from thevectorlab.net/flatlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Aug 2016 23:47:16 GMT -->
</html>
