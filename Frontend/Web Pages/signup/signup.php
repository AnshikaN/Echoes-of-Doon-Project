<?php 
$connection = mysqli_connect("localhost","root","")or die("Cannot connect");
$db = mysqli_select_db($connection,'echoesofdoon')or die("Cannot connect1 base!");
if(isset($_POST['btn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $ConfPassword = $_POST['confirmPassword'];

    // if($password==$ConfPassword)
    // {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usertable ( `Name`,`Email`,`Gender` ,`password`) VALUES ( '".$name."','".$email."', '".$gender."','".$password."')"or die("Cannot Insert");

    if (mysqli_query($connection,$sql)) {
        echo "New record created successfully";
    } else {
        echo "Error:";
    } 
    // }
}
?>