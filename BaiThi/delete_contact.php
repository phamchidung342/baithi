<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM contacts_table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        / Phần "Delete Contact" /
        h2 {
            margin: 20px 0;
            color: #333;
        }

        .confirmation-message {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .confirmation-message p {
            margin-bottom: 20px;
        }

        .confirmation-message a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .confirmation-message a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h2>Delete Contact</h2>
</header>

<div class="confirmation-message">
    <p>Contact has been deleted successfully.</p>
    <a href="index.php">Back to Contact List</a>
</div>
</body>
</html>
