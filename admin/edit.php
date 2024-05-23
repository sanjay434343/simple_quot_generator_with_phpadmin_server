<?php
// Use your own connection details
$con = mysqli_connect('localhost', 'root', '', 'quot');

// Check if the connection was successful
if (!$con) {
    die(mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $quoteId = mysqli_real_escape_string($con, $_GET["id"]);

    // Retrieve quote details
    $selectQuery = "SELECT * FROM quotes WHERE quote_id = '$quoteId'";
    $result = mysqli_query($con, $selectQuery);

    if ($result) {
        $quote = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . $selectQuery . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quote</title>
    <link rel="stylesheet" href="styles.css">
    <style>
h2 {
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
}

textarea, input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="submit"]:active {
    background-color: #3d8b40;
}
</style>
</head>
<body>
    
        <h2>Edit Quote</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="quoteId" value="<?php echo $quote['quote_id']; ?>">
            <label for="quoteContent">Content:</label>
            <textarea name="quoteContent" id="quoteContent" required><?php echo $quote['quote_con']; ?></textarea>
            <br>
            <label for="quoteAuthor">Author:</label>
            <input type="text" name="quoteAuthor" id="quoteAuthor" value="<?php echo $quote['quote_auth']; ?>" required>
            <br>
            <input type="submit" value="Update Quote">
        </form>
    
</body>
</html>
