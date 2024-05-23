<?php
// Use your own connection details
$con = mysqli_connect('localhost', 'root', '', 'quot');

// Check if the connection was successful
if (!$con) {
    die(mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $quoteId = mysqli_real_escape_string($con, $_GET["id"]);

    // Delete quote from the database
    $deleteQuery = "DELETE FROM quotes WHERE quote_id = '$quoteId'";
    
    if (mysqli_query($con, $deleteQuery)) {
        echo "Quote deleted successfully";
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
