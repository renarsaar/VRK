<?php
    # Create Query = EVENTS
    $sql = "SELECT * FROM events";

    # Get the result
    $result = $conn -> query($sql);

    # Fetch data to associative array
    $events = $result -> fetch_all(MYSQLI_ASSOC);

    # Close Connection
    $conn -> close();
?>