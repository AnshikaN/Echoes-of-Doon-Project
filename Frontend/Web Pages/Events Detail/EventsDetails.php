<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="Events Detail.css">
</head>

<body>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "echoesofdoon");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = mysqli_query($connection, "SELECT * FROM organisertable ORDER BY id DESC LIMIT 1");
    if (!$query) {
        die("Query failed: " . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($query);
    mysqli_close($connection);
    ?>

    <div class="container">
        <img src="./images/Poster.png">
        <div class="heading">
            <h2><?php echo $row['eventName']; ?></h2>
            <p class="description"><?php echo $row['about']; ?></p>
        </div>
    </div>
    <div class="logo">
        <img src="./images/logo.png">
    </div>

    <div class="article">
        <h3>About Event</h3>
        <p><?php echo $row['about']; ?></p>
    </div>
    <div class="details">
        <div>
            <h3>Date</h3>
            <p><?php echo $row['fromDate']; ?></p>
        </div>
        <div>
            <h3>Time</h3>
            <p><?php echo $row['timings']; ?></p>
        </div>
        <!-- <div class="duration">
            <h3>Duration</h3>
            <p><?php //echo $row['timings']; ?></p>
        </div> -->
        <div>
            <p>Price</p>
            <h3>Rs. <?php echo $row['price']; ?></h3>
        </div>
        <input class="btn" type="submit" value="Register Now">
    </div>
</body>

</html>