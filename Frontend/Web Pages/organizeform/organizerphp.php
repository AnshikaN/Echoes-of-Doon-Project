<?php
$connection = mysqli_connect("localhost","root","")or die("Cannot connect 1");

//my sql connection  ($=for variables)
$db = mysqli_select_db($connection,'echoesofdoon')or die("Cannot connect base!");


// Processing form data when form is submitted
if(isset($_POST['Submit'])){
    $organiserName = $_POST["oname"];
    $eventName = $_POST["ename"];
    $fromDate = $_POST["from"];
    $toDate = $_POST["to"];
    $venue = $_POST["venue"];
    $timings = $_POST["duration"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["pnumber"];
    $price = $_POST["cost"];
    $about = $_POST["aboutevent"];
   // $image =$_POST["UploadImage"];
    // $fileName = basename($_FILES["resume"]["name"]);
    // $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    // $allowTypes = array('jpg' , 'png', 'jpeg', 'gif', 'jfif');
    
    $sql = mysqli_query($connection, "INSERT INTO organisertable (`organiserName`, `eventName`, `fromDate`, `toDate`, `venue`, `timings`, `email`, `phoneNumber`, `price`, `about`) VALUES('".$organiserName."',' ".$eventName."', '".$fromDate."', '".$toDate."', '".$venue."', '".$timings."', '".$email."', '".$phoneNumber."',' ".$price."', '".$about."')") or die("Cannot connect1 to database!");


    if($sql){    
     echo"<script> alert('done successfully');window.location='../homepage/homepage.html';</script>";} 
    else{
    echo"<script>alert('Error');</script>";}    
}

?>