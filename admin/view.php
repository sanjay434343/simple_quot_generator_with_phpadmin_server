<?php
// Use your own connection details
$con = mysqli_connect('localhost', 'root', '', 'quot');

// Check if the connection was successful
if (!$con) {
    die(mysqli_connect_error());
}

// View Quotes
$viewQuery = "SELECT * FROM quotes";
$result = mysqli_query($con, $viewQuery);

echo "<h2>Quotes List</h2>";
echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Author</th>
        <th>Action</th>
    </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['quote_id']}</td>
        <td>{$row['quote_con']}</td>
        <td>{$row['quote_auth']}</td>
        <td>
            <a href='edit.php?id={$row['quote_id']}'><button>Edit</button></a>
            <a href='delete.php?id={$row['quote_id']}'><button>Delete</button></a>
        </td>
    </tr>";
}

echo "</table>";

// Close the database connection
mysqli_close($con);
?>
<style>body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

td {
    background-color: #fff;
}

a button {
    display: inline-block;
    padding: 8px 12px;
    margin: 5px;
    text-decoration: none;
    color: #fff;
    background-color: #4caf50;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

a button:hover {
    background-color: #45a049;
}

a button:active {
    background-color: #3d8b40;
}
</style>