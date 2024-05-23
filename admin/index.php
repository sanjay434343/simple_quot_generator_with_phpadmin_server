<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200vh;
            margin-top: 50px;
            background-color: #f0f2f5;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1000px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container:nth-child(odd) {
            background-color: #e6e6e6;
        }

        .container h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h1>Simple Dashboard</h1>
    <div class="dashboard">
        <div class="container">
            <?php include('add.php'); ?>
        </div>
        <div class="container">
            <?php include('view.php'); ?>
        </div>
    </div>
</body>
</html>
