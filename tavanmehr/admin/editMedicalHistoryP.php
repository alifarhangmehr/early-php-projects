<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
require('../class/connection.php');
require('../class/shamsiDate.php');

$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';


$medicalHistoryId=$_POST['medicalHistoryId'];
$attendingPhysician=$_POST['attendingPhysician'];
$admissionDateEN=$_POST['admissionDateEN'];
$admissionDateFA=$_POST['admissionDateFA'];
$presentingSymptoms=$_POST['presentingSymptoms'];
$historyOfPresentIllness=$_POST['historyOfPresentIllness'];
$pastDiseaseHistory=$_POST['pastDiseaseHistory'];
$currentDrugthrapyAndOtherAddiction=$_POST['currentDrugthrapyAndOtherAddiction'];
$allergyTo=$_POST['allergyTo'];
$familyHistory=$_POST['familyHistory'];
$skin=$_POST['skin'];
$skull=$_POST['skull'];
$ear=$_POST['ear'];
$eye=$_POST['eye'];
$nose=$_POST['nose'];
$mouth=$_POST['mouth'];
$throat=$_POST['throat'];
$lymphaticGlands=$_POST['lymphaticGlands'];
$chest=$_POST['chest'];
$breast=$_POST['breast'];
$heart=$_POST['heart'];
$lung=$_POST['lung'];
$vessels=$_POST['vessels'];
$abdomen=$_POST['abdomen'];
$genitalOrganMale=$_POST['genitalOrganMale'];
$genitalOrganFemale=$_POST['genitalOrganFemale'];
$rectum=$_POST['rectum'];
$nervousSystem=$_POST['nervousSystem'];
$extremities=$_POST['extremities'];
$boneJointsMuscles=$_POST['boneJointsMuscles'];
$summary=$_POST['summary'];
$preDX=$_POST['preDX'];
$signatureId=$_POST['signatureId'];

$query="UPDATE `tavanmehr`.`medicalhistory` SET `attendingPhysician` = '$attendingPhysician',
`admissionDateEN` = '$admissionDateEN',
`admissionDateFA` = '$admissionDateFA',
`presentingSymptoms` = '$presentingSymptoms',
`historyOfPresentIllness` = '$historyOfPresentIllness',
`pastDiseaseHistory` = '$pastDiseaseHistory',
`currentDrugthrapyAndOtherAddiction` = '$currentDrugthrapyAndOtherAddiction',
`allergyTo` = '$allergyTo',
`familyHistory` = '$familyHistory',
`skin` = '$skin',
`skull` = '$skull',
`ear` = '$ear',
`eye` = '$eye',
`nose` = '$nose',
`mouth` = '$mouth',
`throat` = '$throat',
`lymphaticGlands` = '$lymphaticGlands',
`chest` = '$chest',
`breast` = '$breast',
`heart` = '$heart',
`lung` = '$lung',
`vessels` = '$vessels',
`abdomen` = '$abdomen',
`genitalOrganMale` = '$genitalOrganMale',
`genitalOrganFemale` = '$genitalOrganFemale',
`rectum` = '$rectum',
`nervousSystem` = '$nervousSystem',
`extremities` = '$extremities',
`boneJointsMuscles` = '$boneJointsMuscles',
`summary` = '$summary',
`preDX` = '$preDX',
`signatureId` = '$signatureId' WHERE `medicalhistory`.`medicalHistoryId` ='$medicalHistoryId'";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM medicalhistory WHERE medicalHistoryId='$medicalHistoryId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientMedicalHistory.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showMedicalHistory.php"
//-->
</script>
</body>
</html>
