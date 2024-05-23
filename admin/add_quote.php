<?php

// Use your own connection details
$con = mysqli_connect('localhost', 'root', '', 'quot');

// Check if the connection was successful
if (!$con) {
    die(mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quoteContent = mysqli_real_escape_string($con, $_POST["quoteContent"]);
    $quoteAuthor = mysqli_real_escape_string($con, $_POST["quoteAuthor"]);

    // Insert new quote into the database
    $insertQuery = "INSERT INTO quotes (quote_con, quote_auth) VALUES ('$quoteContent', '$quoteAuthor')";
    
    if (mysqli_query($con, $insertQuery)) {
        echo "New quote added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);

?>
