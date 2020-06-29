<?php
include("config.php");

session_start();

	//Username and password sent from form
	if(isset($_POST["AddStudent1"])){
		$studentName=$_POST['studentName'];
	$regNo=$_POST['regNo'];
	$nationalId=$_POST['nationalId'];
	$studentCourses=$_POST['studentCourses'];
	$attireValue=$_POST['attire_text']==='attire' ? 1 : 0;
    $studentAmount=$_POST['studentAmount'];


	$sqlAdd=("INSERT INTO students(Name,regNo,nationalId,isActive,course,amount,status,isGownIssued,isGownReturned) 
		VALUES('$studentName','$regNo','$nationalId',1,'$studentCourses','$studentAmount','Not Cleared','$attireValue',0)");
	/*$result=mysqli_query($db,$sqlAdd);*/

	   if(mysqli_query($db,$sqlAdd)){
        /*echo json_encode(array('success' => true)); */
        header('Location:dashboard.php');

    }else {
        /*echo json_encode(array('success' => false)); */
        echo "Error inserting data";
    }
	}

?>