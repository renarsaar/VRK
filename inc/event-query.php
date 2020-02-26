<?php
# Create Query = EVENTS
    $sql2 = "SELECT * FROM events";

    # Get the result
    $result2 = $conn -> query($sql2);

    # Fetch data to associative array
    $events = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    # Close Connection
    $conn -> close();
?>