<?php
$connection = mysqli_connect("localhost","riteshbhandari","8534053016")or die("Cannot connect 1");

//my sql connection  ($=for variables)
$db = mysqli_select_db($connection,'minorDB')or die("Cannot connect base!");


// Processing form data when form is submitted
if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userTable WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        if (password_verify($password, $storedPassword)) {

            $updateQuery = "UPDATE userTable SET name = '$name', gender = '$gender' WHERE email = '$email'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "Details updated successfully";
            } else {
                echo "Error updating details: " . $conn->error;
            }
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User with the provided email does not exist";
    }
}
?>