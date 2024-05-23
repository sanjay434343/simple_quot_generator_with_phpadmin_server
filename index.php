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

// Function to get all quotes
function getAllQuotes($con) {
    $query = "SELECT quote_id, quote_con, quote_auth FROM quotes";
    $result = mysqli_query($con, $query);

    $quotes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $quotes[] = [
            'quote_id' => $row['quote_id'],
            'quote_content' => $row['quote_con'],
            'quote_author' => $row['quote_auth']
        ];
    }

    return $quotes;
}

// Get all quotes
$allQuotes = getAllQuotes($con);

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Generator with Chatbot Visualizer</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #aabbff;
        }

        .container {
            text-align: center;
        }

        #quote-container {
            max-width: 300px;
            height: 200px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-weight: bolder;
            background-color: #003366;
            color: #ccc;
        }

        #share-btn, #next-btn {
            margin-top: 10px;
            padding: 8px 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .next-btn {
            display: inline-block;
            padding: 8px 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            font-size: 14px;
        }

        #prev-btn {
            background-color: #ffcc00;
            color: #333;
        }

        #next-btn {
            background-color: #2196F3;
            color: white;
            margin-left: 10px;
        }

        .spk {
            width: 30px;
            background: none;
        }

        #speak-btn {
            background: none;
            border: none;
        }

        .face {
            font-size: 36px;
            margin-top: 20px;
            transition: transform 0.1s ease-in-out;
            animation: talk 0.5s infinite alternate;
        }

        @keyframes talk {
            0% {
                transform: scaleY(1);
            }
            50% {
                transform: scaleY(1.2);
            }
            100% {
                transform: scaleY(1);
            }
        }

        #container {
            width: 100%;
            text-align: center;
            padding: 20px;
        }

        #bot {
            position: relative;
            text-align: left;
            width: 24em;
            height: 24em;
            min-width: 10em;
            min-height: 10em;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Quote Generator</h1>
    <div id="quote-container">
        <?php if (!empty($allQuotes)) : ?>
            <blockquote>
                <p id="quote-text"><?php echo $allQuotes[0]['quote_content']; ?></p>
                <footer id="author">- <?php echo $allQuotes[0]['quote_author']; ?></footer>
            </blockquote>
            <button id="speak-btn"><img src="spk.png" alt="spk" class="spk"></button>
        <?php else : ?>
            <p id="quote-text">No quotes available</p>
            <footer id="author"></footer>
        <?php endif; ?>
    </div><br>
    <a href="#" id="prev-btn" class="next-btn">Previous</a>
    <a href="#" id="next-btn" class="next-btn">Next</a>
    <a href="admin/index.php" id="next-btn" class="next-btn">Admin</a>
</div>

<script>
    var quotes = <?php echo json_encode($allQuotes); ?>;
    var currentIndex = 0;
    var quoteText = document.getElementById('quote-text');
    var authorText = document.getElementById('author');
    var speakButton = document.getElementById('speak-btn');

    function displayQuote(index) {
        quoteText.innerHTML = quotes[index].quote_content;
        authorText.innerHTML = "- " + quotes[index].quote_author;
    }

    function getNextQuote() {
        currentIndex = (currentIndex + 1) % quotes.length;
        displayQuote(currentIndex);
    }

    function getPrevQuote() {
        currentIndex = (currentIndex - 1 + quotes.length) % quotes.length;
        displayQuote(currentIndex);
    }

    function speakQuote() {
        var speech = new SpeechSynthesisUtterance();
        speech.text = quoteText.innerText + " by " + authorText.innerText.substring(2);

        speech.rate = 0.6;
        speech.pitch = 100;

        window.speechSynthesis.speak(speech);
    }

    if (quotes.length > 0) {
        displayQuote(currentIndex);

        document.getElementById('next-btn').addEventListener('click', function (event) {
            event.preventDefault();
            getNextQuote();
        });

        document.getElementById('prev-btn').addEventListener('click', function (event) {
            event.preventDefault();
            getPrevQuote();
        });

        speakButton.addEventListener('click', function (event) {
            event.preventDefault();
            speakQuote();
        });
    }
</script>
</body>
</html>
