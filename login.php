<?php
include("config.php");

session_start();

if(isset($_POST["Submit_login"])==true){
	//Username and password sent from form
	$myusername=$_POST['username_text'];
	$mypassword=$_POST['password_text'];

	$sql=("SELECT * FROM systemusers WHERE UserName='$myusername' AND userpassword='$mypassword'");
	$result=mysqli_query($db,$sql);
	$count=mysqli_num_rows($result);

	if($count>0){
		
		$_SESSION['login_user']=$myusername;

		header('Location:dashboard.php');
	}

	else{
		$error="Your login name or password is invalid";
		echo($myusername);
		echo($mypassword);
	}
}
?>