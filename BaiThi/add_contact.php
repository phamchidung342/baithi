<?php
global $conn;
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];

    $stmt = $conn->prepare("INSERT INTO contacts_table (name, phone_number) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone_number);
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
    <title>Add New Contact</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            color: black;
            padding: 10px;
            text-align: center;
        }

        h2 {
            margin: 20px 0;
        }

        .add-contact-header {
            color: black;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
        }

        input {
            padding: 10px;
            margin-top: 5px;
            width: 300px;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<header>
    <h2>Add New Contact</h2>
</header>
<form action="add_contact.php" method="post">
    Name: <input type="text" name="name" required><br>
    Phone Number: <input type="text" name="phone_number" required><br>
    <input type="submit" value="Add">
</form>
</body>
</html>
