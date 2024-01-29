<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM contacts_table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Contact not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];

    $stmt = $conn->prepare("UPDATE contacts_table SET name=?, phone_number=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $phone_number, $id);
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
    <title>Edit Contact</title>
    <style>
        / Bố cục chung /
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            color: white;
            text-align: center;
            padding: 15px;
        }

        / Phần "Edit Contact" /
        h2 {
            margin: 20px 0;
            color: #333;
        }

        .edit-contact-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .edit-contact-form input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        .edit-contact-form input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .edit-contact-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h2>Edit Contact</h2>
</header>

<div class="edit-contact-form">
    <form action="edit_contact.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Phone Number: <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" required><br>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>
