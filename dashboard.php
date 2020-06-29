<?php
   include("config.php");
   session_start();
   $userCredential=$_SESSION["login_user"];



   $getGraduates=("SELECT COUNT(id) AS id FROM students ");
   $result=mysqli_query($db,$getGraduates);
   $row = mysqli_fetch_assoc($result);
   $graduatesCount=$row["id"];

   $getClearedGraduates=("SELECT COUNT(id) AS id FROM students WHERE status='Cleared'");
   $result1=mysqli_query($db,$getClearedGraduates);
   $row1 = mysqli_fetch_assoc($result1);
   $clearedGraduatesCount=$row1["id"];

   $getAllGraduates=("SELECT * FROM students ");
   $result2=mysqli_query($db,$getAllGraduates);
  /* $row2 = mysqli_fetch_assoc($result2);
   $graduatesCount=$row2["id"];*/

   $getAmountExpected=("SELECT SUM(amount) AS amount FROM students WHERE status='NOT Cleared'");
    $result3=mysqli_query($db,$getAmountExpected);
   $row3 = mysqli_fetch_assoc($result3);
   $amountExpected=$row3["amount"];

   $getAllCourses=("SELECT * FROM courses ");
   $result4=mysqli_query($db,$getAllCourses);
?>

<html>
<head><title>Clearance Application</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

 
<style type="text/css">
 .main_background{
 	/*background: url(university.jpg) left top no-repeat;
 	padding: 15px;
 	background-size: 100% 100%,auto;
 	background-color: rgba(0,0,0,1);
    opacity: 0.2;*/
    background-color:rgba(0,0,0,1);
 }
 .main_background img{

 }

 body{

 	background: rgba(211,215,217,0.5);
 }

/*.nav-link:hover{
  background: rgba(0,0,0,100);

}*/
 
	
</style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-between" role="navigation">

<div class="navbar-header">
<a class="navbar-brand" href="#">Graduates Clearance Application</a>
</div>

<!--<ul class="navbar-nav">
<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
<li class="nav-item"><a class="nav-link" href="#">Page 1</a></li>
<li class="nav-item"><a class="nav-link" href="#">Page 2</a></li>
</ul>-->

<ul class="navbar-nav">
      <h5 class="nav-item active"><a class="nav-link" href="#"><span class="far fa-user" style="color: white;"></span>&nbsp Logout</a></h5>
      
    </ul>


</nav>

</div>
<div class="flex-row">
<div class="container col-sm-2 bg-white rounded-sm shadow mr-2 ml-1 mt-5" style="height:80%;float: left;">
 <div class="container-fluid bg-success rounded-sm shadow" style="position: relative;margin-top: -20px;padding-bottom: 20px;">
    <div class="container col-sm-12" style="height: 10%">
      
      <div class="flex-row">
        <h5 class="pt-3" style="color: white;font-size: 0.8em;">Logged In as:       <?php echo"$userCredential"?></h5>
      </div>
    </div>
  </div>
<div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add Student</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Clear student</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
</div>

<!--<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>-->
</div>

<div class="container col-sm-9 tab-content rounded-sm shadow bg-white  mt-5" id="v-pills-tabContent" style="float: left;">
  <div class="container-fluid bg-success rounded-sm shadow-lg" style="position: relative;margin-top: -20px;padding-bottom: 20px;">
    <div class="container col-sm-12 pt-3" style="height: 10%;">
      <div class="flex-row">
        <div class="container col-sm-8" style="float: left;">
        <ul class="nav">
      <li class="nav-item"><a class="nav-link" href="#" style="color: white;"><span class="fas fa-user-graduate" style="color: white;"></span> Graduates(<?php echo"$graduatesCount"?>)</a></li>

      <li class="nav-item"><a class="nav-link" href="#" style="color: white;"><span class="fas fa-book" style="color: white;"></span> Cleared(<?php echo"$clearedGraduatesCount"?>)</a></li>

       <li class="nav-item"><a class="nav-link" href="#" style="color: white;"><span class="fa fa-money" style="color: white;"></span> Amount Expected(Ksh <?php echo"$amountExpected"?>)</a></li>
      
    </ul>


        </div>

        <div class="container col-sm-4" style="float: left;">
        <form class="form-inline" action="">
        <div class="form-group">
    <input type="email" class="form-control" id="email">
  </div>
  <button type="button" class="btn btn-primary">Search <span class="fa fa-money"></span></button>
  
</form>


        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="flex-row p-2" style="float: left;"> 
    <div class="container col-sm-10">
       <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Names</th>
      <th scope="col">RegNo</th>
      <th scope="col">IDNo</th>
      <th scope="col">Course</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Gown Returned</th>
    </tr>
  </thead>
  <tbody>
  <?php
   while($row2 = $result2 -> fetch_assoc()){
        $field0name=$row2["id"];
        $field1name = $row2["Name"];
        $field2name = $row2["regNo"];
        $field3name = $row2["nationalId"];
        $field4name = $row2["course"];
        $field5name = $row2["amount"];  
        $field6name = $row2["status"];
        $field7name = $row2["isGownReturned"]===1 ? 'YES' : 'NO';

    echo "<tr>";
    echo "<th scope='row'>".$field0name."</th>";
    echo "<td>".$field1name."</td>";
    echo "<td> ".$field2name."</td>";
    echo "<td> ".$field3name."</td>";
    echo "<td> ".$field4name."</td>";
    echo "<td>".$field5name."</td>";
    echo "<td> ".$field6name."</td>";
    echo "<td> ".$field7name." </td>";

    echo "</tr>";
   }

   echo "</tbody>";
    echo "</table>";
  ?>
   
<!--</div>
</div>-->

   <div class="flex-row mt-5">
    <div class="container col-sm-5">
     <button type="button" class="btn btn-primary active">Add Graduate</button>
   </div>
   </div>
  </div>
  </div>
  </div>
  
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="flex-row p-1" style="float: left;"> 
    <div class="container-fluid col-sm-12">
    <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-user-alt icon-4x"> Student Personal Details</i></h4>
    </div>
     <form action="addStudent.php" method="POST" name="myForm1" id="myForm1">
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-10">
      <input type="text" class="form-control" id="studentName" placeholder="Enter student's full names" name="studentName">
    </div>
    <div class="container col-sm-10">
      <input type="text" class="form-control" placeholder="Enter RegNo" name="regNo" id="regNo">
    </div>
  </div>

  <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-10">
      <input type="text" class="form-control" id="nationalId" placeholder="Enter student's national Id" name="nationalId">
    </div>
    <div class="container col-sm-10">
      <select class="form-control" id="studentCourses" name="studentCourses">
       <?php
   while($row3 = $result4 -> fetch_assoc()){
        $studentCourseName=$row3["courseName"];
        
    echo "<OPTION>".$studentCourseName."</OPTION>";
    
   }

   echo "</SELECT>";
    
  ?>
  
    </div>
  </div>


  <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-graduation-cap icon-4x"> Graduation Attire</i></h4>
    </div>
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
     <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="attire" name="attire_text" id="attire_text" style="font-size: 0.8em">By selecting this checkbox,you agree that you have been issued the following:
  </label>
</div>
    </div>
  </div>

  <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <ul class="nav flex-column">
         <li class="nav-item">
    <a class="nav-link disabled" href="#"><span class="fas fa-graduation-cap"></span>Graduation Cap</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"><span class="fas fa-user-graduate"></span>Graduation Gown</a>
  </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-money-bill-wave-alt icon-4x"> Finance</i></h4>
    </div>
     
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <input type="text" class="form-control" id="studentAmount" placeholder="Enter Balance cleared(from finance)"  
      name="studentAmount">
    </div>
    
  </div>

  <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <button type="submit" class="btn btn-primary" name="AddStudent1" id="AddStudent1"><span id="error" style="display:none; color:#F00">Some Error!Please Fill form Properly </span> <span id="success" style="display:none; color:#0C0">All the records are submitted!</span>Add Student</button>
    </div>
  </div>


     </form>

    </div>
  </div>
   </div>

  <!-- Third Tab-->
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
    
    <div class="flex-row p-1" style="float: left;"> 
    <div class="container-fluid col-sm-12">
    <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-user-alt icon-4x"> Student Personal details</i></h4>
    </div>
     <form action="clearStudents.php" method="POST">
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <input type="text" class="form-control" id="studentName1" placeholder="Enter student's full names or registration no" 
      name="studentName1">
    </div>
  </div>

  


  <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-graduation-cap icon-4x"> Graduation Attire</i></h4>
    </div>
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
     <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" name="attire_text1" value="attire1" style="font-size: 0.8em">full graduation attire has been returned?:
  </label>
</div>
    </div>
  </div>

  <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <ul class="nav flex-column">
         <li class="nav-item">
    <a class="nav-link disabled" href="#"><span class="fas fa-graduation-cap"></span>Graduation Cap</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"><span class="fas fa-user-graduate"></span>Graduation Gown</a>
  </li>
      </ul>
    </div>
  </div>

  <div class="container-fluid col-sm-12 p-3">
    <h4><i class="fas fa-money-bill-wave-alt icon-4x"> Finance</i></h4>
    </div>
     
     <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <input type="text" class="form-control" id="studentAmount1" placeholder="Enter Balance cleared(from finance)"  
      name="studentAmount1">
    </div>
    
  </div>

  <div class="d-flex pt-3 pr-1">
    <div class="container col-sm-12">
      <button type="submit" class="btn btn-primary" name="clearStudent1" id="clearStudent1">Clear graduant</button>
    </div>
  </div>


     </form>

    </div>
  </div>


  </div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>
</div>
<!--<div class="col-sm- bg-light rounded-sm mr-3 mt-1 ml-1" style="height: 80%;">
<div class="flex-row">
<div class="container-fluid bg-light" style="height: 10%;">
</div>
</div>



</div>-->


<!--<div class="main_background" style="width: 100%;height: 100%;">
</div>-->

<!--<div class="container">
  <h2>Cards with Contextual Classes</h2>
  <div class="card">
    <div class="card-body">Basic card</div>
  </div>
  <br>
  <div class="card bg-primary text-white">
    <div class="card-body">Primary card</div>
  </div>
  <br>
  <div class="card bg-success text-white">
    <div class="card-body">Success card</div>
  </div>
  <br>
  <div class="card bg-info text-white">
    <div class="card-body">Info card</div>
  </div>
  <br>
  <div class="card bg-warning text-white">
    <div class="card-body">Warning card</div>
  </div>
  <br>
  <div class="card bg-danger text-white">
    <div class="card-body">Danger card</div>
  </div>
  <br>
  <div class="card bg-secondary text-white">
    <div class="card-body">Secondary card</div>
  </div>
  <br>
  <div class="card bg-dark text-white">
    <div class="card-body">Dark card</div>
  </div>
  <br>
  <div class="card bg-light text-dark">
    <div class="card-body">Light card</div>
  </div>
</div>

<div class="shadow-none p-3 mb-5 bg-light rounded">No shadow</div>
<div class="shadow-sm p-3 mb-5 bg-white rounded">Small shadow</div>
<div class="shadow p-3 mb-5 bg-white rounded">Regular shadow</div>
<div class="shadow-lg p-3 mb-5 bg-white rounded">Larger shadow</div>-->


<!--<div class="jumbotron">
background-image: url(university.jpg);
	background-size: cover;
	background-repeat: no-repeat;
    background-position: left top;
    background-attachment: fixed;
    opacity: 0.9;
background-color: rgba(255, 0, 0, 0.3);
background-image: url("img/login/university.jpg");
<p>This is my new app</p>
</div>-->

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  });


  $(document).ready(function(){

  $('#myForm').on('submit',function(e) {

    $.ajax({
        data:$(this).serialize(),
        type:'POST',
        url : 'addStudent.php',
        success:function(data){

            console.log(data);
            var rsp = $.parseJSON (data)

            if(rsp["success"] == true){

                $("#success").show().fadeOut(5000); //=== Show Success Message==

            }else {

                $("#error").show().fadeOut(5000); //===Show Error Message====

            } 
        },
        error:function(data){

                $("#error").show().fadeOut(5000); //===Show Error Message====

        }
    });

    e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===

  });

});
</script>
</body>
<html>

