<?php
include 'database.php';

$sql = "SELECT * FROM contacts_table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
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
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        h2 {
            margin: 20px 0;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 300px;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-left: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        a.add-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.add-link:hover {
            background-color: #555;
        }
    </style>

</head>
<body>
<h2>Contact List</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><?= $row['name'] ?> - <?= $row['phone_number'] ?>
            <a href='edit_contact.php?id=<?= $row['id'] ?>'>Edit</a>
            <a href='delete_contact.php?id=<?= $row['id'] ?>'>Delete</a>
        </li>
    <?php endwhile; ?>
</ul>
<a href='add_contact.php'>Add New Contact</a>

<?php
$conn->close();
?>
</body>
</html>
