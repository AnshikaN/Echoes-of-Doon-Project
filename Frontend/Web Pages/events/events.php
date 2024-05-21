<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="events.css">
</head>

<body>
    <div class="maincontainer">
        <div class="leftcontainer">
            <h1>Events</h1>
            <h2>Doon</h2>
        </div>
        <div class="rightcontainer">
            <?php
            // Database connection
            $servername = "localhost"; // Replace with your server name if different
            $username = "riteshbhandari"; // Replace with your MySQL username
            $password = "8534053016"; // Replace with your MySQL password
            $dbname = "MinorDB"; // Replace with your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch data
            $sql = "SELECT * FROM organizerTable";
            $result = $conn->query($sql);

            // Displaying fetched data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<a href="#">';
                    echo '<img src="' . $row["image_path"] . '">';
                    echo '<h3>' . $row["event_name"] . '</h3>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>
