    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Quote - Admin</title>
        <link rel="stylesheet" href="styles.css">
        <style>body {
        font-family: 'Arial', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

   


    label {
        display: block;
        margin-top: 10px;
    }

    textarea, input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        padding: 8px 16px;
        cursor: pointer;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
    }

    .btn{
        text-decoration: none;
        color: white;
    }
    </style>
    </head>
    <body>
     
            <h2>Add New Quote</h2>
            <form action="add_quote.php" method="post">
                <label for="quoteContent">Quote Content:</label>
                <textarea id="quoteContent" name="quoteContent" rows="4" required></textarea>

                <label for="quoteAuthor">Author:</label>
                <input type="text" id="quoteAuthor" name="quoteAuthor" required>

                <button type="submit">Add Quote</button>

                <button><a href="list.php" class="btn">View Quote</a></button>
            </form>
     


    </body>
    </html>
