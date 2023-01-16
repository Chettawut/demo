<?php
	header('Content-Type: application/json');
	include_once('../../../const.php');
	$conn= sql_pdo();
	
	// $_POST["empCode"]='610718001';

    $strSQL = " SELECT * FROM [RWI_DATACENTER].[dbo].[Au_EmpMaster] a inner join [RWI_DATACENTER].[dbo].[Au_EmpDetail] b on a.EmpCode = b.EmpCode ";
	$strSQL .= " where a.empCode = '".$_POST["empCode"]."' and EmpEnd = '' ";
	$obj = $conn->prepare($strSQL);
	$obj->execute();    
	$row = $obj->fetch( PDO::FETCH_ASSOC );


	$strSQL2 = " SELECT [EmpCode],[LanguageName],[Speak],[Read],[Write] FROM [RWI_DATACENTER].[dbo].[Au_EmpLanguage] ";
	$strSQL2 .= " where EmpCode = '".$_POST["empCode"]."' order by LanguageName desc ";
	$obj2 = $conn->prepare($strSQL2);
	$obj2->execute();  

	$Speak=array(); 
	$Read=array(); 
	$Write=array();

		while($row2 = $obj2->fetch( PDO::FETCH_ASSOC ))
		{
			array_push($Speak,$row2['Speak']);
			array_push($Read,$row2['Read']);
			array_push($Write,$row2['Write']);
		}

	$strSQL3 = " SELECT [EmpCode],[AddID],[AddAlley],[AddRoad],[AddSubDistrict],[AddDistrict],[AddProvince],[AddZip],[AddPhone],[AddType] FROM [RWI_DATACENTER].[dbo].[Au_EmpAddress] ";
	$strSQL3 .= " where EmpCode = '".$_POST["empCode"]."' order by Empcode,AddType asc ";
	$obj3 = $conn->prepare($strSQL3);
	$obj3->execute();  

	$AddID=array();
	$AddAlley=array();
	$AddRoad=array();
	$AddSubDistrict=array();
	$AddDistrict=array();
	$AddProvince=array();
	$AddZip=array();
	$AddPhone=array();

	while($row3 = $obj3->fetch( PDO::FETCH_ASSOC ))
		{
			array_push($AddID,$row3['AddID']);
			array_push($AddAlley,$row3['AddAlley']);
			array_push($AddRoad,$row3['AddRoad']);
			array_push($AddSubDistrict,$row3['AddSubDistrict']);
			array_push($AddDistrict,$row3['AddDistrict']);
			array_push($AddProvince,$row3['AddProvince']);
			array_push($AddZip,$row3['AddZip']);
			array_push($AddPhone,$row3['AddPhone']);
		}

	$strSQL4 = " SELECT [EmpCode],[FamilyCode],[FirstName],[LastName],[Occupation],[Mobile] FROM [RWI_DATACENTER].[dbo].[Au_EmpFamily] ";
	$strSQL4 .= "where EmpCode = '".$_POST["empCode"]."'  order by EmpCode,FamilyCode asc ";
	$obj4 = $conn->prepare($strSQL4);
	$obj4->execute();  

	$FirstName=array();
	$LastName=array();
	$Occupation=array();
	$Mobile=array();

	while($row4 = $obj4->fetch( PDO::FETCH_ASSOC ))
		{			
			array_push($FirstName,$row4['FirstName']);
			array_push($LastName,$row4['LastName']);
			array_push($Occupation,$row4['Occupation']);
			array_push($Mobile,$row4['Mobile']);
		}
	
	$strSQL5 = " SELECT  [EmpCode],[EdoName],[EdoBackground],[EdoDepartment],[EdoYearIn],[EdoYearOut],[EdoNo],[EdoAvgGrade] FROM [RWI_DATACENTER].[dbo].[Au_EmpEdocation] ";
	$strSQL5 .= " where EmpCode = '".$_POST["empCode"]."'  order by EmpCode,EdoNo asc ";
	$obj5 = $conn->prepare($strSQL5);
	$obj5->execute(); 

	$EdoName=array();
	$EdoBackground=array();
	$EdoDepartment=array();
	$EdoYearIn=array();
	$EdoYearOut=array();
	$EdoAvgGrade=array();

	while($row5 = $obj5->fetch( PDO::FETCH_ASSOC ))
		{
			array_push($EdoName,$row5['EdoName']);
			array_push($EdoBackground,$row5['EdoBackground']);
			array_push($EdoDepartment,$row5['EdoDepartment']);
			array_push($EdoYearIn,$row5['EdoYearIn']);
			array_push($EdoYearOut,$row5['EdoYearOut']);
			array_push($EdoAvgGrade,$row5['EdoAvgGrade']);
		}

	$strSQL6 = "SELECT [EmpCode],[WorkName],[WorkStartSalary],[WorkStopSalary],[WorkPosition],[WorkDetail],[WorkReason],[WorkNo] FROM [RWI_DATACENTER].[dbo].[Au_EmpHistoryWork] ";
	$strSQL6 .= "where EmpCode = '".$_POST["empCode"]."'  order by EmpCode,WorkNo asc ";
	$obj6 = $conn->prepare($strSQL6);
	$obj6->execute(); 

	$WorkName=array();
	$WorkStartSalary=array();
	$WorkStopSalary=array();
	$WorkPosition=array();
	$WorkDetail=array();
	$WorkReason=array();

	while($row6 = $obj6->fetch( PDO::FETCH_ASSOC ))
		{
			array_push($WorkName,$row6['WorkName']);
			array_push($WorkStartSalary,$row6['WorkStartSalary']);
			array_push($WorkStopSalary,$row6['WorkStopSalary']);
			array_push($WorkPosition,$row6['WorkPosition']);
			array_push($WorkDetail,$row6['WorkDetail']);
			array_push($WorkReason,$row6['WorkReason']);

		}

	echo json_encode(array('status' => '1','empcode'=> $_POST["empCode"] 
		,'EmpName' => $row['EmpName']
		,'LastName'=> $row['LastName']
		,'ETitleName'=> $row['ETitleName']
		,'EmpNameEN' => $row['EmpNameEN']
		,'LastNameEN'=> $row['LastNameEN']
		,'ETitleNameEN'=> $row['ETitleNameEN']
		,'SECODE'=> $row['SECODE'] ,'CTCODE'=> $row['CTCODE']
		,'EmpPosition'=> $row['EmpPosition'],'DepCode'=> $row['DepCode']
		,'WorkAt'=> $row['WorkAt'],'EmpTestDate'=> $row['EmpTestDate']
		,'EmpNickName'=> $row['EmpNickName']
		,'EmpBirth'=> $row['EmpBirth'],'Weight'=> $row['Weight']
		,'Height'=> $row['Height'],'TaxCode'=> $row['TaxCode']
		,'EmpBirthPlace'=> $row['EmpBirthPlace'] 
		,'SocialCode'=> $row['SocialCode'],'EmpPublicCode'=> $row['EmpPublicCode']
		,'HospitalCode'=> $row['HospitalCode']
		,'Citizen'=> $row['Citizen'] 
		,'Nationality'=> $row['Nationality'] 
		,'Religion'=> $row['Religion']
		,'Blood'=> $row['Blood']
		,'EmpStatus'=> $row['EmpStatus']
		,'Mobile'=> $row['Mobile']
		,'Conscripted'=> $row['Conscripted'] 
		,'Ability'=> $row['Ability']
		,'AbilityComputer'=> $row['AbilityComputer']
		,'Hobbies'=> $row['Hobbies']
		,'Sports'=> $row['Sports']
		,'TypingTH'=> $row['TypingTH'],'TypingEN'=> $row['TypingEN']
		,'LicenceCar'=> $row['LicenceCar'],'LicenceMotorcy'=> $row['LicenceMotorcy']
		,'MemberFamily'=> $row['MemberFamily'],'ChildFamily'=> $row['ChildFamily']
		,'Sex'=> $row['Sex'],'EmpLevel'=> $row['EmpLevel']
		,'Son'=> $row['Son'],'Daughter'=> $row['Daughter']
		,'SpeakTH'=> $Speak[0]
		,'ReadTH'=> $Read[0]
		,'WriteTH'=> $Write[0]
		,'SpeakEN'=> $Speak[1]
		,'ReadEN'=> $Read[1]
		,'WriteEN'=> $Write[1]

		,'AddID1'=> $AddID[0]
		,'AddAlley1'=> $AddAlley[0]
		,'AddRoad1'=> $AddRoad[0]
		,'AddSubDistrict1'=> $AddSubDistrict[0]
		,'AddDistrict1'=> $AddDistrict[0]
		,'AddProvince1'=> $AddProvince[0]
		,'AddZip1'=> $AddZip[0]
		,'AddPhone1'=> $AddPhone[0]
		,'AddID2'=> $AddID[1]
		,'AddAlley2'=> $AddAlley[1]
		,'AddRoad2'=> $AddRoad[1]
		,'AddSubDistrict2'=> $AddSubDistrict[1]
		,'AddDistrict2'=> $AddDistrict[1]
		,'AddProvince2'=> $AddProvince[1]
		,'AddZip2'=> $AddZip[1]
		,'AddPhone2'=> $AddPhone[1]

		,'FirstName3'=> $FirstName[0]
		,'LastName3'=> $LastName[0]
		,'Occupation3'=> $Occupation[0]
		,'Mobile3'=> $Mobile[0]

		,'FirstName4'=> $FirstName[1]
		,'LastName4'=> $LastName[1]
		,'Occupation4'=> $Occupation[1]
		,'Mobile4'=> $Mobile[1]

		,'FirstName5'=> $FirstName[2]
		,'LastName5'=> $LastName[2]
		,'Occupation5'=> $Occupation[2]
		,'Mobile5'=> $Mobile[2]

		,'FirstName6'=> $FirstName[3]
		,'LastName6'=> $LastName[3]
		,'Occupation6'=> $Occupation[3]
		,'Mobile6'=> $Mobile[3]

		,'EdoName1'=> $EdoName[0]
		,'EdoBackground1'=> $EdoBackground[0]
		,'EdoDepartment1'=> $EdoDepartment[0]
		,'EdoYearIn1'=> $EdoYearIn[0]
		,'EdoYearOut1'=> $EdoYearOut[0]
		,'EdoAvgGrade1'=> $EdoAvgGrade[0]

		,'EdoName2'=> $EdoName[1]
		,'EdoBackground2'=> $EdoBackground[1]
		,'EdoDepartment2'=> $EdoDepartment[1]
		,'EdoYearIn2'=> $EdoYearIn[1]
		,'EdoYearOut2'=> $EdoYearOut[1]
		,'EdoAvgGrade2'=> $EdoAvgGrade[1]

		,'EdoName3'=> $EdoName[2]
		,'EdoBackground3'=> $EdoBackground[2]
		,'EdoDepartment3'=> $EdoDepartment[2]
		,'EdoYearIn3'=> $EdoYearIn[2]
		,'EdoYearOut3'=> $EdoYearOut[2]
		,'EdoAvgGrade3'=> $EdoAvgGrade[2]

		,'EdoName4'=> $EdoName[3]
		,'EdoBackground4'=> $EdoBackground[3]
		,'EdoDepartment4'=> $EdoDepartment[3]
		,'EdoYearIn4'=> $EdoYearIn[3]
		,'EdoYearOut4'=> $EdoYearOut[3]
		,'EdoAvgGrade4'=> $EdoAvgGrade[3]

		,'WorkName1'=> $WorkName[0]
		,'WorkStartSalary1'=> $WorkStartSalary[0]
		,'WorkStopSalary1'=> $WorkStopSalary[0]
		,'WorkPosition1'=> $WorkPosition[0]
		,'WorkDetail1'=> $WorkDetail[0]
		,'WorkReason1'=> $WorkReason[0]

		,'WorkName2'=> $WorkName[1]
		,'WorkStartSalary2'=> $WorkStartSalary[1]
		,'WorkStopSalary2'=> $WorkStopSalary[1]
		,'WorkPosition2'=> $WorkPosition[1]
		,'WorkDetail2'=> $WorkDetail[1]
		,'WorkReason2'=> $WorkReason[1]

		,'WorkName3'=> $WorkName[2]
		,'WorkStartSalary3'=> $WorkStartSalary[2]
		,'WorkStopSalary3'=> $WorkStopSalary[2]
		,'WorkPosition3'=> $WorkPosition[2]
		,'WorkDetail3'=> $WorkDetail[2]
		,'WorkReason3'=> $WorkReason[2]));
	

?>