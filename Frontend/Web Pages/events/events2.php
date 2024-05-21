<?php
// Database credentials
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = " "; // Replace with your password
$dbname = "echoesofdoon"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve event details from userTable
$sql = "SELECT * FROM organisertable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Create event container for each event
        echo '<div class="event-box">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>' . $row["date"] . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

?>

<?php
// Database credentials
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "echoesofdoon"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve event details from organisertable
$sql = "SELECT * FROM organisertable";
$result = $conn->query($sql);

$data = array(); // Create an empty array to store event data

if ($result->num_rows > 0) {
    // Loop through each row and store event details in the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // Send events data as JSON response
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // If no results found, return empty JSON array
    header('Content-Type: application/json');
    echo json_encode([]);
}

// Close connection
$conn->close();
?>

