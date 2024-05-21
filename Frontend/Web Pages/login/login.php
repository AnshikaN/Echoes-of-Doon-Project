<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $servername = "localhost"; // Replace with your server name if different
    $username = "root"; // Replace with your database username
    $password = "your_password"; // Replace with your database password
    $dbname = "echoesofdoon"; // Replace with your database name

    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT * FROM userTable WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if user exists and verify password
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password matches, user is authenticated
            // Start the session and set user as logged in
            session_start();
            $_SESSION['email'] = $email; // Store user's email in session

            // Redirect to the homepage or any other page after login
            header("Location: homepage.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    } else {
        // User does not exist
        echo "User not found!";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
