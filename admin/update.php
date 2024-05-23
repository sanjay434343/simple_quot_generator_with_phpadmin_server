<?php
// Use your own connection details
$con = mysqli_connect('localhost', 'root', '', 'quot');

// Check if the connection was successful
if (!$con) {
    die(mysqli_connect_error());
}

// Update quote function
function updateQuote($con, $quoteId, $quoteContent, $quoteAuthor) {
    $quoteId = mysqli_real_escape_string($con, $quoteId);
    $quoteContent = mysqli_real_escape_string($con, $quoteContent);
    $quoteAuthor = mysqli_real_escape_string($con, $quoteAuthor);

    // Update quote in the database
    $updateQuery = "UPDATE quotes SET quote_con = '$quoteContent', quote_auth = '$quoteAuthor' WHERE quote_id = '$quoteId'";
    
    if (mysqli_query($con, $updateQuery)) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quoteId = $_POST["quoteId"];
    $quoteContent = $_POST["quoteContent"];
    $quoteAuthor = $_POST["quoteAuthor"];

    // Call the updateQuote function
    if (updateQuote($con, $quoteId, $quoteContent, $quoteAuthor)) {
        echo "Quote updated successfully";
    } else {
        echo "Error updating quote: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
 