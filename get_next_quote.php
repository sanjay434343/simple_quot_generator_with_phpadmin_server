<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quot";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to get a random quote
function getRandomQuote($con) {
    $query = "SELECT quote_id, quote_con, quote_auth FROM quotes ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return [
            'quote_id' => $row['quote_id'],
            'quote_content' => $row['quote_con'],
            'quote_author' => $row['quote_auth']
        ];
    } else {
        return [
            'quote_id' => null,
            'quote_content' => 'No quotes found',
            'quote_author' => 'Unknown'
        ];
    }
}

// Handle quote generation on button click
if (isset($_GET['next'])) {
    $quoteData = getRandomQuote($con);
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        #quote-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .title{
            background-color: re;
        }
        #share-btn, #next-btn {
            margin-top: 10px;
            padding: 8px 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        #share-btn {
            background-color: #4caf50;
            color: white;
        }

        #next-btn {
            background-color: #2196F3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1 class="title">Quote Generator</h1>
        <div id="quote-container">
       
            <blockquote>
                <p id="quote-text"><?php echo $quoteData['quote_content']; ?></p>
                <footer id="author">- <?php echo $quoteData['quote_author']; ?></footer>
            </blockquote>
            <button id="copy-btn">Copy</button>
            <a href="?next">
                <button id="next-btn">Next</button>
            </a>
        </div>
    </div>
</body>
</html>
