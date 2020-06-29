<?php
include("config.php");

session_start();

	//Username and password sent from form
	if(isset($_POST["clearStudent1"])){
	$studentName1=$_POST['studentName1'];
	$attireValue1=$_POST['attire_text1']==='attire1' ? 1 : 0;
    $studentAmount1=$_POST['studentAmount1'];


	$sqlAdd=("UPDATE students SET amount=amount-'$studentAmount1',isGownReturned='$attireValue1' WHERE Name='$studentName1' OR regNo='$studentName1'");

	$sqlAdd2=("UPDATE students SET status='Cleared' WHERE amount < 1");
	/*$result=mysqli_query($db,$sqlAdd);*/

	   if(mysqli_query($db,$sqlAdd)){
	   	   if(mysqli_query($db,$sqlAdd2)){
	   	   	header('Location:dashboard.php');
	   	   }
	   	   else{
	   	   	echo "Error inserting data";
	   	   }
        /*echo json_encode(array('success' => true)); */
        

    }else {
        /*echo json_encode(array('success' => false)); */
        echo "Error inserting data";
    }
	}

?>




